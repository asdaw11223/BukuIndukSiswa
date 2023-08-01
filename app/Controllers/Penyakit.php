<?php

namespace App\Controllers;

use App\Models\PenyakitKhususModel;

class Penyakit extends BaseController
{
    protected $penyakitModel;
     
    public function __construct()
    {
        $this->penyakitModel = new PenyakitKhususModel();
    }

    public function index($s_nisn)
    {
		$penyakitKhusus = $this->penyakitModel->getSiswaDetail($s_nisn);

		$data = [
			'penyakit' => $penyakitKhusus,
		];

		return view('bukuInduk/penyakit', $data);
    }

	public function save()
	{
		if($this->request->isAJAX()){
			
			$valid = $this->validate([
				'p_jenispenyakit' => [
					'label' => "Jenis Penyakit",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'p_kelas' => [
					'label' => "Kelas",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'p_tahun' => [
					'label' => "Tahun",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'p_lamasakit' => [
					'label' => "Lama Sakit",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'p_keterangan' => [
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
						'p_jenispenyakit' => $validation->getError('p_jenispenyakit'),
						'p_kelas' => $validation->getError('p_kelas'),
						'p_tahun' => $validation->getError('p_tahun'),
						'p_lamasakit' => $validation->getError('p_lamasakit'),
						'p_keterangan' => $validation->getError('p_keterangan')
					]
				];

			}else{
				
				$this->penyakitModel->save([
					'p_jenispenyakit' => $this->request->getVar('p_jenispenyakit'),
					'p_kelas' => $this->request->getVar('p_kelas'),
					'p_tahun' => $this->request->getVar('p_tahun'),
					'p_lamasakit' => $this->request->getVar('p_lamasakit'),
					'p_keterangan' => $this->request->getVar('p_keterangan'),
					's_NISN' => $this->request->getVar('p_s_nisn')
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

			if($this->request->getVar('d_id_penyakit') != null){
				
				$id = $this->request->getVar('d_id_penyakit');
				$this->penyakitModel->deletePenyakitBerat($id);

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
				'u_p_jenispenyakit' => [
					'label' => "Jenis Penyakit",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'u_p_kelas' => [
					'label' => "Kelas",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'u_p_tahun' => [
					'label' => "Tahun",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'u_p_lamasakit' => [
					'label' => "Lama Sakit",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'u_p_keterangan' => [
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
						'u_p_jenispenyakit' => $validation->getError('u_p_jenispenyakit'),
						'u_p_kelas' => $validation->getError('u_p_kelas'),
						'u_p_tahun' => $validation->getError('u_p_tahun'),
						'u_p_lamasakit' => $validation->getError('u_p_lamasakit'),
						'u_p_keterangan' => $validation->getError('u_p_keterangan')
					]
				];

			}else{ 
				
				$this->penyakitModel->save([
					'id_penyakit' => $this->request->getVar('u_id_penyakit'),
					'p_jenispenyakit' => $this->request->getVar('u_p_jenispenyakit'),
					'p_kelas' => $this->request->getVar('u_p_kelas'),
					'p_tahun' => $this->request->getVar('u_p_tahun'),
					'p_lamasakit' => $this->request->getVar('u_p_lamasakit'),
					'p_keterangan' => $this->request->getVar('u_p_keterangan'),
					's_NISN' => $this->request->getVar('u_s_nisn')
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
