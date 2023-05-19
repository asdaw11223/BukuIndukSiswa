<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\TahunAjaranModel;
use App\Models\JurusanModel;
use App\Models\TingkatModel;
use App\Models\MatapelajaranModel;

class Matapelajaran extends BaseController
{
    protected $tingkatModel;
    protected $jadwalModel;
    protected $tahunajaranModel;
    protected $jurusanModel;
    protected $matapelajaranModel;
     
    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->tingkatModel = new TingkatModel();
        $this->tahunajaranModel = new TahunAjaranModel();
        $this->jurusanModel = new JurusanModel();
        $this->matapelajaranModel = new MatapelajaranModel();
    }

    public function index()
    {
        $jadwalModel = $this->jadwalModel->findAll();
        $jurusan = $this->jurusanModel->findAll();
        $matapelajaran = $this->matapelajaranModel->orderBy('nama_kelompok', 'ASC')->findAll();
        $tahunajaran = $this->tahunajaranModel->orderBy('id_tahunajaran', 'DESC')->findAll();
		$id = $this->request->getVar('jurusan');
		$tingkat = $this->tingkatModel->where("id_jurusan", $id)->findAll();
        
        $data = [
            'title' => 'Matapelajaran',
            'jadwalModel' => $jadwalModel,
			'tingkat' => $tingkat,
            'jurusan' => $jurusan,
            'matapelajaran' => $matapelajaran,
            'tahunajaran' => $tahunajaran
        ];

        return view('Sekolah/matapelajaran', $data);
    }

	//MAPEL
    
	public function savemapel()
	{
		if($this->request->isAJAX()){
			


			$valid = $this->validate([
				'nama_mapel' => [
					'label' => "Nama Matapelajaran",
					'rules' => 'required|is_unique[tb_mapel.nama_mapel]',
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
						'nama_mapel' => $validation->getError('nama_mapel'),
						'nama_kelompok' => $validation->getError('nama_kelompok')
					]
				];

			}else{
				
				$this->matapelajaranModel->save([
					'nama_mapel' => $this->request->getVar('nama_mapel'),
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

			if($this->request->getVar('d_id_mapel') != null){
				
				$id = $this->request->getVar('d_id_mapel');
				$this->matapelajaranModel->deleteMapel($id);

				$msg = [
					'berhasil' => [
						'succes' => "Data berhasil dihapus",
					]
				];

			}else{ 
				
				$msg = [
					'error' => [
						'd_id_mapel' => 'Data gagal dihapus',
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
				'u_nama_mapel' => [
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
						'u_nama_mapel' => $validation->getError('u_nama_mapel'),
						'u_nama_kelompok' => $validation->getError('u_nama_kelompok')
					]
				];

			}else{ 
				
				$this->matapelajaranModel->save([
					'id_mapel' => $this->request->getVar('u_id_mapel'),
					'nama_mapel' => $this->request->getVar('u_nama_mapel'),
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

	// MATAPELAJARAN

	public function savematapelajaran()
	{
		if($this->request->isAJAX()){
				
			$mapels = $_POST['mapels'];
			$kelompok = $_POST['kelompok'];

			$mpl = $this->matapelajaranModel->where('id_tingkat', $this->request->getVar('a_id_tingkat'))->findAll();

			if($mpl == null){
				for ($i=0; $i < count($mapels); $i++) { 
					$this->matapelajaranModel->save([
						'nama_matapelajaran' => $mapels[$i],
						'nama_kelompok' => $kelompok[$i],
						'id_tingkat' => $this->request->getVar('a_id_tingkat')
					]);
					$msg = [
						'berhasil' => [
							'succes' => "Berhasil",
						]
					];
				}
			}else if($mpl != null){
				for ($i=0; $i < count($mapels); $i++) { 
					foreach($mpl as $m){
						if($mapels[$i] == null){
							var_dump("udah gada");
						}else if($mapels[$i] == $m['nama_matapelajaran']){
							$mapels[$i] = "null";
							$kelompok[$i] = "null";
						}
					}
				}
				
				for ($i=0; $i < count($mapels); $i++) { 
					if($mapels[$i] == "null"){
					}else{
						$this->matapelajaranModel->save([
							'nama_matapelajaran' => $mapels[$i],
							'nama_kelompok' => $kelompok[$i],
							'id_tingkat' => $this->request->getVar('a_id_tingkat')
						]);
					}
				}

				$msg = [
					'lulus' => [
						'lulus' => "Berhasil",
					]
				];
			}
				
			echo json_encode($msg);
		}
	}

	public function deletematapelajaran()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('d_id_matapelajaran') != null){
				
				$id = $this->request->getVar('d_id_matapelajaran');
				$this->matapelajaranModel->deleteMatapelajaran($id);

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
	

}
