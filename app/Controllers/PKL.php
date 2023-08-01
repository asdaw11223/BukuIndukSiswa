<?php

namespace App\Controllers;

use App\Models\PKLModel;

class PKL extends BaseController
{
    protected $pklModel;
     
    public function __construct()
    {
        $this->pklModel = new PKLModel();
    }

	public function save()
	{
		if($this->request->isAJAX()){
			
			$valid = $this->validate([
				'pkl_namainstansi' => [
					'label' => "Nama Instansi",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'pkl_lokasi' => [
					'label' => "Lokasi PKL",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'pkl_lama' => [
					'label' => "Lama PKL",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'pkl_keterangan' => [
					'label' => "Keterangan",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
			]);

			if(!$valid){
				
				$validation = \Config\Services::validation();
				$msg = [
					'error' => [
						'pkl_namainstansi' => $validation->getError('pkl_namainstansi'),
						'pkl_lokasi' => $validation->getError('pkl_lokasi'),
						'pkl_lama' => $validation->getError('pkl_lama'),
						'pkl_keterangan' => $validation->getError('pkl_keterangan'),
					]
				];

			}else{
				
				$this->pklModel->save([
					'pkl_namainstansi' => $this->request->getVar('pkl_namainstansi'),
					'pkl_lokasi' => $this->request->getVar('pkl_lokasi'),
					'pkl_lama' => $this->request->getVar('pkl_lama'),
					'pkl_keterangan' => $this->request->getVar('pkl_keterangan'),
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

			if($this->request->getVar('d_id_pkl') != null){
				
				$id = $this->request->getVar('d_id_pkl');
				$this->pklModel->deletePKL($id);

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
