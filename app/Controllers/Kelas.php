<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\DaftarSiswaKelasModel;
use App\Models\TahunAjaranModel;
use App\Models\TingkatModel;
use App\Models\SiswaModel;
use App\Models\JurusanModel;

class Kelas extends BaseController
{
    protected $kelasModel;
    protected $jurusanModel;
    protected $tahunAjaranModel;
    protected $tingkatModel;
    protected $siswaModel;
    protected $daftarSiswaKelasModel;
     
    public function __construct()
    {
        $this->kelasModel = new KelasModel();
        $this->jurusanModel = new JurusanModel();
        $this->tahunAjaranModel = new TahunAjaranModel();
        $this->tingkatModel = new TingkatModel();
        $this->siswaModel = new SiswaModel();
        $this->daftarSiswaKelasModel = new DaftarSiswaKelasModel();
    }

    public function index()
    {
        $kelas = $this->kelasModel
		->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
		->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_kelas.id_jurusan')
		->join('tb_tingkat', 'tb_tingkat.id_tingkat = tb_kelas.id_tingkat')
		->get()->getResultArray();	

        $jurusan = $this->jurusanModel->findAll();
        $tahunAjaran = $this->tahunAjaranModel->findAll();
        $tingkat = $this->tingkatModel->findAll();

        $siswa = $this->siswaModel
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_siswa.id_tahunajaran')
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan')
        ->get()->getResultArray();
		
        
        $data = [
            'title' => 'Kelas',
            'kelas' => $kelas,
            'jurusan' => $jurusan,
            'siswa' => $siswa,
            'tahunAjaran' => $tahunAjaran,
            'tingkat' => $tingkat
        ];

        return view('Sekolah/kelas', $data);
    }

	public function daftarSiswaKelas($id_kelas)
	{
        $jurusan = $this->jurusanModel->findAll();
        $tahunAjaran = $this->tahunAjaranModel->findAll();
        $daftarSiswaKelas = $this->daftarSiswaKelasModel->getSiswaKelas($id_kelas);
		$kelasFull = $this->kelasModel->findAll();
		$kelas = $this->kelasModel->where(['tb_kelas.id_kelas'=> $id_kelas])->first();
		$siswa = $this->daftarSiswaKelasModel
		->where(['tb_daftarsiswakelas.id_kelas' => $id_kelas])
		->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
		->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarsiswakelas.id_kelas')
		->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan')
		->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_siswa.id_tahunajaran')
		->get()->getResultArray();

		$data = [
            'title' => 'Daftar Siswa Kelas',
            'jurusan' => $jurusan,
            'kelas' => $kelas,
            'kelasFull' => $kelasFull,
            'siswa' => $siswa,
            'tahunAjaran' => $tahunAjaran,
			'daftar' => $daftarSiswaKelas
		];

		return view('Sekolah/daftarsk', $data);
	}
	
	public function siswaDelete($id)
	{
		$this->daftarSiswaKelasModel->deleteDSiswa($id);
		exit();
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	
	}

    public function filter()
    {
		if($this->request->isAJAX()){

			$id_jurusan = $this->request->getVar('id_jurusan');
			$jurusan = $this->request->getVar('jurusan');
			$tahunmasuk = $this->request->getVar('tahunmasuk');

			if($jurusan == null && $tahunmasuk == null){
				$siswa = $this->siswaModel
				->where('id_jurusan', $id_jurusan)
				->get()->getResultArray();
				
			}else if($jurusan != null && $tahunmasuk == null){
				$siswa = $this->siswaModel
				->where('id_jurusan', $jurusan)
				->get()->getResultArray();

			}else if($jurusan == null && $tahunmasuk != null){
				$siswa = $this->siswaModel
				->where('id_jurusan', $id_jurusan)
				->where('id_tahunajaran', $tahunmasuk)
				->get()->getResultArray();
			}else{
				$siswa = $this->siswaModel
				->where('id_jurusan', $jurusan)
				->where('id_tahunajaran', $tahunmasuk)
				->get()->getResultArray();
			}
			
			$filter = ' ';
			if($siswa != null){
				foreach($siswa as $s){
					
					if($s['s_NISN'] == '0000000000'){
					}else{
						$filter .= '<tr><td><input class="form-check-input" type="checkbox" name="siswa[]" id="'.$s['s_NISN'].'" value="'.$s['s_NISN'].'"></td><td>'.$s['s_NISN'].'</td><td>'.$s['s_namalengkap'].'</td></tr>';
					}
				};
			}else{
				$filter .= '<tr><td colspan="3" class="text-center"> Tidak Ada Siswa</td></tr>';
				
			}

			$data = [
				'title' => 'Kelas',
				'filter' => $filter,
				'berhasil' => [
					'succes' => "Data berhasil dihapus",
				]
			];

			echo json_encode($data);
		}
    }
	
    public function search()
    {
		if($this->request->isAJAX()){

			$keyword = $this->request->getVar('id');

			$siswa = $this->siswaModel->like('s_namalengkap', $keyword)->orLike('s_NISN', $keyword)
			->get()->getResultArray();
			
			$filter = ' ';
			if($siswa != null){
				foreach($siswa as $s){
					$filter .= '<tr><td><input class="form-check-input" type="checkbox" name="siswa[]" id="'.$s['s_NISN'].'" value="'.$s['s_NISN'].'"></td><td>'.$s['s_NISN'].'</td><td>'.$s['s_namalengkap'].'</td></tr>';
				};
			}else{
				$filter .= '<tr><td colspan="3" class="text-center"> Tidak Ada Siswa</td></tr>';
				
			}

			$data = [
				'title' => 'Kelas',
				'filter' => $filter,
				'berhasil' => [
					'succes' => "Data berhasil dihapus",
				]
			];

			echo json_encode($data);
		}
    }
	
