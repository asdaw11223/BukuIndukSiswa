<?php

namespace App\Controllers;

use App\Models\PrestasiModel;

class Prestasi extends BaseController
{
    protected $prestasiModel;
     
    public function __construct()
    {
        $this->prestasiModel = new PrestasiModel();
    }

    public function index($s_nisn)
    {
		$prestasi = $this->prestasiModel->getSiswaDetail($s_nisn);

		$data = [
			'prestasi' => $prestasi
		];

		return view('BukuInduk/prestasi', $data);
    }

	public function save()
	{
		if($this->request->isAJAX()){
			
			$valid = $this->validate([
				'pre_jenisprestasi' => [
					'label' => "Jenis Prestasi",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'pre_keterangan' => [
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
						'pre_jenisprestasi' => $validation->getError('pre_jenisprestasi'),
						'pre_keterangan' => $validation->getError('pre_keterangan')
					]
				];

			}else{
				
				$this->prestasiModel->save([
					'pre_jenisprestasi' => $this->request->getVar('pre_jenisprestasi'),
					'pre_keterangan' => $this->request->getVar('pre_keterangan'),
					's_NISN' => $this->request->getVar('pre_s_nisn')
				]);

				$msg = [
					'berhasil' => [
						'succes' => "Berhasil",
					],
					'nisn_siswa' => $this->request->getVar('pre_s_nisn'),
				];
			}

			echo json_encode($msg);
        }
	}
	
	public function delete()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('d_id_prestasi') != null){
				
				$id = $this->request->getVar('d_id_prestasi');
				$this->prestasiModel->deletePrestasi($id);

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
	
	public function update()
	{
		if($this->request->isAJAX()){

			$valid = $this->validate([
				'u_pre_jenisprestasi' => [
					'label' => "Jenis Prestasi",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'u_pre_keterangan' => [
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
						'u_pre_jenisprestasi' => $validation->getError('u_pre_jenisprestasi'),
						'u_pre_keterangan' => $validation->getError('u_pre_keterangan')
					]
				];

			}else{ 
				
				$this->prestasiModel->save([
					'id_prestasi' => $this->request->getVar('u_id_prestasi'),
					'pre_jenisprestasi' => $this->request->getVar('u_pre_jenisprestasi'),
					'pre_keterangan' => $this->request->getVar('u_pre_keterangan'),
					's_NISN' => $this->request->getVar('upre_s_nisn')
				]);

				$msg = [
					'berhasil' => [
						'succes' => "Berhasil",
					]
				];
			}

			echo json_encode($msg);
        }
	}
	
}
