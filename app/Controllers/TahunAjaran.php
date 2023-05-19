<?php

namespace App\Controllers;

use App\Models\TahunAjaranModel;

class TahunAjaran extends BaseController
{
    protected $tahunajaranModel;
     
    public function __construct()
    {
        $this->tahunajaranModel = new TahunajaranModel();
    }

    public function index()
    {
        $tahunajaran = $this->tahunajaranModel->orderBy('id_tahunajaran', 'DESC')->findAll();
        
        $data = [
            'title' => 'Tahun Ajaran',
            'tahunajaran' => $tahunajaran,
        ];


        return view('sekolah/tahun-ajaran', $data);
    }

    public function save()
	{
		if($this->request->isAJAX()){

			$valid = $this->validate([
				'nama_tahunajaran' => [
					'label' => "Tahun Ajaran",
					'rules' =>'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				]
			]);

			if(!$valid){
				
				$validation = \Config\Services::validation();
				$msg = [
					'error' => [
						'nama_tahunajaran' => $validation->getError('nama_tahunajaran'),
					]
				];

			}else{ 
				
                $this->tahunajaranModel->save([
                    'nama_tahunajaran' => $this->request->getVar('nama_tahunajaran')
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

			if($this->request->getVar('d_id_tahunajaran') != null){
				
				$id = $this->request->getVar('d_id_tahunajaran');
				$this->tahunajaranModel->deleteTahunAjaran($id);

				$msg = [
					'berhasil' => [
						'succes' => "Data berhasil dihapus",
					]
				];

			}else{ 
				
				$msg = [
					'error' => [
						'd_id_tahunajaran' => 'Data gagal dihapus',
					]
				];
			}

			echo json_encode($msg);
		}
	}
	
	public function update()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('l_nama_tahunajaran') ==  $this->request->getVar('u_nama_tahunajaran')){
				$rulesKat = 'required';
			}else{
				$rulesKat = 'required|is_unique[tb_tahunajaran.nama_tahunajaran]';
			}
			$valid = $this->validate([
				'u_nama_tahunajaran' => [
					'label' => "Nama Tahun Ajaran",
					'rules' => $rulesKat,
					'errors' => [
						'required' => '{field} harus diisi.',
						'is_unique' => '{field} sudah terdaftar.',
					]
				]
			]);

			if(!$valid){
				
				$validation = \Config\Services::validation();
				$msg = [
					'error' => [
						'u_nama_tahunajaran' => $validation->getError('u_nama_tahunajaran'),
					]
				];

			}else{ 
				
				$this->tahunajaranModel->save([
					'id_tahunajaran' => $this->request->getVar('u_id_tahunajaran'),
					'nama_tahunajaran' => $this->request->getVar('u_nama_tahunajaran')
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