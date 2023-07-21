<?php

namespace App\Controllers;

use App\Models\KehadiranModel;
use App\Models\DaftarSiswaKelasModel;

class Kehadiran extends BaseController
{
    protected $kehadiranModel;
    protected $daftarSiswaKelasModel;
     
    public function __construct()
    {
        $this->kehadiranModel = new KehadiranModel();
        $this->daftarSiswaKelasModel = new DaftarSiswaKelasModel();
    }

    public function index($s_nisn)
    {
		$kehadiran = $this->kehadiranModel->where('s_nisn', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_kehadiran.id_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->findAll();
        
        $search_kelas = $this->daftarSiswaKelasModel->where('s_nisn', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarsiswakelas.id_kelas')
        ->findAll();
		
		$data = [
			'kehadiran' => $kehadiran,
			'search_kelas' => $search_kelas,
		];

		return view('BukuInduk/kehadiran', $data);
    }

	public function save()
	{
		if($this->request->isAJAX()){
			
			$valid = $this->validate([
				'id_kelas' => [
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
						'id_kelas' => $validation->getError('id_kelas'),
						'kh_semester' => $validation->getError('kh_semester')
					]
				];

			}else{
				
				$this->kehadiranModel->save([
					'id_kelas' => $this->request->getVar('id_kelas'),
					'kh_semester' => $this->request->getVar('kh_semester'),
					'kh_sakit' => $this->request->getVar('kh_sakit'),
					'kh_izin' => $this->request->getVar('kh_izin'),
					'kh_alpa' => $this->request->getVar('kh_alpa'),
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
				'u_id_kelas' => [
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
						'u_id_kelas' => $validation->getError('u_id_kelas'),
						'u_kh_semester' => $validation->getError('u_kh_semester')
					]
				];

			}else{ 
				
				$this->kehadiranModel->save([
					'id_kehadiran' => $this->request->getVar('u_id_kehadiran'),
					'id_kelas' => $this->request->getVar('u_id_kelas'),
					'kh_semester' => $this->request->getVar('u_kh_semester'),
					'kh_sakit' => $this->request->getVar('u_kh_sakit'),
					'kh_izin' => $this->request->getVar('u_kh_izin'),
					'kh_alpa' => $this->request->getVar('u_kh_alfa'),
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
	
	public function addKehadiran()
	{
		if($this->request->isAJAX()){
			
            $daftarSiswaKelas = $this->daftarSiswaKelasModel->where('id_kelas', $this->request->getVar('id_kelas'))->findAll();
            
            foreach($daftarSiswaKelas as $dsk){
                    
				$dKehadiran = $this->kehadiranModel
				->where('kh_semester', $this->request->getVar('kh_semester'))
				->where('s_NISN', $dsk['s_NISN'])
				->where('id_kelas', $this->request->getVar('id_kelas'))
				->findAll();

				if($dKehadiran == null){
					$this->kehadiranModel->save([
						'id_kelas' => $this->request->getVar('id_kelas'),
						'kh_semester' => $this->request->getVar('kh_semester'),
						'kh_sakit' => 0,
						'kh_izin' => 0,
						'kh_alpa' => 0,
						's_NISN' => $dsk['s_NISN'],
					]);
				}
            }

            $msg = [
                'berhasil' => [
                    'succes' => "Berhasil"
                ]
            ];

			echo json_encode($msg);
        }
	}

	public function updateKehadiranFull()
	{
		if($this->request->isAJAX()){
			
            $kehadiran = $this->kehadiranModel->where('id_kehadiran', $this->request->getVar('id_kehadiran'))->where('kh_semester', $this->request->getVar('kh_semester'))
            ->findAll();

			$siswa = $this->daftarSiswaKelasModel->where('id_kelas',  $this->request->getVar('id_kelas'))->findAll();

            foreach($kehadiran as $n) {
                $this->kehadiranModel->save([
                    'id_kehadiran' => $this->request->getVar('id_kehadiran'),
                    'id_kelas' => $this->request->getVar('id_kelas'),
                    'kh_semester' => $this->request->getVar('kh_semester'),
                    'kh_sakit' => $this->request->getVar('kh_sakit'. $n['id_kehadiran']),
                    'kh_izin' => $this->request->getVar('kh_izin'. $n['id_kehadiran']),
                    'kh_alpa' => $this->request->getVar('kh_alpa'. $n['id_kehadiran'])
                ]);
            }

			foreach($siswa as $s){
                $this->daftarSiswaKelasModel->save([
                    'id_daftarsiswakelas' => $s['id_daftarsiswakelas'],
                    'dsk_naikkelas' => $this->request->getVar('dsk_naikkelas'. $s['s_NISN']),
                    'dsk_tglnaikkelas' => $this->request->getVar('dsk_tglnaikkelas'. $s['s_NISN']),
                    'dsk_lulus' => $this->request->getVar('dsk_lulus'. $s['s_NISN']),
                    'dsk_tgllulus' => $this->request->getVar('dsk_tgllulus'. $s['s_NISN']),
                ]);

			}

            $msg = [
                'berhasil' => [
                    'succes' => "Berhasil"
                ]
            ];

			echo json_encode($msg);
        }
	}
	
}
