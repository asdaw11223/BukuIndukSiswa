<?php

namespace App\Controllers;

use App\Models\KehadiranModel;

class Kehadiran extends BaseController
{
    protected $kehadiranModel;
     
    public function __construct()
    {
        $this->kehadiranModel = new KehadiranModel();
    }

    public function index($s_nisn)
    {
		$kehadiran = $this->kehadiranModel->getSiswaDetail($s_nisn);

		$data = [
			'kehadiran' => $kehadiran
		];

		return view('BukuInduk/kehadiran', $data);
    }

	public function save()
	{
		if($this->request->isAJAX()){
			
			$valid = $this->validate([
				'kh_kelas' => [
					'label' => "Kelas",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'kh_semester' => [
					'label' => "Semester",
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
						'kh_kelas' => $validation->getError('kh_kelas'),
						'kh_semester' => $validation->getError('kh_semester')
					]
				];

			}else{
				
				$this->kehadiranModel->save([
					'kh_kelas' => $this->request->getVar('kh_kelas'),
					'kh_semester' => $this->request->getVar('kh_semester'),
					'kh_jmlhadir' => $this->request->getVar('kh_jmlhadir'),
					'kh_sakit' => $this->request->getVar('kh_sakit'),
					'kh_izin' => $this->request->getVar('kh_izin'),
					'kh_alpa' => $this->request->getVar('kh_alpa'),
					'kh_jmlbelajar' => $this->request->getVar('kh_jmlbelajar'),
					's_NISN' => $this->request->getVar('k_s_nisn')
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

			if($this->request->getVar('d_id_Kehadiran') != null){
				
				$id = $this->request->getVar('d_id_Kehadiran');
				$this->kehadiranModel->deletekehadiran($id);

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
				'u_kh_kelas' => [
					'label' => "Nama kehadiran",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'u_kh_semester' => [
					'label' => "Tahun kehadiran",
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
						'u_kh_kelas' => $validation->getError('u_kh_kelas'),
						'u_kh_semester' => $validation->getError('u_kh_semester')
					]
				];

			}else{ 
				
				$this->kehadiranModel->save([
					'id_kehadiran' => $this->request->getVar('u_id_kehadiran'),
					'kh_kelas' => $this->request->getVar('u_kh_kelas'),
					'kh_semester' => $this->request->getVar('u_kh_semester'),
					'kh_jmlhadir' => $this->request->getVar('u_kh_jmlhadir'),
					'kh_sakit' => $this->request->getVar('u_kh_sakit'),
					'kh_izin' => $this->request->getVar('u_kh_izin'),
					'kh_alpa' => $this->request->getVar('u_kh_alfa'),
					'kh_jmlbelajar' => $this->request->getVar('u_kh_jmlbelajar'),
					's_NISN' => $this->request->getVar('u_k_s_nisn')
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
