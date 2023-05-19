<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\TahunAjaranModel;
use App\Models\DaftarSiswaKelasModel;

class Siswa extends BaseController
{
    protected $siswaModel;
    protected $tahunajaranModel;
    protected $daftarSiswaKelasModel;
     
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->daftarSiswaKelasModel = new DaftarSiswaKelasModel();
        $this->tahunajaranModel = new TahunajaranModel();
    }

    public function index()
    {
        $tahunajaran = $this->tahunajaranModel->findAll();
        $siswa = $this->siswaModel->findAll();

        $data = [
            'title' => 'Siswa',
            'siswa' => $siswa,
            'tahunajaran' => $tahunajaran
        ];

        return view('BukuInduk/siswa', $data);
    }

    public function siswaTA($id_tahunajaran)
	{
        $siswaTA = $this->siswaModel->getSiswaTA($id_tahunajaran);
        
        $data = [
            'title' => 'Daftar Siswa Tahun Ajaran',
			'daftar' => $siswaTA
		];

		return view('BukuInduk/siswa', $data);
	}

    public function create()
    {
        $prov = $this->siswaModel->getProv();
        $jeniskelamin = $this->siswaModel->getJK();

        $data = [
            'prov' => $prov,
            'jeniskelamin' => $jeniskelamin,
            'title' => 'Tambah Siswa',
        ];

        return view('BukuInduk/create', $data);
    }

    public function getCity()
	{
		if($this->request->isAJAX()){
			$prov = $this->request->getVar('id');

			$isidata = '<option value=""> Pilih Kabupaten </option>';
			
			foreach($this->siswaModel->getCity($prov) as $row ) :
				$isidata .= '<option value="' . $row['city_id'] . '">' . $row['city_name'] . '</option>';
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

			$isidata = '<option value=""> Pilih Kecamatan </option>';
			
			foreach($this->siswaModel->getDis($city) as $row ) :
				$isidata .= '<option value="' . $row['dis_id'] . '">' . $row['dis_name'] . '</option>';
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

			$isidata = '<option value=""> Pilih Kelurahan </option>';
			
			foreach($this->siswaModel->getSubdis($dis) as $row ) :
				$isidata .= '<option value="' . $row['subdis_id'] . '">' . $row['subdis_name'] . '</option>';
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
				'siswa_agama' => [
					'label' => "Agama",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswa_kewanegaraan' => [
					'label' => "Kewanegaraan",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				// 'siswa_foto' => [
				// 	'rules' => 'uploaded[siswa_foto]|max_size[siswa_foto,1024]|is_image[siswa_foto]|mime_in[siswa_foto,image/jpg,image/jpeg,image/png]',
				// 	'errors' => [
				// 		'uploaded' => 'Pilih foto siswa terlebih dahulu.',
				// 		'max_size' => 'Ukuran gambar terlalu besar.',
				// 		'is_image' => 'Yang anda pilih bukan gambar.',
				// 		'mime_in' => 'Yang anda pilih bukan gambar.'
				// 	]
				// ],
				'siswa_anakke' => [
					'label' => "Anak keberapa",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswa_anak' => [
					'label' => "Anak",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				'siswa_bahasa' => [
					'label' => "Bahasa Sehari-hari",
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
				'siswaBBmasuk' => [
					'label' => "Berat Badan Waktu di terima",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				// 'siswaBBKeluar' => [
				// 	'label' => "Berat Badan Waktu meninggalkan sekolah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				'siswaTBMasuk' => [
					'label' => "Tinggi Badan Waktu di terima",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				// 'siswaTBKeluar' => [
				// 	'label' => "Tinggi BadanWaktu meninggalkan sekolah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'siswaGolonganDarah' => [
				// 	'label' => "Golongan Darah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'siswaKelainan' => [
				// 	'label' => "Kelainan jasmani/ lainnya",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'siswa_sb_jenis_1' => [
				// 	'label' => "Jenis Penyakin",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'siswa_sb_kelas_1' => [
				// 	'label' => "Kelas",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'siswa_sb_tahun_1' => [
				// 	'label' => "Tahun",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'siswa_sb_lamasakit_1' => [
				// 	'label' => "Lama Sakit",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'siswa_sb_keterangan_1' => [
				// 	'label' => "Keterangan",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				
				//PENDIDIKAN
				'sp_asalsekolah' => [
					'label' => "Asal SMP/MTs",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				// 'sp_tglijasah' => [
				// 	'label' => "Tanggal Ijasah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'sp_tglnoijasah' => [
				// 	'label' => "Nomor Ijasah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'sp_thnskhun' => [
				// 	'label' => "Tahun SKHUN",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'sp_thnnoskhun' => [
				// 	'label' => "Nomor SKHUN",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				$siswaditerima => [
					'label' => "Tanggal Diterima",
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi.'
					]
				],
				// 'sp_drsekolah' => [
				// 	'label' => "Dari SMA/MA/SMK",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'sp_dikelas' => [
				// 	'label' => "Di Kelas",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'sp_alasanpindah' => [
				// 	'label' => "Alasan Pindah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 's_tgltamat' => [
				// 	'label' => "Tanggal Lulus",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 's_noijasah' => [
				// 	'label' => "Nomor Ijasah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 's_melanjutkansekolah' => [
				// 	'label' => "Melanjutkan Sekolah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 's_alamat' => [
				// 	'label' => "Alamat",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'pp_kesekolah' => [
				// 	'label' => "Pindah Sekolah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'pp_tglpindah' => [
				// 	'label' => "Tanggal Pindah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'pp_drkelas' => [
				// 	'label' => "Dari Kelas",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'pp_alamatsekolah' => [
				// 	'label' => "Alamat Sekolah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 'pp_alasanpindah' => [
				// 	'label' => "Alasan Pindah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 's_tglputus' => [
				// 	'label' => "Tanggal Putus Sekolah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
				// 's_alasaputus' => [
				// 	'label' => "Alasan Putus Sekolah",
				// 	'rules' => 'required',
				// 	'errors' => [
				// 		'required' => '{field} harus diisi.'
				// 	]
				// ],
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
						'siswa_agama' => $validation->getError('siswa_agama'),
						'siswa_kewanegaraan' => $validation->getError('siswa_kewanegaraan'),
						'siswa_anakke' => $validation->getError('siswa_anakke'),
						'siswa_anak' => $validation->getError('siswa_anak'),
						'siswa_bahasa' => $validation->getError('siswa_bahasa'),
						
						//ALAMAT
						'siswaAddAlamat' => $validation->getError('siswaAddAlamat'),
						'siswaAddRT' => $validation->getError('siswaAddRT'),
						'siswaAddRW' => $validation->getError('siswaAddRW'),
						'siswaAddProv' => $validation->getError('siswaAddProv'),
						'siswaAddCity' => $validation->getError('siswaAddCity'),
						'siswaAddDis' => $validation->getError('siswaAddDis'),
						'siswaAddSubdis' => $validation->getError('siswaAddSubdis'),

						//KESEHATAN
						'siswaBBmasuk' => $validation->getError('siswaBBmasuk'),
						// 'siswaBBKeluar' => $validation->getError('siswaBBKeluar'),
						'siswaTBMasuk' => $validation->getError('siswaTBMasuk'),
						// 'siswaTBKeluar' => $validation->getError('siswaTBKeluar'),
						// 'siswaGolonganDarah' => $validation->getError('siswaGolonganDarah'),
						// 'siswaKelainan' => $validation->getError('siswaKelainan'),
						// 'siswa_sb_jenis_1' => $validation->getError('siswa_sb_jenis_1'),
						// 'siswa_sb_kelas_1' => $validation->getError('siswa_sb_kelas_1'),
						// 'siswa_sb_tahun_1' => $validation->getError('siswa_sb_tahun_1'),
						// 'siswa_sb_lamasakit_1' => $validation->getError('siswa_sb_lamasakit_1'),
						// 'siswa_sb_keterangan_1' => $validation->getError('siswa_sb_keterangan_1'),

						//PENDIDIKAN
						'sp_asalsekolah' => $validation->getError('sp_asalsekolah'),
						// 'sp_tglijasah' => $validation->getError('sp_tglijasah'),
						// 'sp_tglnoijasah' => $validation->getError('sp_tglnoijasah'),
						// 'sp_thnskhun' => $validation->getError('sp_thnskhun'),
						// 'sp_thnnoskhun' => $validation->getError('sp_thnnoskhun'),
						'sp_diterimatgl' => $validation->getError('sp_diterimatgl'),
						'sp_diterimatgl_p' => $validation->getError('sp_diterimatgl_p'),
						// 'sp_drsekolah' => $validation->getError('sp_drsekolah'),
						// 'sp_dikelas' => $validation->getError('sp_dikelas'),
						// 'sp_alasanpindah' => $validation->getError('sp_alasanpindah'),
						// 's_tgltamat' => $validation->getError('s_tgltamat'),
						// 's_noijasah' => $validation->getError('s_noijasah'),
						// 's_melanjutkansekolah' => $validation->getError('s_melanjutkansekolah'),
						// 's_alamat' => $validation->getError('s_alamat'),
						// 'pp_kesekolah' => $validation->getError('pp_kesekolah'),
						// 'pp_tglpindah' => $validation->getError('pp_tglpindah'),
						// 'pp_drkelas' => $validation->getError('pp_drkelas'),
						// 'pp_alamatsekolah' => $validation->getError('pp_alamatsekolah'),
						// 'pp_alasanpindah' => $validation->getError('pp_alasanpindah'),
						// 's_tglputus' => $validation->getError('s_tglputus'),
						// 's_alasaputus' => $validation->getError('s_alasaputus'),

						//ORANG TUA
					]
				];

			}else{
				
				$this->siswaModel->save([
					'siswa_nisn' => $this->request->getVar('siswa_nisn')
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
