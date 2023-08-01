<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\AlamatModel;
use App\Models\KesehatanModel;
use App\Models\PendidikanModel;
use App\Models\MasukModel;
use App\Models\PindahModel;
use App\Models\OrangTuaModel;
use App\Models\WaliModel;
use App\Models\CatatanModel;
use App\Models\KepribadianModel;
use App\Models\PenyakitKhususModel;
use App\Models\TahunAjaranModel;
use App\Models\DaftarSiswaKelasModel;
use App\Models\BeasiswaModel;
use App\Models\PrestasiModel;
use App\Models\KehadiranModel;
use App\Models\JenisKelaminModel;
use App\Models\JurusanModel;
use App\Models\NilaiModel;

use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style_NumberFormat;

class Siswa extends BaseController
{
    protected $siswaModel;
    protected $alamatModel;
    protected $kesehatanModel;
    protected $pendidikanModel;
    protected $masukModel;
    protected $pindahModel;
    protected $orangTuaModel;
    protected $waliModel;
    protected $catatanModel;
    protected $kepribadianModel;
    protected $penyakitKhususModel;
    protected $tahunajaranModel;
    protected $daftarSiswaKelasModel;
    protected $beasiswaModel;
    protected $prestasiModel;
    protected $kehadiranModel;
    protected $jenisKelaminModel;
    protected $jurusanModel;
    protected $nilaiModel;
     
    public function __construct()
    {
		helper('form');
        $this->siswaModel = new SiswaModel();
        $this->alamatModel = new AlamatModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->masukModel = new MasukModel();
        $this->pindahModel = new PindahModel();
        $this->orangTuaModel = new OrangTuaModel();
        $this->waliModel = new WaliModel();
        $this->catatanModel = new CatatanModel();
        $this->kepribadianModel = new KepribadianModel();
        $this->kesehatanModel = new KesehatanModel();
        $this->penyakitKhususModel = new PenyakitKhususModel();
        $this->daftarSiswaKelasModel = new DaftarSiswaKelasModel();
        $this->tahunajaranModel = new TahunajaranModel();
        $this->beasiswaModel = new BeasiswaModel();
        $this->prestasiModel = new PrestasiModel();
        $this->kehadiranModel = new KehadiranModel();
        $this->jenisKelaminModel = new JenisKelaminModel();
        $this->jurusanModel = new JurusanModel();
        $this->nilaiModel = new NilaiModel();
    }

    public function index()
    {
        $tahunajaran = $this->tahunajaranModel->orderBy("id_tahunajaran", 'DESC')->findAll();
        $jurusanModel = $this->jurusanModel->findAll();
        $jk = $this->jenisKelaminModel->findAll();
        $siswa = $this->siswaModel->findAll();
		$prov = $this->siswaModel->getProv();

        $data = [
            'title' => 'Siswa',
            'siswa' => $siswa,
            'tahunajaran' => $tahunajaran,
            'jurusan' => $jurusanModel,
            'jk' => $jk,
            'prov' => $prov
        ];

        return view('bukuInduk/siswa', $data);
    }

