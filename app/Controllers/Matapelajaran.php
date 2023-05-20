<?php

namespace App\Controllers;

use App\Models\MatapelajaranModel;

class Matapelajaran extends BaseController
{
    protected $matapelajaranModel;
     
    public function __construct()
    {
        $this->matapelajaranModel = new MatapelajaranModel();
    }

    public function index()
    {
        $matapelajaran = $this->matapelajaranModel->orderBy('nama_kelompok', 'ASC')->findAll();
        
        $data = [
            'title' => 'Matapelajaran',
			'matapelajaran' => $matapelajaran
        ];

        return view('Sekolah/matapelajaran', $data);
    }

	//MAPEL
    
	public function savemapel()
	{
		if($this->request->isAJAX()){
			
			$valid = $this->validate([
				'nama_matapelajaran' => [
					'label' => "Nama Matapelajaran",
					'rules' => 'required|is_unique[tb_matapelajaran.nama_matapelajaran]',
					'errors' => [
						'required' => '{field} harus diisi.',
						'is_unique' => '{field} sudah terdaftar'
					]
				],
				'nama_kelompok' => [
					'label' => "Kelompok Matapelajaran",
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
						'nama_matapelajaran' => $validation->getError('nama_matapelajaran'),
						'nama_kelompok' => $validation->getError('nama_kelompok')
					]
				];

			}else{
				
				$this->matapelajaranModel->save([
					'nama_matapelajaran' => $this->request->getVar('nama_matapelajaran'),
					'nama_kelompok' => $this->request->getVar('nama_kelompok')
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
	
	public function deletemapel()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('d_id_matapelajaran') != null){
				
				$id = $this->request->getVar('d_id_matapelajaran');
				$this->matapelajaranModel->deleteMapel($id);

				$msg = [
					'berhasil' => [
						'succes' => "Data berhasil dihapus",
					]
				];

			}else{ 
				
				$msg = [
					'error' => [
						'd_id_matapelajaran' => 'Data gagal dihapus',
					]
				];
			}

			echo json_encode($msg);
		}
	}
	
	public function updatemapel()
	{
		if($this->request->isAJAX()){

			$valid = $this->validate([
				'u_nama_matapelajaran' => [
					'label' => "Nama Matapelajaran",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'u_nama_kelompok' => [
					'label' => "Kelompok Matapelajaran",
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
						'u_nama_matapelajaran' => $validation->getError('u_nama_matapelajaran'),
						'u_nama_kelompok' => $validation->getError('u_nama_kelompok')
					]
				];

			}else{ 
				
				$this->matapelajaranModel->save([
					'id_matapelajaran' => $this->request->getVar('u_id_matapelajaran'),
					'nama_matapelajaran' => $this->request->getVar('u_nama_matapelajaran'),
					'nama_kelompok' => $this->request->getVar('u_nama_kelompok')
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