    public function getTingkat()
	{
		if($this->request->isAJAX()){
			$tingkat = $this->request->getVar('id');

			$isidata = '<option value=""> Pilih Tingkat </option>';
			
			foreach($this->tingkatModel->getTingkat($tingkat) as $row ) :
				$isidata .= '<option value="' . $row['id_tingkat'] . '">' . $row['nama_tingkat'] . '</option>';
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
	}

    public function getKelas()
	{
		if($this->request->isAJAX()){
			$id_kelas = $this->request->getVar('id');

			$kelas = $this->kelasModel->where(['tb_kelas.id_tahunajaran'=> $id_kelas])->findAll();

			$isidata = '<option value=""> Pilih Tingkat </option>';
			
			foreach($kelas as $row ) :
				$isidata .= '<option value="' . $row['id_kelas'] . '">' . $row['nama_kelas'] . '</option>';
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
	}

	public function save()
	{
		if($this->request->isAJAX()){
			
			$valid = $this->validate([
				'nama_kelas' => [
					'label' => "Nama Kelas",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'jurusan' => [
					'label' => "Jurusan",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'tahunajaran' => [
					'label' => "Tahun Ajaran",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'tingkat' => [
					'label' => "Tingkat/Kelas",
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
						'nama_kelas' => $validation->getError('nama_kelas'),
						'tahunajaran' => $validation->getError('tahunajaran'),
						'jurusan' => $validation->getError('jurusan'),
						'tingkat' => $validation->getError('tingkat')
					]
				];

			}else{
				
				$this->kelasModel->save([
					'nama_kelas' => $this->request->getVar('nama_kelas'),
					'id_tahunajaran' => $this->request->getVar('tahunajaran'),
					'id_jurusan' => $this->request->getVar('jurusan'),
					'id_tingkat' => $this->request->getVar('tingkat')
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

			if($this->request->getVar('d_id_kelas') != null){
				
				$id = $this->request->getVar('d_id_kelas');
				$this->kelasModel->deleteKelas($id);

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
	
	public function deleteSiswaKelas()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('d_siswa_siswa') != null){
				
				$id = $this->request->getVar('d_siswa_siswa');
				$this->daftarSiswaKelasModel->deleteDSiswa($id);

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

			if($this->request->getVar('u_nama_kelas') ==  $this->request->getVar('l_nama_kelas')){
				$rulesKat = 'required';
			}else{
				$rulesKat = 'required|is_unique[tb_kelas.nama_kelas]';
			}
			$valid = $this->validate([
				'u_nama_kelas' => [
					'label' => "Nama Kelas",
					'rules' => $rulesKat,
					'errors' => [
						'required' => '{field} harus diisi.',
						'is_unique' => '{field} sudah terdaftar.',
					]
				],
				'u_jurusan' => [
					'label' => "Jurusan",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'u_tahunajaran' => [
					'label' => "Tahun Ajaran",
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
						'u_nama_kelas' => $validation->getError('u_nama_kelas'),
						'u_tahunajaran' => $validation->getError('u_tahunajaran'),
						'u_jurusan' => $validation->getError('u_jurusan')
					]
				];

			}else{ 
				
				$this->kelasModel->save([
					'id_kelas' => $this->request->getVar('u_id_kelas'),
					'nama_kelas' => $this->request->getVar('u_nama_kelas'),
					'id_jurusan' => $this->request->getVar('u_jurusan'),
					'id_tahunajaran' => $this->request->getVar('u_tahunajaran')
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
	
	public function addSiswa()
	{
		if($this->request->isAJAX()){

			$siswa = $_POST['siswa'];
			$dsiswa = [];

			for ($i=0; $i < count($siswa); $i++) {
								
				$dsiswa = $this->daftarSiswaKelasModel->where('s_NISN', $siswa[$i])->where('tb_kelas.id_kelas', $this->request->getVar('id_kelas'))->where('tb_kelas.id_tahunajaran', $this->request->getVar('id_tahunajaran'))
				->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarsiswakelas.id_kelas')
				->findAll();
				
				if($dsiswa == null){
					$this->daftarSiswaKelasModel->save([
						'id_kelas' => $this->request->getVar('id_kelas'),
						's_NISN' => $siswa[$i]
					]);
				}
			}

			$msg = [
				'berhasil' => [
					'succes' => "Berhasil",
				]
			];

			echo json_encode($msg);
        }
	}
	
	public function ubahKelas($id_kelas)
	{
		if($this->request->isAJAX()){
			
			$kelas = $this->kelasModel->where(['tb_kelas.id_kelas'=> $id_kelas])->findAll();
			
			foreach($kelas as $k) : 
				$this->kelasModel->save([
					'id_kelas' => $id_kelas,
					'nama_kelas' => $k['nama_kelas'],
					'id_tahunajaran' => $k['id_tahunajaran'],
					'id_jurusan' => $k['id_jurusan'],
					'id_tingkat' => $this->request->getVar('ubah_kelas')
				]);
			endforeach;

			$msg = [
				'berhasil' => [
					'succes' => "Berhasil",
				]
			];

			echo json_encode($msg);
        }
	}
	
}