	public function save()
	{
		if($this->request->isAJAX()){


			$valid = $this->validate([
				'id_tahunajaran' => [
					'label' => "Tahun Ajaran",
					'rules' => 'required',
					'errors' => [
						'required' => 'Pilih {field} terlebih dahulu.'
					]
				],
				'id_jurusan' => [
					'label' => "Jurusan",
					'rules' => 'required',
					'errors' => [
						'required' => 'Pilih {field} terlebih dahulu.'
					]
				],
				's_NISN' => [
					'label' => "Nomor Induk / NISN",
					'rules' => 'required|is_unique[tb_siswa.s_NISN]',
					'errors' => [
						'required' => '{field} harus diisi.',
						'is_unique' => '{field} sudah terdaftar'
					]
				],
				's_namalengkap' => [
					'label' => "Nama Lengkap",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'id_jeniskelamin' => [
					'label' => "Jenis Kelamin",
					'rules' => 'required',
					'errors' => [
						'required' => 'Pilih {field} terlebih dahulu.'
					]
				],
				's_tempatlahir' => [
					'label' => "Tempat Lahir",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				's_tanggallahir' => [
					'label' => "Tanggal Lahir",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				's_rt' => [
					'label' => "RT",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				's_rw' => [
					'label' => "RW",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswaAddSubdis' => [
					'label' => "Kelurahan",
					'rules' => 'required',
					'errors' => [
						'required' => 'Pilih {field} terlebih dahulu.'
					]
				],
				'siswaAddDis' => [
					'label' => "Kecamatan",
					'rules' => 'required',
					'errors' => [
						'required' => 'Pilih {field} terlebih dahulu.'
					]
				],
				'siswaAddCity' => [
					'label' => "Kabupaten",
					'rules' => 'required',
					'errors' => [
						'required' => 'Pilih {field} terlebih dahulu.'
					]
				],
				'siswaAddProv' => [
					'label' => "Provinsi",
					'rules' => 'required',
					'errors' => [
						'required' => 'Pilih {field} terlebih dahulu.'
					]
				],
				's_alamat' => [
					'label' => "Alamat Peserta Didik",
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
						
						'id_tahunajaran' => $validation->getError('id_tahunajaran'),
						'id_jurusan' => $validation->getError('id_jurusan'),
						's_NISN' => $validation->getError('s_NISN'),
						's_namalengkap' => $validation->getError('s_namalengkap'),
						'id_jeniskelamin' => $validation->getError('id_jeniskelamin'),
						's_tempatlahir' => $validation->getError('s_tempatlahir'),
						's_tanggallahir' => $validation->getError('s_tanggallahir'),
						
						's_rt' => $validation->getError('s_rt'),
						's_rw' => $validation->getError('s_rw'),
						'siswaAddSubdis' => $validation->getError('siswaAddSubdis'),
						'siswaAddDis' => $validation->getError('siswaAddDis'),
						'siswaAddCity' => $validation->getError('siswaAddCity'),
						'siswaAddProv' => $validation->getError('siswaAddProv'),
						's_alamat' => $validation->getError('s_alamat')
					]
				];

			}else{
				
				$this->siswaModel->save([
					'id_tahunajaran' => $this->request->getVar('id_tahunajaran'),
					'id_jurusan' => $this->request->getVar('id_jurusan'),
					's_NISN' => $this->request->getVar('s_NISN'),
					's_namalengkap' => $this->request->getVar('s_namalengkap'),
					'id_jeniskelamin' => $this->request->getVar('id_jeniskelamin'),
					's_tempatlahir' => $this->request->getVar('s_tempatlahir'),
					's_tanggallahir' => $this->request->getVar('s_tanggallahir')
				]);

				$this->alamatModel->save([
					's_rt' => $this->request->getVar('s_rt'),
					's_rw' => $this->request->getVar('s_rw'),
					'subdis_id' => $this->request->getVar('siswaAddSubdis'),
					'dis_id' => $this->request->getVar('siswaAddDis'),
					'city_id' => $this->request->getVar('siswaAddCity'),
					'prov_id' => $this->request->getVar('siswaAddProv'),
					's_alamat' => $this->request->getVar('s_alamat'),
					's_NISN' => $this->request->getVar('s_NISN')
				]);

				$this->kesehatanModel->save([
					's_NISN' => $this->request->getVar('s_NISN')
				]);

				$this->pendidikanModel->save([
					's_NISN' => $this->request->getVar('s_NISN')
				]);

				$isidata = '<input type="hidden" class="form-control" id="next_data_nisn" name="next_data_nisn" value="'. $this->request->getVar('s_NISN') .'">';

				$msg = [
					'berhasil' => [
						'data' => $isidata,
					]
				];
			}

			echo json_encode($msg);
        }
	}

	public function delete()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('d_id_Siswa') != null){
				
				$id = $this->request->getVar('d_id_Siswa');
				$this->siswaModel->deleteSiswa($id);

				$msg = [
					'berhasil' => [
						'succes' => "Data berhasil dihapus",
					]
				];

			}else{ 
				
				$msg = [
					'error' => [
						'd_id_siswa' => 'Data gagal dihapus',
					]
				];
			}

			echo json_encode($msg);
		}
	}
	
    public function edit($s_nisn)
    {
		if($s_nisn == "baru"){
			$s_nisn = $_POST['next_data_nisn'];
		}

        $search_kelas = $this->daftarSiswaKelasModel->where('s_nisn', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarsiswakelas.id_kelas')
        ->findAll();

        $tahunajaran = $this->tahunajaranModel->findAll();
        $jurusan = $this->jurusanModel->findAll();
        $jk = $this->jenisKelaminModel->findAll();
        $siswa = $this->siswaModel->getSiswaDetail($s_nisn);
        $alamat = $this->alamatModel->getSiswaDetail($s_nisn);
        $masuk = $this->masukModel->getSiswaDetail($s_nisn);
        $pindah = $this->pindahModel->getSiswaDetail($s_nisn);
        $pendidikan = $this->pendidikanModel->getSiswaDetail($s_nisn);
        $catatan = $this->catatanModel->getSiswaDetail($s_nisn);
        $kesehatan = $this->kesehatanModel->getSiswaDetail($s_nisn);
        $penyakitKhusus = $this->penyakitKhususModel->getSiswaDetail($s_nisn);
        $wali = $this->waliModel->getSiswaDetail($s_nisn);
        $prov = $this->siswaModel->getProv();
        $kepribadian = $this->kepribadianModel->getSiswaDetail($s_nisn);
        $prestasi = $this->prestasiModel->getSiswaDetail($s_nisn);
        $beasiswa = $this->beasiswaModel->getSiswaDetail($s_nisn);
        $kehadiran = $this->kehadiranModel->getSiswaDetail($s_nisn);
        $ayah = $this->orangTuaModel->getAyah($s_nisn);
        $ibu = $this->orangTuaModel->getIbu($s_nisn);
		
		
		$baru = [
			'id_masuk' => '',
			'sp_diterimatgl' => '',
			'sp_asalsekolah' => '',
			'sp_tglnoijasah' => '',
			'sp_tglijasah' => '',
			'sp_thnskhun' => '',
			'sp_thnnoskhun' => '',
			'sp_dikelas' => '',
			'sp_drsekolah' => '',
			'sp_alasanpindah' => '',
			'sp_jenis' => '',
			's_NISN' => ''
		];

		$pindahan = [
			'id_masuk' => '',
			'sp_diterimatgl' => '',
			'sp_asalsekolah' => '',
			'sp_tglnoijasah' => '',
			'sp_tglijasah' => '',
			'sp_thnskhun' => '',
			'sp_thnnoskhun' => '',
			'sp_dikelas' => '',
			'sp_drsekolah' => '',
			'sp_alasanpindah' => '',
			'sp_jenis' => '',
			's_NISN' => ''
		];

		foreach($masuk as $m){
			if($m['sp_jenis'] == 'Baru' ){
				$baru = [
					'id_masuk' => $m['id_masuk'],
					'sp_diterimatgl' => $m['sp_diterimatgl'],
					'sp_asalsekolah' => $m['sp_asalsekolah'],
					'sp_tglnoijasah' => $m['sp_tglnoijasah'],
					'sp_tglijasah' => $m['sp_tglijasah'],
					'sp_thnskhun' => $m['sp_thnskhun'],
					'sp_thnnoskhun' => $m['sp_thnnoskhun'],
					'sp_dikelas' => $m['sp_dikelas'],
					'sp_drsekolah' => $m['sp_drsekolah'],
					'sp_alasanpindah' => $m['sp_alasanpindah'],
					'sp_jenis' => $m['sp_jenis'],
					's_NISN' => $m['s_NISN']
				];
			}else{
				$pindahan = [
					'id_masuk' => $m['id_masuk'],
					'sp_diterimatgl' => $m['sp_diterimatgl'],
					'sp_asalsekolah' => $m['sp_asalsekolah'],
					'sp_tglnoijasah' => $m['sp_tglnoijasah'],
					'sp_tglijasah' => $m['sp_tglijasah'],
					'sp_thnskhun' => $m['sp_thnskhun'],
					'sp_thnnoskhun' => $m['sp_thnnoskhun'],
					'sp_dikelas' => $m['sp_dikelas'],
					'sp_drsekolah' => $m['sp_drsekolah'],
					'sp_alasanpindah' => $m['sp_alasanpindah'],
					'sp_jenis' => $m['sp_jenis'],
					's_NISN' => $m['s_NISN']
				];
			}
		}
		
        $data = [
            'title' => 'Ubah Siswa',
            'siswa' => $siswa,
            'alamat' => $alamat,
            'tahunajaran' => $tahunajaran,
            'jurusan' => $jurusan,
            'jeniskelamin' => $jk,
            'prov' => $prov,
            'baru' => $baru,
            'pindahan' => $pindahan,
            'pindah' => '',
            'pendidikan' => $pendidikan,
            'catatan' => '',
            'kesehatan' => $kesehatan,
            'penyakit' => $penyakitKhusus,
            'kepribadian' => '',
            'wali' => '',
            'ayah' => '',
            'ibu' => '',
            'prestasi' => $prestasi,
            'beasiswa' => $beasiswa,
            'kehadiran' => $kehadiran,
			'search_kelas' => $search_kelas,
        ];
		

		if($pindah != null){
			$data['pindah'] = $pindah;
		};
		if($wali != null){
			$data['wali'] = $wali;
		};
		if($kepribadian != null){
			$data['kepribadian'] = $kepribadian;
		};
		if($catatan != null){
			$data['catatan'] = $catatan;
		};
		if($ibu != null){
			$data['ibu'] = $ibu;
		};
		if($ayah != null){
			$data['ayah'] = $ayah;
		};

        return view('bukuInduk/edit', $data);
    }

	public function update()
	{

		if($this->request->isAJAX()){
			
			$siswaditerima= 'sp_diterimatgl';
			if($this->request->getVar('sp_diterimatgl') == null){
				$siswaditerima = 'sp_diterimatgl';
			}
			
			if($this->request->getVar('sp_diterimatgl_p') != null){
				$siswaditerima = 'sp_diterimatgl_p';
			}

			$valid = $this->validate([
				'siswa_nisn' => [
					'label' => "Nomor Induk / NISN",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswa_nl' => [
					'label' => "Nama Lengkap",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswa_jk' => [
					'label' => "Jenis Kelamin",
					'rules' => 'required',
					'errors' => [
						'required' => 'Pilih {field} terlebih dahulu.'
					]
				],
				'siswa_tempatlahir' => [
					'label' => "Tempat Lahir",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswa_tgllahir' => [
					'label' => "Tanggal Lahir",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],

				//ALAMAT
				'siswaAddAlamat' => [
					'label' => "Alamat",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswaAddRT' => [
					'label' => "RT",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswaAddRW' => [
					'label' => "RW",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswaAddProv' => [
					'label' => "Provinsi",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswaAddCity' => [
					'label' => "Kabupaten",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswaAddDis' => [
					'label' => "Kecamatan",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswaAddSubdis' => [
					'label' => "Kelurahan",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],

				//KESEHATAN

				//PENDIDIKAN
				'sp_asalsekolah' => [
					'label' => "Asal SMP/MTs",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				$siswaditerima => [
					'label' => "Tanggal Diterima",
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
						//SISWA
						'siswa_nisn' => $validation->getError('siswa_nisn'),
						'siswa_nl' => $validation->getError('siswa_nl'),
						'siswa_jk' => $validation->getError('siswa_jk'),
						'siswa_tempatlahir' => $validation->getError('siswa_tempatlahir'),
						'siswa_tgllahir' => $validation->getError('siswa_tgllahir'),
						
						//ALAMAT
						'siswaAddAlamat' => $validation->getError('siswaAddAlamat'),
						'siswaAddRT' => $validation->getError('siswaAddRT'),
						'siswaAddRW' => $validation->getError('siswaAddRW'),
						'siswaAddProv' => $validation->getError('siswaAddProv'),
						'siswaAddCity' => $validation->getError('siswaAddCity'),
						'siswaAddDis' => $validation->getError('siswaAddDis'),
						'siswaAddSubdis' => $validation->getError('siswaAddSubdis'),

						//PENDIDIKAN
						'sp_asalsekolah' => $validation->getError('sp_asalsekolah'),
						'sp_diterimatgl' => $validation->getError('sp_diterimatgl'),
						'sp_diterimatgl_p' => $validation->getError('sp_diterimatgl_p'),
					]
				];

			}else{

				$NISN = $this->request->getVar('siswa_nisn');
				$siswa = $this->siswaModel->findAll();

				foreach($siswa as $s){
					if($s['s_NISN'] == $NISN){
						$NISN = $this->request->getVar('siswa_nisn_lama');
					}
				}

				if($NISN != $this->request->getVar('siswa_nisn_lama')){
					
					
					$dskd = $this->daftarSiswaKelasModel->where('s_NISN', $this->request->getVar('siswa_nisn_lama'))
					->findAll();
					$nilaid = $this->nilaiModel->where('s_NISN', $this->request->getVar('siswa_nisn_lama'))
					->findAll();
					$beasiswad = $this->beasiswaModel->where('s_NISN', $this->request->getVar('siswa_nisn_lama'))
					->findAll();
					$prestasid = $this->prestasiModel->where('s_NISN', $this->request->getVar('siswa_nisn_lama'))
					->findAll();
					$penyakitd = $this->penyakitKhususModel->where('s_NISN', $this->request->getVar('siswa_nisn_lama'))
					->findAll();

					foreach($dskd as $d){
						$this->daftarSiswaKelasModel->save([
							'id_daftarsiswakelas' => $d['id_daftarsiswakelas'],
							's_NISN' => '0000000000'
						]);
					}
					foreach($nilaid as $n){
						$this->nilaiModel->save([
							'id_nilai' => $n['id_nilai'],
							's_NISN' => '0000000000'
						]);
					}
					foreach($beasiswad as $b){
						$this->beasiswaModel->save([
							'id_beasiswa' => $b['id_beasiswa'],
							's_NISN' => '0000000000'
						]);
					}
					foreach($prestasid as $p){
						$this->prestasiModel->save([
							'id_prestasi' => $p['id_prestasi'],
							's_NISN' => '0000000000'
						]);
					}
					foreach($penyakitd as $pk){
						$this->penyakitKhususModel->save([
							'id_penyakit' => $pk['id_penyakit'],
							's_NISN' => '0000000000'
						]);
					}

					$this->alamatModel->save([
						'id_alamat' => $this->request->getVar('id_alamat'),
						's_NISN' => '0000000000'
					]);

					$this->kesehatanModel->save([
						'id_kesehatan' => $this->request->getVar('id_kesehatan'),
						's_NISN' => '0000000000'
					]);
					
					$this->masukModel->save([
						'id_masuk' => $this->request->getVar('id_masuk'),
						's_NISN' => '0000000000'
					]);

					$this->masukModel->save([
						'id_masuk' => $this->request->getVar('id_pindahan'),
						's_NISN' => '0000000000'
					]);
					
					$this->pendidikanModel->save([
						'id_pendidikan' => $this->request->getVar('id_pendidikan'),
						's_NISN' => '0000000000'
					]);

					$this->pindahModel->save([
						'id_pindah' => $this->request->getVar('id_pindah'),
						's_NISN' => '0000000000'
					]);

					$this->pendidikanModel->save([
						'id_pendidikan' => $this->request->getVar('id_pendidikan'),
						's_NISN' => '0000000000'
					]);

					//AYAH
					$this->orangTuaModel->save([
						'id_orangtua' => $this->request->getVar('id_orangtua_ayah'),
						's_NISN' => '0000000000'
					]);

					//IBU
					$this->orangTuaModel->save([
						'id_orangtua' => $this->request->getVar('id_orangtua_ibu'),
						's_NISN' => '0000000000'
					]);

					//WALi
					$this->waliModel->save([
						'id_wali' => $this->request->getVar('id_wali'),
						's_NISN' => '0000000000'
					]);

					$this->kepribadianModel->save([
						'id_kepribadian' => $this->request->getVar('id_kepribadian'),
						's_NISN' => '0000000000'
					]);

					$this->catatanModel->save([
						'id_catatanpenting' => $this->request->getVar('id_catatanpenting'),
						's_NISN' => '0000000000'
					]);
					
					$this->siswaModel->save([
						'id_siswa' => $this->request->getVar('id_siswa'),
						's_NISN' => $NISN,
						's_namalengkap' => $this->request->getVar('siswa_nl'),
						's_namapanggilan' => $this->request->getVar('siswa_np'),
						'id_jeniskelamin' => $this->request->getVar('siswa_jk'),
						's_tempatlahir' => $this->request->getVar('siswa_tempatlahir'),
						's_tanggallahir' => $this->request->getVar('siswa_tgllahir'),
						's_agama' => $this->request->getVar('siswa_agama'),
						's_kewanegaraan' => $this->request->getVar('siswa_kewanegaraan'),
						's_anakke' => $this->request->getVar('siswa_anakke'),
						's_anakyp' => $this->request->getVar('siswa_anak'),
						's_bahasaharian' => $this->request->getVar('s_bahasaharian'),
						's_kandung' => $this->request->getVar('s_kandung'),
						's_tiri' => $this->request->getVar('s_tiri'),
						's_angkat' => $this->request->getVar('s_angkat')
					]);

					$this->alamatModel->save([
						'id_alamat' => $this->request->getVar('id_alamat'),
						's_alamat' => $this->request->getVar('siswaAddAlamat'),
						's_rt' => $this->request->getVar('siswaAddRT'),
						's_rw' => $this->request->getVar('siswaAddRW'),
						'subdis_id' => $this->request->getVar('siswaAddSubdis'),
						'dis_id' => $this->request->getVar('siswaAddDis'),
						'city_id' => $this->request->getVar('siswaAddCity'),
						'prov_id' => $this->request->getVar('siswaAddProv'),
						's_telprumah' => $this->request->getVar('siswaAddNoTelp'),
						's_tinggal' => $this->request->getVar('siswaAddTinggalDengan'),
						's_jaraksekolah' => $this->request->getVar('siswaAddJarakTinggal'),
						's_kendaraan' => $this->request->getVar('siswaKendaraan'),
						's_NISN' => $NISN
					]);

					$this->kesehatanModel->save([
						'id_kesehatan' => $this->request->getVar('id_kesehatan'),
						's_bbterima' => $this->request->getVar('siswaBBmasuk'),
						's_tbterima' => $this->request->getVar('siswaTBMasuk'),
						's_bbkeluar' => $this->request->getVar('siswaBBKeluar'),
						's_tbkeluar' => $this->request->getVar('siswaTBKeluar'),
						's_golongandarah' => $this->request->getVar('siswaGolonganDarah'),
						's_kelainan' => $this->request->getVar('siswaKelainan'),
						's_NISN' => $NISN
					]);
					
					$this->masukModel->save([
						'id_masuk' => $this->request->getVar('id_masuk'),
						'sp_diterimatgl' => $this->request->getVar('sp_diterimatgl'),
						'sp_asalsekolah' => $this->request->getVar('sp_asalsekolah'),
						'sp_tglnoijasah' => $this->request->getVar('sp_tglnoijasah'),
						'sp_tglijasah' => $this->request->getVar('sp_tglijasah'),
						'sp_thnskhun' => $this->request->getVar('sp_thnskhun'),
						'sp_thnnoskhun' => $this->request->getVar('sp_thnnoskhun'),
						'sp_jenis' => 'Baru',
						's_NISN' => $NISN
					]);

					$this->masukModel->save([
						'id_masuk' => $this->request->getVar('id_pindahan'),
						'sp_diterimatgl' => $this->request->getVar('sp_diterimatgl_p'),
						'sp_asalsekolah' => $this->request->getVar('sp_asalsekolah'),
						'sp_tglnoijasah' => $this->request->getVar('sp_tglnoijasah'),
						'sp_tglijasah' => $this->request->getVar('sp_tglijasah'),
						'sp_thnskhun' => $this->request->getVar('sp_thnskhun'),
						'sp_thnnoskhun' => $this->request->getVar('sp_thnnoskhun'),
						'sp_dikelas' => $this->request->getVar('sp_dikelas'),
						'sp_drsekolah' => $this->request->getVar('sp_drsekolah'),
						'sp_alasanpindah' => $this->request->getVar('sp_alasanpindah'),
						'sp_jenis' => 'Pindahan',
						's_NISN' => $NISN
					]);
					
					$this->pendidikanModel->save([
						'id_pendidikan' => $this->request->getVar('id_pendidikan'),
						's_tgltamat' => $this->request->getVar('s_tgltamat'),
						's_noijasah' => $this->request->getVar('s_noijasah'),
						's_melanjutkansekolah' => $this->request->getVar('s_melanjutkansekolah'),
						's_alamat' => $this->request->getVar('s_alamat'),
						's_NISN' => $NISN
					]);

					$this->pindahModel->save([
						'id_pindah' => $this->request->getVar('id_pindah'),
						'pp_kesekolah' => $this->request->getVar('pp_kesekolah'),
						'pp_tglpindah' => $this->request->getVar('pp_tglpindah'),
						'pp_drkelas' => $this->request->getVar('pp_drkelas'),
						'pp_alamatsekolah' => $this->request->getVar('pp_alamatsekolah'),
						'pp_alasanpindah' => $this->request->getVar('pp_alasanpindah'),
						's_NISN' => $NISN
					]);

					$this->pendidikanModel->save([
						'id_pendidikan' => $this->request->getVar('id_pendidikan'),
						's_tglputus' => $this->request->getVar('s_tglputus'),
						's_alasaputus' => $this->request->getVar('s_alasaputus'),
						's_NISN' => $NISN
					]);

					//AYAH
					$this->orangTuaModel->save([
						'id_orangtua' => $this->request->getVar('id_orangtua_ayah'),
						'id_jeniskelamin' => $this->request->getVar('id_jeniskelamin_ayah'),
						'sa_nama' => $this->request->getVar('sa_nama_ayah'),
						'sa_tempatlahir' => $this->request->getVar('sa_tempatlahir_ayah'),
						'sa_tgllahir' => $this->request->getVar('sa_tgllahir_ayah'),
						'sa_kewanegaraan' => $this->request->getVar('sa_kewanegaraan_ayah'),
						'sa_ptertinggi' => $this->request->getVar('sa_ptertinggi_ayah'),
						'sa_pekerjaan' => $this->request->getVar('sa_pekerjaan_ayah'),
						'sa_penghasilan' => $this->request->getVar('sa_penghasilan_ayah'),
						'sa_alamat' => $this->request->getVar('sa_alamat_ayah'),
						's_NISN' => $NISN
					]);

					//IBU
					$this->orangTuaModel->save([
						'id_orangtua' => $this->request->getVar('id_orangtua_ibu'),
						'id_jeniskelamin' => $this->request->getVar('id_jeniskelamin_ibu'),
						'sa_nama' => $this->request->getVar('sa_nama_ibu'),
						'sa_tempatlahir' => $this->request->getVar('sa_tempatlahir_ibu'),
						'sa_tgllahir' => $this->request->getVar('sa_tgllahir_ibu'),
						'sa_kewanegaraan' => $this->request->getVar('sa_kewanegaraan_ibu'),
						'sa_ptertinggi' => $this->request->getVar('sa_ptertinggi_ibu'),
						'sa_pekerjaan' => $this->request->getVar('sa_pekerjaan_ibu'),
						'sa_penghasilan' => $this->request->getVar('sa_penghasilan_ibu'),
						'sa_alamat' => $this->request->getVar('sa_alamat_ibu'),
						's_NISN' => $NISN
					]);

					//LAKI-LAKI
					$this->waliModel->save([
						'id_wali' => $this->request->getVar('id_wali'),
						'sw_nama' => $this->request->getVar('sw_nama'),
						'sw_tempatlahir' => $this->request->getVar('sw_tempatlahir'),
						'sw_tgllahir' => $this->request->getVar('sw_tgllahir'),
						'sw_kewanegaraan' => $this->request->getVar('sw_kewanegaraan'),
						'sw_ptertinggi' => $this->request->getVar('sw_ptertinggi'),
						'sw_pekerjaan' => $this->request->getVar('sw_pekerjaan'),
						'sw_penghasilan' => $this->request->getVar('sw_penghasilan'),
						'sw_alamat' => $this->request->getVar('sw_alamat'),
						'sw_hubunganpeserta' => $this->request->getVar('sw_hubunganpeserta'),
						's_NISN' => $NISN
					]);

					$this->kepribadianModel->save([
						'id_kepribadian' => $this->request->getVar('id_kepribadian'),
						's_intelegensi' => $this->request->getVar('s_intelegensi'),
						's_tgltestiq' => $this->request->getVar('s_tgltestiq'),
						'sk_disiplin' => $this->request->getVar('sk_disiplin'),
						'sk_kreativitas' => $this->request->getVar('sk_kreativitas'),
						'sk_tanggungjawab' => $this->request->getVar('sk_tanggungjawab'),
						'sk_penyesuaiandiri' => $this->request->getVar('sk_penyesuaiandiri'),
						'sk_kemantapanemosi' => $this->request->getVar('sk_kemantapanemosi'),
						'sk_kerjasama' => $this->request->getVar('sk_kerjasama'),
						's_NISN' => $NISN
					]);

					$this->catatanModel->save([
						'id_catatanpenting' => $this->request->getVar('id_catatanpenting'),
						's_catatanpenting' => $this->request->getVar('s_catatanpenting'),
						's_NISN' => $NISN
					]);

				}else{
				
					$this->siswaModel->save([
						'id_siswa' => $this->request->getVar('id_siswa'),
						's_NISN' => $NISN,
						's_namalengkap' => $this->request->getVar('siswa_nl'),
						's_namapanggilan' => $this->request->getVar('siswa_np'),
						'id_jeniskelamin' => $this->request->getVar('siswa_jk'),
						's_tempatlahir' => $this->request->getVar('siswa_tempatlahir'),
						's_tanggallahir' => $this->request->getVar('siswa_tgllahir'),
						's_photo' => $this->request->getVar('siswa_foto'),
						's_agama' => $this->request->getVar('siswa_agama'),
						's_kewanegaraan' => $this->request->getVar('siswa_kewanegaraan'),
						's_anakke' => $this->request->getVar('siswa_anakke'),
						's_anakyp' => $this->request->getVar('siswa_anak'),
						's_bahasaharian' => $this->request->getVar('s_bahasaharian'),
						's_kandung' => $this->request->getVar('s_kandung'),
						's_tiri' => $this->request->getVar('s_tiri'),
						's_angkat' => $this->request->getVar('s_angkat')
					]);

					$this->alamatModel->save([
						'id_alamat' => $this->request->getVar('id_alamat'),
						's_alamat' => $this->request->getVar('siswaAddAlamat'),
						's_rt' => $this->request->getVar('siswaAddRT'),
						's_rw' => $this->request->getVar('siswaAddRW'),
						'subdis_id' => $this->request->getVar('siswaAddSubdis'),
						'dis_id' => $this->request->getVar('siswaAddDis'),
						'city_id' => $this->request->getVar('siswaAddCity'),
						'prov_id' => $this->request->getVar('siswaAddProv'),
						's_telprumah' => $this->request->getVar('siswaAddNoTelp'),
						's_tinggal' => $this->request->getVar('siswaAddTinggalDengan'),
						's_jaraksekolah' => $this->request->getVar('siswaAddJarakTinggal'),
						's_kendaraan' => $this->request->getVar('siswaKendaraan'),
						's_NISN' => $NISN
					]);

					$this->kesehatanModel->save([
						'id_kesehatan' => $this->request->getVar('id_kesehatan'),
						's_bbterima' => $this->request->getVar('siswaBBmasuk'),
						's_tbterima' => $this->request->getVar('siswaTBMasuk'),
						's_bbkeluar' => $this->request->getVar('siswaBBKeluar'),
						's_tbkeluar' => $this->request->getVar('siswaTBKeluar'),
						's_golongandarah' => $this->request->getVar('siswaGolonganDarah'),
						's_kelainan' => $this->request->getVar('siswaKelainan'),
						's_NISN' => $NISN
					]);
					
					$this->masukModel->save([
						'id_masuk' => $this->request->getVar('id_masuk'),
						'sp_diterimatgl' => $this->request->getVar('sp_diterimatgl'),
						'sp_asalsekolah' => $this->request->getVar('sp_asalsekolah'),
						'sp_tglnoijasah' => $this->request->getVar('sp_tglnoijasah'),
						'sp_tglijasah' => $this->request->getVar('sp_tglijasah'),
						'sp_thnskhun' => $this->request->getVar('sp_thnskhun'),
						'sp_thnnoskhun' => $this->request->getVar('sp_thnnoskhun'),
						'sp_jenis' => 'Baru',
						's_NISN' => $NISN
					]);

					$this->masukModel->save([
						'id_masuk' => $this->request->getVar('id_pindahan'),
						'sp_diterimatgl' => $this->request->getVar('sp_diterimatgl_p'),
						'sp_asalsekolah' => $this->request->getVar('sp_asalsekolah'),
						'sp_tglnoijasah' => $this->request->getVar('sp_tglnoijasah'),
						'sp_tglijasah' => $this->request->getVar('sp_tglijasah'),
						'sp_thnskhun' => $this->request->getVar('sp_thnskhun'),
						'sp_thnnoskhun' => $this->request->getVar('sp_thnnoskhun'),
						'sp_dikelas' => $this->request->getVar('sp_dikelas'),
						'sp_drsekolah' => $this->request->getVar('sp_drsekolah'),
						'sp_alasanpindah' => $this->request->getVar('sp_alasanpindah'),
						'sp_jenis' => 'Pindahan',
						's_NISN' => $NISN
					]);
					
					$this->pendidikanModel->save([
						'id_pendidikan' => $this->request->getVar('id_pendidikan'),
						's_tgltamat' => $this->request->getVar('s_tgltamat'),
						's_noijasah' => $this->request->getVar('s_noijasah'),
						's_melanjutkansekolah' => $this->request->getVar('s_melanjutkansekolah'),
						's_alamat' => $this->request->getVar('s_alamat'),
						's_NISN' => $NISN
					]);

					$this->pindahModel->save([
						'id_pindah' => $this->request->getVar('id_pindah'),
						'pp_kesekolah' => $this->request->getVar('pp_kesekolah'),
						'pp_tglpindah' => $this->request->getVar('pp_tglpindah'),
						'pp_drkelas' => $this->request->getVar('pp_drkelas'),
						'pp_alamatsekolah' => $this->request->getVar('pp_alamatsekolah'),
						'pp_alasanpindah' => $this->request->getVar('pp_alasanpindah'),
						's_NISN' => $NISN
					]);

					$this->pendidikanModel->save([
						'id_pendidikan' => $this->request->getVar('id_pendidikan'),
						's_tglputus' => $this->request->getVar('s_tglputus'),
						's_alasaputus' => $this->request->getVar('s_alasaputus'),
						's_NISN' => $NISN
					]);

					//AYAH
					$this->orangTuaModel->save([
						'id_orangtua' => $this->request->getVar('id_orangtua_ayah'),
						'id_jeniskelamin' => $this->request->getVar('id_jeniskelamin_ayah'),
						'sa_nama' => $this->request->getVar('sa_nama_ayah'),
						'sa_tempatlahir' => $this->request->getVar('sa_tempatlahir_ayah'),
						'sa_tgllahir' => $this->request->getVar('sa_tgllahir_ayah'),
						'sa_kewanegaraan' => $this->request->getVar('sa_kewanegaraan_ayah'),
						'sa_ptertinggi' => $this->request->getVar('sa_ptertinggi_ayah'),
						'sa_pekerjaan' => $this->request->getVar('sa_pekerjaan_ayah'),
						'sa_penghasilan' => $this->request->getVar('sa_penghasilan_ayah'),
						'sa_alamat' => $this->request->getVar('sa_alamat_ayah'),
						's_NISN' => $NISN
					]);

					//IBU
					$this->orangTuaModel->save([
						'id_orangtua' => $this->request->getVar('id_orangtua_ibu'),
						'id_jeniskelamin' => $this->request->getVar('id_jeniskelamin_ibu'),
						'sa_nama' => $this->request->getVar('sa_nama_ibu'),
						'sa_tempatlahir' => $this->request->getVar('sa_tempatlahir_ibu'),
						'sa_tgllahir' => $this->request->getVar('sa_tgllahir_ibu'),
						'sa_kewanegaraan' => $this->request->getVar('sa_kewanegaraan_ibu'),
						'sa_ptertinggi' => $this->request->getVar('sa_ptertinggi_ibu'),
						'sa_pekerjaan' => $this->request->getVar('sa_pekerjaan_ibu'),
						'sa_penghasilan' => $this->request->getVar('sa_penghasilan_ibu'),
						'sa_alamat' => $this->request->getVar('sa_alamat_ibu'),
						's_NISN' => $NISN
					]);

					//LAKI-LAKI
					$this->waliModel->save([
						'id_wali' => $this->request->getVar('id_wali'),
						'sw_nama' => $this->request->getVar('sw_nama'),
						'sw_tempatlahir' => $this->request->getVar('sw_tempatlahir'),
						'sw_tgllahir' => $this->request->getVar('sw_tgllahir'),
						'sw_kewanegaraan' => $this->request->getVar('sw_kewanegaraan'),
						'sw_ptertinggi' => $this->request->getVar('sw_ptertinggi'),
						'sw_pekerjaan' => $this->request->getVar('sw_pekerjaan'),
						'sw_penghasilan' => $this->request->getVar('sw_penghasilan'),
						'sw_alamat' => $this->request->getVar('sw_alamat'),
						'sw_hubunganpeserta' => $this->request->getVar('sw_hubunganpeserta'),
						's_NISN' => $NISN
					]);

					$this->kepribadianModel->save([
						'id_kepribadian' => $this->request->getVar('id_kepribadian'),
						's_intelegensi' => $this->request->getVar('s_intelegensi'),
						's_tgltestiq' => $this->request->getVar('s_tgltestiq'),
						'sk_disiplin' => $this->request->getVar('sk_disiplin'),
						'sk_kreativitas' => $this->request->getVar('sk_kreativitas'),
						'sk_tanggungjawab' => $this->request->getVar('sk_tanggungjawab'),
						'sk_penyesuaiandiri' => $this->request->getVar('sk_penyesuaiandiri'),
						'sk_kemantapanemosi' => $this->request->getVar('sk_kemantapanemosi'),
						'sk_kerjasama' => $this->request->getVar('sk_kerjasama'),
						's_NISN' => $NISN
					]);

					$this->catatanModel->save([
						'id_catatanpenting' => $this->request->getVar('id_catatanpenting'),
						's_catatanpenting' => $this->request->getVar('s_catatanpenting'),
						's_NISN' => $NISN
					]);
				}

				$msg = [
					'berhasil' => [
						'succes' => "Berhasil",
					],
					'id' => $NISN
				];
			}

			echo json_encode($msg);
        }
	}
	
	public function profile()
	{
		$nisn = $this->siswaModel->where('s_NISN', $this->request->getVar('profile_s_nisn'))->first();
		
		$fileProfile = $this->request->getFile('s_photo');

		if($fileProfile->getError() == 4){
			$namaProfile = 'default.png';
		}else{
			$namaProfile = $fileProfile->getRandomName();
			$fileProfile->move('assets/img/photo', $namaProfile);
		}

		$this->siswaModel->save([
			'id_siswa' => $nisn['id_siswa'],
			's_NISN' => $nisn['s_NISN'],
			's_photo' => $namaProfile
		]);

		return redirect()->to('/siswa/edit/'. $nisn['s_NISN']);

	}

	public function import(){
		$file = $this->request->getFile('file_siswa');
		
		new PHPExcel;

		$fileLocation = $file->getTempName();

		$objPHPExcel = PHPExcel_IOFactory::load($fileLocation);

		$sheet = $objPHPExcel->getActiveSheet()->toArray();

		foreach($sheet as $x => $excel){
			// skip judul tabel
			if($x == 0){
				continue;
			}
			if($x == 1){
				continue;
			}
			if($x == 2){
				continue;
			}
			if($x == 3){
				continue;
			}
			if($x == 4){
				continue;
			}


			$nis = $this->siswaModel->cekSiswa($excel['0']);
			
			// dd($nis);

			if($excel['0'] != null){
				for ($f = 0; $f <= 101; $f++) {
						if($excel[$f] == null){
							$excel[$f] = ' ';
						}
				}
			} else {
				continue;
			}

			if($nis == null){
				$nis['s_NISN'] = " ";
			}

			if($excel['0'] != $nis['s_NISN']) {
			}else{
				continue;

			}

			if($excel['3'] == 'Laki-laki'){
				$jk=1;
			}else{
				$jk=2;
			}

			$this->siswaModel->save([
				's_NISN' => $excel['0'],
				's_namalengkap' => $excel['1'],
				's_namapanggilan' => $excel['2'],
				'id_jeniskelamin' => $jk,
				's_tempatlahir' => $excel['4'],
				's_tanggallahir' => $excel['5'],
				's_photo' => $excel['5'],
				's_agama' => $excel['6'],
				's_kewanegaraan' => $excel['7'],
				's_anakke' => $excel['8'],
				's_anakyp' => $excel['12'],
				's_bahasaharian' => $excel['13'],
				's_kandung' => $excel['9'],
				's_tiri' => $excel['10'],
				's_angkat' => $excel['11'],
				'id_tahunajaran' => $this->request->getVar('id_tahunajaran'),
				'id_jurusan' => $this->request->getVar('id_jurusan')
			]);

			$this->alamatModel->save([
				's_alamat' => $excel['14'],
				's_rt' => $excel['15'],
				's_rw' => $excel['16'],
				'subdis_id' => 0,
				'dis_id' => 0,
				'city_id' => 0,
				'prov_id' => 0,
				's_telprumah' => $excel['17'],
				's_tinggal' => $excel['18'],
				's_jaraksekolah' => $excel['19'],
				's_kendaraan' => $excel['20'],
				's_NISN' => $excel['0']
			]);

			$this->kesehatanModel->save([
				's_bbterima' => $excel['21'],
				's_tbterima' => $excel['22'],
				's_bbkeluar' => $excel['23'],
				's_tbkeluar' => $excel['24'],
				's_golongandarah' => $excel['25'],
				's_kelainan' => $excel['26'],
				's_NISN' => $excel['0']
			]);
			
			$this->masukModel->save([
				'sp_diterimatgl' => $excel['27'],
				'sp_asalsekolah' => $excel['28'],
				'sp_tglnoijasah' => $excel['30'],
				'sp_tglijasah' => $excel['29'],
				'sp_thnskhun' => $excel['31'],
				'sp_thnnoskhun' => $excel['32'],
				'sp_jenis' => 'Baru',
				's_NISN' => $excel['0']
			]);

			$this->masukModel->save([
				'sp_diterimatgl' => $excel['33'],
				'sp_asalsekolah' => $excel['34'],
				'sp_tglnoijasah' => $excel['36'],
				'sp_tglijasah' => $excel['35'],
				'sp_thnskhun' => $excel['37'],
				'sp_thnnoskhun' => $excel['38'],
				'sp_dikelas' => $excel['40'],
				'sp_drsekolah' => $excel['39'],
				'sp_alasanpindah' => $excel['41'],
				'sp_jenis' => 'Pindahan',
				's_NISN' => $excel['0']
			]);
			
			$this->pendidikanModel->save([
				's_tgltamat' => $excel['42'],
				's_noijasah' => $excel['43'],
				's_melanjutkansekolah' => $excel['44'],
				's_alamat' => $excel['45'],
				's_tglputus' => $excel['51'],
				's_alasaputus' => $excel['52'],
				's_NISN' => $excel['0']
			]);

			$this->pindahModel->save([
				'pp_kesekolah' => $excel['47'],
				'pp_tglpindah' => $excel['46'],
				'pp_drkelas' => $excel['48'],
				'pp_alamatsekolah' => $excel['49'],
				'pp_alasanpindah' => $excel['50'],
				's_NISN' => $excel['0']
			]);

			//AYAH
			$this->orangTuaModel->save([
				'id_jeniskelamin' => '1',
				'sa_nama' => $excel['53'],
				'sa_tempatlahir' => $excel['54'],
				'sa_tgllahir' => $excel['55'],
				'sa_kewanegaraan' => $excel['56'],
				'sa_ptertinggi' => $excel['57'],
				'sa_pekerjaan' => $excel['58'],
				'sa_penghasilan' => $excel['59'],
				'sa_alamat' => $excel['60'],
				's_NISN' => $excel['0']
			]);

			//IBU
			$this->orangTuaModel->save([
				'id_jeniskelamin' => '2',
				'sa_nama' => $excel['61'],
				'sa_tempatlahir' => $excel['62'],
				'sa_tgllahir' => $excel['63'],
				'sa_kewanegaraan' => $excel['64'],
				'sa_ptertinggi' => $excel['65'],
				'sa_pekerjaan' => $excel['66'],
				'sa_penghasilan' => $excel['67'],
				'sa_alamat' => $excel['68'],
				's_NISN' => $excel['0']
			]);

			//LAKI-LAKI
			$this->waliModel->save([
				'sw_nama' => $excel['69'],
				'sw_tempatlahir' => $excel['70'],
				'sw_tgllahir' => $excel['71'],
				'sw_kewanegaraan' => $excel['72'],
				'sw_ptertinggi' => $excel['73'],
				'sw_pekerjaan' => $excel['74'],
				'sw_penghasilan' => $excel['75'],
				'sw_alamat' => $excel['76'],
				'sw_hubunganpeserta' => $excel['77'],
				's_NISN' => $excel['0']
			]);

			$this->kepribadianModel->save([
				's_intelegensi' => $excel['78'],
				's_tgltestiq' => $excel['79'],
				'sk_disiplin' => $excel['80'],
				'sk_kreativitas' => $excel['81'],
				'sk_tanggungjawab' => $excel['82'],
				'sk_penyesuaiandiri' => $excel['83'],
				'sk_kemantapanemosi' => $excel['84'],
				'sk_kerjasama' => $excel['85'],
				's_NISN' => $excel['0']
			]);
			
			if($excel['86'] != null || $excel['86'] != " "){
				$this->prestasiModel->save([
					'pre_jenisprestasi' => $excel['86'],
					'pre_keterangan' => $excel['87'],
					's_NISN' => $excel['0']
				]);
			}

			if($excel['88'] != null || $excel['88'] != " "){
				$this->prestasiModel->save([
					'pre_jenisprestasi' => $excel['88'],
					'pre_keterangan' => $excel['89'],
					's_NISN' => $excel['0']
				]);
			}

			if($excel['90'] != null || $excel['90'] != " "){
				$this->prestasiModel->save([
					'pre_jenisprestasi' => $excel['90'],
					'pre_keterangan' => $excel['91'],
					's_NISN' => $excel['0']
				]);
			}
			if($excel['92'] != null || $excel['92'] != " "){
				$this->beasiswaModel->save([
					's_namabeasiswa' => $excel['92'],
					's_tahunbeasiswa' => $excel['93'],
					's_beasiswadari' => $excel['94'],
					's_NISN' => $excel['0']
				]);
			}

			if($excel['95'] != null || $excel['95'] != " "){
				$this->beasiswaModel->save([
					's_namabeasiswa' => $excel['95'],
					's_tahunbeasiswa' => $excel['96'],
					's_beasiswadari' => $excel['97'],
					's_NISN' => $excel['0']
				]);
			}

			if($excel['98'] != null || $excel['98'] != " "){
				$this->beasiswaModel->save([
					's_namabeasiswa' => $excel['98'],
					's_tahunbeasiswa' => $excel['99'],
					's_beasiswadari' => $excel['100'],
					's_NISN' => $excel['0']
				]);
			}

			$this->catatanModel->save([
				's_catatanpenting' => $excel['101'],
				's_NISN' => $excel['0']
			]);
			

		}
		return redirect()->to(base_url('siswa'));
	}	
	
    public function getCity()
	{
		if($this->request->isAJAX()){
			$prov = $this->request->getVar('id');
			$cityId = $this->request->getVar('city');

			$isidata = '<option value=""> Pilih Kabupaten </option>';
			
			foreach($this->siswaModel->getCity($prov) as $row ) :
				if($cityId){
					if($cityId == $row['city_id']){
						$isidata .= '<option value="' . $row['city_id'] . '" selected>' . $row['city_name'] . '</option>';
					}else{
						$isidata .= '<option value="' . $row['city_id'] . '">' . $row['city_name'] . '</option>';
					}
				}else{
					$isidata .= '<option value="' . $row['city_id'] . '">' . $row['city_name'] . '</option>';
				}
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
	}

    public function getDis()
	{
		if($this->request->isAJAX()){
			$city = $this->request->getVar('id');
			$cityId = $this->request->getVar('dis');

			$isidata = '<option value=""> Pilih Kecamatan </option>';
			
			foreach($this->siswaModel->getDis($city) as $row ) :
				if($cityId){
					if($cityId == $row['dis_id']){
						$isidata .= '<option value="' . $row['dis_id'] . '" selected>' . $row['dis_name'] . '</option>';
					}else{
						$isidata .= '<option value="' . $row['dis_id'] . '">' . $row['dis_name'] . '</option>';
					}
				}else{
					$isidata .= '<option value="' . $row['dis_id'] . '">' . $row['dis_name'] . '</option>';
				}
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
	}

    public function getSubdis()
	{
		if($this->request->isAJAX()){
			$dis = $this->request->getVar('id');
			$cityId = $this->request->getVar('subdis');

			$isidata = '<option value=""> Pilih Kelurahan </option>';
			
			foreach($this->siswaModel->getSubdis($dis) as $row ) :
				if($cityId){
					if($cityId == $row['subdis_id']){
						$isidata .= '<option value="' . $row['subdis_id'] . '" selected>' . $row['subdis_name'] . '</option>';
					}else{
						$isidata .= '<option value="' . $row['subdis_id'] . '">' . $row['subdis_name'] . '</option>';
					}
				}else{
					$isidata .= '<option value="' . $row['subdis_id'] . '">' . $row['subdis_name'] . '</option>';
				}
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
	}
    
    public function penyakit()
    {
        $penyakitKhusus = $this->penyakitKhususModel->findAll();

        $data = [
            'penyakit' => $penyakitKhusus,
        ];

        return view('bukuInduk/penyakit', $data);
    }
	
    // public function siswaTA($id_tahunajaran)
	// {
    //     $siswaTA = $this->siswaModel->getSiswaTA($id_tahunajaran);
        
    //     $data = [
    //         'title' => 'Daftar Siswa Tahun Ajaran',
	// 		'daftar' => $siswaTA
	// 	];

	// 	return view('BukuInduk/siswa', $data);
	// }


}
