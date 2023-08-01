<?php

namespace App\Controllers;

use App\Models\BeasiswaModel;

class Beasiswa extends BaseController
{
    protected $beasiswaModel;
     
    public function __construct()
    {
        $this->beasiswaModel = new BeasiswaModel();
    }

    public function index($s_nisn)
    {
		$beasiswa = $this->beasiswaModel->getSiswaDetail($s_nisn);

		$data = [
			'beasiswa' => $beasiswa
		];

		return view('bukuInduk/beasiswa', $data);
    }

	public function save()
	{
		if($this->request->isAJAX()){
			
			$valid = $this->validate([
				's_namabeasiswa' => [
					'label' => "Nama Beasiswa",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				's_tahunbeasiswa' => [
					'label' => "Tahun Beasiswa",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				's_beasiswadari' => [
					'label' => "Beasiswa Dari",
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
						's_namabeasiswa' => $validation->getError('s_namabeasiswa'),
						's_tahunbeasiswa' => $validation->getError('s_tahunbeasiswa'),
						's_beasiswadari' => $validation->getError('s_beasiswadari')
					]
				];

			}else{
				
				$this->beasiswaModel->save([
					's_namabeasiswa' => $this->request->getVar('s_namabeasiswa'),
					's_tahunbeasiswa' => $this->request->getVar('s_tahunbeasiswa'),
					's_beasiswadari' => $this->request->getVar('s_beasiswadari'),
					's_NISN' => $this->request->getVar('b_s_nisn')
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
	
	public function delete()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('d_id_beasiswa') != null){
				
				$id = $this->request->getVar('d_id_beasiswa');
				$this->beasiswaModel->deleteBeasiswa($id);

				$msg = [
					'berhasil' => [
						'succes' => "Data berhasil dihapus",
					]
				];

			}else{ 
				
				$msg = [
					'error' => [
						'gagal' => 'Data gagal dihapus',
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
				'u_s_namabeasiswa' => [
					'label' => "Nama Beasiswa",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'u_s_tahunbeasiswa' => [
					'label' => "Tahun Beasiswa",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'u_s_beasiswadari' => [
					'label' => "Beasiswa Dari",
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
						'u_s_namabeasiswa' => $validation->getError('u_s_namabeasiswa'),
						'u_s_tahunbeasiswa' => $validation->getError('u_s_tahunbeasiswa'),
						'u_s_beasiswadari' => $validation->getError('u_s_beasiswadari')
					]
				];

			}else{ 
				
				$this->beasiswaModel->save([
					'id_beasiswa' => $this->request->getVar('u_id_beasiswa'),
					's_namabeasiswa' => $this->request->getVar('u_s_namabeasiswa'),
					's_tahunbeasiswa' => $this->request->getVar('u_s_tahunbeasiswa'),
					's_beasiswadari' => $this->request->getVar('u_s_beasiswadari'),
					's_NISN' => $this->request->getVar('ub_s_nisn')
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
