<?php

namespace App\Controllers;

use App\Models\JurusanModel;
use App\Models\TingkatModel;

class Jurusan extends BaseController
{
    protected $jurusanModel;
    protected $tingkatModel;
     
    public function __construct()
    {
        $this->jurusanModel = new JurusanModel();
        $this->tingkatModel = new TingkatModel();
    }

    public function index()
    {
        
        $jurusan = $this->jurusanModel->findAll();
        
        $data = [
            'title' => 'Jurusan',
            'jurusan' => $jurusan,
        ];


        return view('Sekolah/jurusan', $data);
    }

    public function save()
	{
		if($this->request->isAJAX()){

			$valid = $this->validate([
				'nama_jurusan' => [
					'label' => "Nama Jurusan",
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
						'nama_jurusan' => $validation->getError('nama_jurusan'),
					]
				];

			}else{ 
				
                $this->jurusanModel->save([
                    'nama_jurusan' => $this->request->getVar('nama_jurusan')
                ]);

				$jurusan = $this->jurusanModel->where("nama_jurusan", $this->request->getVar('nama_jurusan'))->findAll();

				foreach ($jurusan as $js) {
					if($js['nama_jurusan'] == $this->request->getVar('nama_jurusan')){
						
						$this->tingkatModel->save([
							'nama_tingkat' => 'Kelas X',
							'id_jurusan' => $js['id_jurusan'],
						]);
						$this->tingkatModel->save([
							'nama_tingkat' => 'Kelas XI',
							'id_jurusan' => $js['id_jurusan'],
						]);
						$this->tingkatModel->save([
							'nama_tingkat' => 'Kelas XII',
							'id_jurusan' => $js['id_jurusan'],
						]);
					}
				}

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

			if($this->request->getVar('d_id_jurusan') != null){
				
				$id = $this->request->getVar('d_id_jurusan');
				
				$tingkat = $this->tingkatModel->where("id_jurusan", $id)->findAll();

				foreach($tingkat as $tg){
					$this->tingkatModel->deleteTingkat($tg['id_tingkat']);
				}

				$this->jurusanModel->deleteJurusan($id);

				

				$msg = [
					'berhasil' => [
						'succes' => "Data berhasil dihapus",
					]
				];

			}else{ 
				
				$msg = [
					'error' => [
						'd_id_jurusan' => 'Data gagal dihapus',
					]
				];
			}

			echo json_encode($msg);
		}
	}
	
	public function update()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('u_nama_jurusan') ==  $this->request->getVar('l_nama_jurusan')){
				$rulesKat = 'required';
			}else{
				$rulesKat = 'required|is_unique[tb_jurusan.nama_jurusan]';
			}
			$valid = $this->validate([
				'u_nama_jurusan' => [
					'label' => "Nama Jurusan",
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
						'u_nama_jurusan' => $validation->getError('u_nama_jurusan'),
					]
				];

			}else{ 
				
				$this->jurusanModel->save([
					'id_jurusan' => $this->request->getVar('u_id_jurusan'),
					'nama_jurusan' => $this->request->getVar('u_nama_jurusan')
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
