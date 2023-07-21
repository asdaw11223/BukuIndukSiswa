<?php

namespace App\Controllers;

use App\Models\EskulModel;

class Eskul extends BaseController
{
    protected $eskulModel;
     
    public function __construct()
    {
        $this->eskulModel = new EskulModel();
    }

	public function save()
	{
		if($this->request->isAJAX()){
			
			$valid = $this->validate([
				'eskul_kegiatan' => [
					'label' => "Jenis eskul",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'eskul_keterangan' => [
					'label' => "Keterangan",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				]

			]);

			if(!$valid){
				
				$validation = \Config\Services::validation();
				$msg = [
					'error' => [
						'eskul_kegiatan' => $validation->getError('eskul_kegiatan'),
						'eskul_keterangan' => $validation->getError('eskul_keterangan')
					]
				];

			}else{
				
				$this->eskulModel->save([
					'eskul_kegiatan' => $this->request->getVar('eskul_kegiatan'),
					'eskul_keterangan' => $this->request->getVar('eskul_keterangan'),
					'id_kelas' => $this->request->getVar('id_kelas'),
					's_NISN' => $this->request->getVar('s_nisn')
				]);

				$msg = [
					'berhasil' => [
						'succes' => "Berhasil",
					],
					'nisn_siswa' => $this->request->getVar('s_nisn'),
				];
			}

			echo json_encode($msg);
        }
	}
	
	public function delete()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('d_id_eskul') != null){
				
				$id = $this->request->getVar('d_id_eskul');
				$this->eskulModel->deleteeskul($id);

				$msg = [
					'berhasil' => [
						'succes' => "Data berhasil dihapus",
					]
				];

			}else{ 
				
				$msg = [
					'error' => [
						'd_id_kelas' => 'Data gagal dihapus',
					]
				];
			}

			echo json_encode($msg);
		}
	}
	
}
