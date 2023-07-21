<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\TahunAjaranModel;
use App\Models\JurusanModel;
use App\Models\DaftarSiswaKelasModel;
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
use App\Models\BeasiswaModel;
use App\Models\PrestasiModel;
use App\Models\KehadiranModel;
use App\Models\JenisKelaminModel;
use App\Models\NilaiModel;
use App\Models\MatapelajaranModel;
use App\Models\TingkatModel;
use App\Models\PKLModel;
use App\Models\EskulModel;

use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan extends BaseController
{
    protected $siswaModel;
    protected $kelasModel;
    protected $tahunajaranModel;
    protected $jurusanModel;
    protected $daftarSiswaKelasModel;
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
    protected $beasiswaModel;
    protected $prestasiModel;
    protected $kehadiranModel;
    protected $jenisKelaminModel;
    protected $dompdf;
    protected $nilaiModel;
    protected $matapelajaranModel;
    protected $tingkatModel;
    protected $pklModel;
    protected $eskulModel;
    protected $profileModel;
     
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->kelasModel = new KelasModel();
        $this->tahunajaranModel = new TahunajaranModel();
        $this->jurusanModel = new JurusanModel();
        $this->daftarSiswaKelasModel = new DaftarSiswaKelasModel();
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
        $this->beasiswaModel = new BeasiswaModel();
        $this->prestasiModel = new PrestasiModel();
        $this->kehadiranModel = new KehadiranModel();
        $this->jenisKelaminModel = new JenisKelaminModel();
        $this->nilaiModel = new NilaiModel();
        $this->matapelajaranModel = new MatapelajaranModel();
        $this->tingkatModel = new TingkatModel();
        $this->pklModel = new PKLModel();
        $this->eskulModel = new EskulModel();
        $this->profileModel = new ProfileModel();
    }

    public function index()
    {
        $siswa = $this->siswaModel
        ->join('tb_jeniskelamin', 'tb_jeniskelamin.id_jeniskelamin = tb_siswa.id_jeniskelamin')
        ->findAll();
        $tahunajaran = $this->tahunajaranModel->findAll();
        $jurusan = $this->jurusanModel->findAll();
        $kelas = $this->kelasModel->findAll();

        $data = [
            'title' => 'Laporan',
            'siswa' => $siswa,
            'tahunajaran' => $tahunajaran,
            'jurusan' => $jurusan,
            'kelas' => $kelas
        ];

        return view('pages/laporan', $data);
    }

    public function login()
    {
        $profile = $this->profileModel->first();
        
        $data = [
            'title' => 'Laporan',
            'profile' => $profile
        ];

        return view('auth/profile', $data);

    }

    public function getKelas()
    {        
		if($this->request->isAJAX()){
			$id_tahunajaran = $this->request->getVar('id');

            $kelas = $this->kelasModel->where('id_tahunajaran', $id_tahunajaran)->findAll();
            
			$isidata = '<option>Pilih Kelas</option>';
			
			foreach($kelas as $row ) :
				if($kelas){
                    $isidata .= '<option value="' . $row['id_kelas'] . '">' . $row['nama_kelas'] . '</option>';
				}
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
    }

    public function getSiswa()
    {        
		if($this->request->isAJAX()){
			$id_tahunajaran = $this->request->getVar('id');

            $siswa = $this->siswaModel->where('id_tahunajaran', $id_tahunajaran)->findAll();
            
			$isidata = '<option>Pilih Siswa</option>';
			
			foreach($siswa as $row ) :
				if($siswa){
                    if($row['s_NISN'] == '0000000000'){

                    }else{
                    $isidata .= '<option value="' . $row['s_NISN'] . '">['. $row['s_NISN'] .'] ' . $row['s_namalengkap'] . '</option>';
                    }
				}
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
    }

    public function siswaDetails($s_nisn)
    {
        $siswa = $this->siswaModel
        ->where('s_NISN', $s_nisn)
        ->join('tb_jeniskelamin', 'tb_jeniskelamin.id_jeniskelamin = tb_siswa.id_jeniskelamin')
        ->first();        

        $alamat = $this->alamatModel->where('s_NISN', $s_nisn)->first();
        $prov = $this->alamatModel->getOneProv($alamat['prov_id']);
        $city = $this->alamatModel->getOneCity($alamat['city_id']);
        $dis = $this->alamatModel->getOneDis($alamat['dis_id']);
        $subdis = $this->alamatModel->getOneSubdis($alamat['subdis_id']);
        $masuk = $this->masukModel->where('s_NISN', $s_nisn)->where('sp_jenis', 'Baru')->first();
        $pindahan = $this->masukModel->where('s_NISN', $s_nisn)->where('sp_jenis', 'Pindahan')->first();
        $pindah = $this->pindahModel->where('s_NISN', $s_nisn)->first();
        $pendidikan = $this->pendidikanModel->where('s_NISN', $s_nisn)->first();
        $catatan = $this->catatanModel->where('s_NISN', $s_nisn)->first();
        $kesehatan = $this->kesehatanModel->where('s_NISN', $s_nisn)->first();
        $penyakitKhusus = $this->penyakitKhususModel->where('s_NISN', $s_nisn)->findAll();
        $wali = $this->waliModel->where('s_NISN', $s_nisn)->first();
        $kepribadian = $this->kepribadianModel->where('s_NISN', $s_nisn)->first();
        $prestasi = $this->prestasiModel->where('s_NISN', $s_nisn)->findAll();
        $beasiswa = $this->beasiswaModel->where('s_NISN', $s_nisn)->findAll();
        $kehadiran = $this->kehadiranModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_kehadiran.id_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->findAll();
        $ayah = $this->orangTuaModel->getAyah($s_nisn);
        $ibu = $this->orangTuaModel->getIbu($s_nisn);

        $data = [
            'prov' => $prov,
            'city' => $city,
            'dis' => $dis,
            'subdis' => $subdis,
            'siswa' => $siswa,
            'alamat' => $alamat,
            'masuk' => $masuk,
            'pindahan' => $pindahan,
            'pindah' => $pindah,
            'pendidikan' => $pendidikan,
            'catatan' => $catatan,
            'kesehatan' => $kesehatan,
            'penyakitKhusus' => $penyakitKhusus,
            'wali' => $wali,
            'kepribadian' => $kepribadian,
            'prestasi' => $prestasi,
            'beasiswa' => $beasiswa,
            'ayah' => $ayah,
            'ibu' => $ibu,
            'kehadiran' => $kehadiran
        ];

        $view = view('cetak/export-pdf', $data);
         
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'Portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('BUKU INDUK SISWA '. $siswa['s_NISN'].'', array("Attachment"=>false));
    }
    
    public function siswaDetailslaporan()
    {
        $s_nisn =  $this->request->getVar('id_siswa2');

        $siswa = $this->siswaModel
        ->where('s_NISN', $s_nisn)
        ->join('tb_jeniskelamin', 'tb_jeniskelamin.id_jeniskelamin = tb_siswa.id_jeniskelamin')
        ->first();        

        $alamat = $this->alamatModel->where('s_NISN', $s_nisn)->first();
        $prov = $this->alamatModel->getOneProv($alamat['prov_id']);
        $city = $this->alamatModel->getOneCity($alamat['city_id']);
        $dis = $this->alamatModel->getOneDis($alamat['dis_id']);
        $subdis = $this->alamatModel->getOneSubdis($alamat['subdis_id']);
        $masuk = $this->masukModel->where('s_NISN', $s_nisn)->where('sp_jenis', 'Baru')->first();
        $pindahan = $this->masukModel->where('s_NISN', $s_nisn)->where('sp_jenis', 'Pindahan')->first();
        $pindah = $this->pindahModel->where('s_NISN', $s_nisn)->first();
        $pendidikan = $this->pendidikanModel->where('s_NISN', $s_nisn)->first();
        $catatan = $this->catatanModel->where('s_NISN', $s_nisn)->first();
        $kesehatan = $this->kesehatanModel->where('s_NISN', $s_nisn)->first();
        $penyakitKhusus = $this->penyakitKhususModel->where('s_NISN', $s_nisn)->findAll();
        $wali = $this->waliModel->where('s_NISN', $s_nisn)->first();
        $kepribadian = $this->kepribadianModel->where('s_NISN', $s_nisn)->first();
        $prestasi = $this->prestasiModel->where('s_NISN', $s_nisn)->findAll();
        $beasiswa = $this->beasiswaModel->where('s_NISN', $s_nisn)->findAll();
        $kehadiran = $this->kehadiranModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_kehadiran.id_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->findAll();
        $ayah = $this->orangTuaModel->getAyah($s_nisn);
        $ibu = $this->orangTuaModel->getIbu($s_nisn);

        $data = [
            'prov' => $prov,
            'city' => $city,
            'dis' => $dis,
            'subdis' => $subdis,
            'siswa' => $siswa,
            'alamat' => $alamat,
            'masuk' => $masuk,
            'pindahan' => $pindahan,
            'pindah' => $pindah,
            'pendidikan' => $pendidikan,
            'catatan' => $catatan,
            'kesehatan' => $kesehatan,
            'penyakitKhusus' => $penyakitKhusus,
            'wali' => $wali,
            'kepribadian' => $kepribadian,
            'prestasi' => $prestasi,
            'beasiswa' => $beasiswa,
            'ayah' => $ayah,
            'ibu' => $ibu,
            'kehadiran' => $kehadiran
        ];

        $view = view('cetak/export-pdf', $data);
         
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'Portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('BUKU INDUK SISWA '. $siswa['s_NISN'].'', array("Attachment"=>false));
    }

    public function daftarSiswaSekolah()
    {
        $siswa = $this->siswaModel
        ->join('tb_jeniskelamin', 'tb_jeniskelamin.id_jeniskelamin = tb_siswa.id_jeniskelamin')
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_siswa.id_tahunajaran')
        ->findAll();        

        $data = [
            'siswa' => $siswa,
            'kelas' => '',
        ];

        $view = view('cetak/export-daftar-siswa', $data);
         
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'Portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('DAFTAR SISWA SEKOLAH SMK PASUNDAN RANCAEKEK', array("Attachment"=>false));
    }

    public function daftarSiswaKelas()
    {
        $id_kelas =  $this->request->getVar('id_kelas1');

        $kelas = $this->kelasModel->where('id_kelas', $id_kelas)
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_kelas.id_jurusan')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->first();

        $siswa = $this->daftarSiswaKelasModel
        ->where('id_kelas', $id_kelas)
        ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarSiswaKelas.s_NISN')
        ->join('tb_jeniskelamin', 'tb_jeniskelamin.id_jeniskelamin = tb_siswa.id_jeniskelamin')
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_siswa.id_tahunajaran')
        ->findAll();        

        $data = [
            'siswa' => $siswa,
            'kelas' => $kelas,
        ];

        $view = view('cetak/export-daftar-siswa', $data);
         
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'Portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('DAFTAR SISWA KELAS '. $kelas['nama_kelas'] , array("Attachment"=>false));
    }

    public function siswaKelaslaporan()
    {
        $id_kelas =  $this->request->getVar('id_kelas2');

        $siswaKelas = $this->daftarSiswaKelasModel->where('id_kelas', $id_kelas)
        ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
        ->join('tb_jeniskelamin', 'tb_jeniskelamin.id_jeniskelamin = tb_siswa.id_jeniskelamin')
        ->join('tb_alamat', 'tb_alamat.s_NISN = tb_siswa.s_NISN')
        ->join('tb_kesehatan', 'tb_kesehatan.s_NISN = tb_siswa.s_NISN')
        ->findAll();
        $penyakitKhusus = $this->penyakitKhususModel->findAll();
        $masuk = $this->masukModel->where('sp_jenis', 'Baru')->findAll();
        $pindahan = $this->masukModel->where('sp_jenis', 'Pindahan')->findAll();
        $catatan = $this->catatanModel->findAll();
        $wali = $this->waliModel->findAll();
        $orangtua = $this->orangTuaModel->findAll();

        $kepribadian_s = $this->kepribadianModel->findAll();
        $prestasi_s = $this->prestasiModel->findAll();
        $beasiswa_s = $this->beasiswaModel->findAll();
        $kehadiran_s = $this->kehadiranModel
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_kehadiran.id_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')->findAll();

        
        $pindah_s = $this->pindahModel->findAll();
        $pendidikan_s = $this->pendidikanModel->findAll();

        $prov_s = [];
        $city_s = [];
        $dis_s = [];
        $subdis_s = [];
        
        
        
        foreach($siswaKelas as $nm){
            $prov = $this->alamatModel->getOneProv($nm['prov_id']);
            $city = $this->alamatModel->getOneCity($nm['city_id']);
            $dis = $this->alamatModel->getOneDis($nm['dis_id']);
            $subdis = $this->alamatModel->getOneSubdis($nm['subdis_id']);

            $prov_s[] = $prov[0]['prov_name'];
            $city_s[] = $city[0]['city_name'];
            $dis_s[] = $dis[0]['dis_name'];
            $subdis_s[] = $subdis[0]['subdis_name'];
        }

        $data = [
            'siswaKelas' => $siswaKelas,
            'prov_s' => $prov_s,
            'city_s' => $city_s,
            'dis_s' => $dis_s,
            'subdis_s' => $subdis_s,
            'penyakitKhusus' => $penyakitKhusus,
            'masuk' => $masuk,
            'pindahan' => $pindahan,
            'catatan' => $catatan,
            'orangtua' => $orangtua,
            'wali' => $wali,
            'kepribadian_s' => $kepribadian_s,
            'prestasi_s' => $prestasi_s,
            'beasiswa_s' => $beasiswa_s,
            'kehadiran_s' => $kehadiran_s,
            'pindah_s' => $pindah_s,
            'pendidikan_s' => $pendidikan_s,
        ];

        $view = view('cetak/export-pdf-kelas', $data);
         
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'Portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('BUKU INDUK SISWA', array("Attachment"=>false));
    }
    
    public function nilaiLaporan()
    {
		$s_nisn = $this->request->getVar('id_siswa3');
    
        $siswaKelas = $this->daftarSiswaKelasModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarSiswaKelas.id_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->findAll();

        $siswa_s = $this->siswaModel->where('s_NISN', $s_nisn)
        ->first();

        $nilai = $this->nilaiModel->where('s_NISN', $s_nisn)
        ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
        ->findAll();
        
        $kehadiran = $this->kehadiranModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_kehadiran.id_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->findAll();
        
        $prestasi = $this->prestasiModel->where('s_NISN', $s_nisn)
        ->findAll();
        $eskul = $this->eskulModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_eskul.id_kelas')
        ->findAll();
        $pkl = $this->pklModel->where('s_NISN', $s_nisn)
        ->findAll();
        
        $kelas = $this->kelasModel->findAll();
        $tahunajaran = $this->tahunajaranModel->findAll();

        $data = [
            'nilai' => $nilai,
            'siswaKelas' => $siswaKelas,
            'kelas' => $kelas,
            'tahunajaran' => $tahunajaran,
            'siswa_s' => $siswa_s,
            'kehadiran' => $kehadiran,
            'prestasi' => $prestasi,
            'pkl' => $pkl,
            'eskul' => $eskul,
        ];

        // return view('cetak/export-nilai', $data);

        $view = view('cetak/export-nilai', $data);
         
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'Portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('NILAI HASIL BELAJAR KELAS'. $s_nisn, array("Attachment"=>false));
    }
    
    public function nilaiLaporanKelas()
    {
		$id_kelas = $this->request->getVar('id_kelas3');
    
        $siswaKelas = $this->daftarSiswaKelasModel->where('id_kelas', $id_kelas)
        ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
        ->findAll();

        $nilai = $this->nilaiModel->where('id_kelas', $id_kelas)
        ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
        ->findAll();
        
        $kelas = $this->kelasModel->findAll();
        $tahunajaran = $this->tahunajaranModel->findAll();

        $data = [
            'nilai' => $nilai,
            'kelas' => $kelas,
            'tahunajaran' => $tahunajaran,
            'siswaKelas' => $siswaKelas,
        ];

        $view = view('cetak/export-nilai-kelas', $data);
         
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'Portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('NILAI HASIL BELAJAR KELAS', array("Attachment"=>false));
    }
    
    public function raporSiswa()
    {
        $s_nisn =  $this->request->getVar('id_siswa1');

        $siswa = $this->siswaModel
        ->where('s_NISN', $s_nisn)
        ->join('tb_jeniskelamin', 'tb_jeniskelamin.id_jeniskelamin = tb_siswa.id_jeniskelamin')
        ->first();   
        $siswa_s = $this->siswaModel
        ->where('s_NISN', $s_nisn)
        ->join('tb_jeniskelamin', 'tb_jeniskelamin.id_jeniskelamin = tb_siswa.id_jeniskelamin')
        ->first();       

        $alamat = $this->alamatModel->where('s_NISN', $s_nisn)->first();
        $prov = $this->alamatModel->getOneProv($alamat['prov_id']);
        $city = $this->alamatModel->getOneCity($alamat['city_id']);
        $dis = $this->alamatModel->getOneDis($alamat['dis_id']);
        $subdis = $this->alamatModel->getOneSubdis($alamat['subdis_id']);
        $masuk = $this->masukModel->where('s_NISN', $s_nisn)->where('sp_jenis', 'Baru')->first();
        $pindahan = $this->masukModel->where('s_NISN', $s_nisn)->where('sp_jenis', 'Pindahan')->first();
        $pindah = $this->pindahModel->where('s_NISN', $s_nisn)->first();
        $pendidikan = $this->pendidikanModel->where('s_NISN', $s_nisn)->first();
        $catatan = $this->catatanModel->where('s_NISN', $s_nisn)->first();
        $kesehatan = $this->kesehatanModel->where('s_NISN', $s_nisn)->first();
        $penyakitKhusus = $this->penyakitKhususModel->where('s_NISN', $s_nisn)->findAll();
        $wali = $this->waliModel->where('s_NISN', $s_nisn)->first();
        $kepribadian = $this->kepribadianModel->where('s_NISN', $s_nisn)->first();
        $prestasi = $this->prestasiModel->where('s_NISN', $s_nisn)->findAll();
        $beasiswa = $this->beasiswaModel->where('s_NISN', $s_nisn)->findAll();
        $ayah = $this->orangTuaModel->getAyah($s_nisn);
        $ibu = $this->orangTuaModel->getIbu($s_nisn);

    
        $siswaKelas = $this->daftarSiswaKelasModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarSiswaKelas.id_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->findAll();

        $nilai = $this->nilaiModel->where('s_NISN', $s_nisn)
        ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
        ->findAll();
        
        $kehadiran = $this->kehadiranModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_kehadiran.id_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->findAll();
        
        $eskul = $this->eskulModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_eskul.id_kelas')
        ->findAll();
        $pkl = $this->pklModel->where('s_NISN', $s_nisn)
        ->findAll();

        $data = [
            'prov' => $prov,
            'city' => $city,
            'dis' => $dis,
            'subdis' => $subdis,
            'siswa' => $siswa,
            'siswa_s' => $siswa_s,
            'alamat' => $alamat,
            'masuk' => $masuk,
            'pindahan' => $pindahan,
            'pindah' => $pindah,
            'pendidikan' => $pendidikan,
            'catatan' => $catatan,
            'kesehatan' => $kesehatan,
            'penyakitKhusus' => $penyakitKhusus,
            'wali' => $wali,
            'kepribadian' => $kepribadian,
            'prestasi' => $prestasi,
            'beasiswa' => $beasiswa,
            'ayah' => $ayah,
            'ibu' => $ibu,
            'nilai' => $nilai,
            'siswaKelas' => $siswaKelas,
            'kehadiran' => $kehadiran,
            'pkl' => $pkl,
            'eskul' => $eskul,
        ];

        // return view('cetak/export-rapor', $data);

        $view = view('cetak/export-rapor', $data);
         
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'Portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('RAPOR SISWA'. $s_nisn, array("Attachment"=>false));
    }

    public function raporSiswaDetails($s_nisn)
    {
        $siswa = $this->siswaModel
        ->where('s_NISN', $s_nisn)
        ->join('tb_jeniskelamin', 'tb_jeniskelamin.id_jeniskelamin = tb_siswa.id_jeniskelamin')
        ->first();   
        $siswa_s = $this->siswaModel
        ->where('s_NISN', $s_nisn)
        ->join('tb_jeniskelamin', 'tb_jeniskelamin.id_jeniskelamin = tb_siswa.id_jeniskelamin')
        ->first();       

        $alamat = $this->alamatModel->where('s_NISN', $s_nisn)->first();
        $prov = $this->alamatModel->getOneProv($alamat['prov_id']);
        $city = $this->alamatModel->getOneCity($alamat['city_id']);
        $dis = $this->alamatModel->getOneDis($alamat['dis_id']);
        $subdis = $this->alamatModel->getOneSubdis($alamat['subdis_id']);
        $masuk = $this->masukModel->where('s_NISN', $s_nisn)->where('sp_jenis', 'Baru')->first();
        $pindahan = $this->masukModel->where('s_NISN', $s_nisn)->where('sp_jenis', 'Pindahan')->first();
        $pindah = $this->pindahModel->where('s_NISN', $s_nisn)->first();
        $pendidikan = $this->pendidikanModel->where('s_NISN', $s_nisn)->first();
        $catatan = $this->catatanModel->where('s_NISN', $s_nisn)->first();
        $kesehatan = $this->kesehatanModel->where('s_NISN', $s_nisn)->first();
        $penyakitKhusus = $this->penyakitKhususModel->where('s_NISN', $s_nisn)->findAll();
        $wali = $this->waliModel->where('s_NISN', $s_nisn)->first();
        $kepribadian = $this->kepribadianModel->where('s_NISN', $s_nisn)->first();
        $prestasi = $this->prestasiModel->where('s_NISN', $s_nisn)->findAll();
        $beasiswa = $this->beasiswaModel->where('s_NISN', $s_nisn)->findAll();
        $ayah = $this->orangTuaModel->getAyah($s_nisn);
        $ibu = $this->orangTuaModel->getIbu($s_nisn);

    
        $siswaKelas = $this->daftarSiswaKelasModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarSiswaKelas.id_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->findAll();

        $nilai = $this->nilaiModel->where('s_NISN', $s_nisn)
        ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
        ->findAll();
        
        $kehadiran = $this->kehadiranModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_kehadiran.id_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->findAll();
        
        $eskul = $this->eskulModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_eskul.id_kelas')
        ->findAll();
        $pkl = $this->pklModel->where('s_NISN', $s_nisn)
        ->findAll();

        $data = [
            'prov' => $prov,
            'city' => $city,
            'dis' => $dis,
            'subdis' => $subdis,
            'siswa' => $siswa,
            'siswa_s' => $siswa_s,
            'alamat' => $alamat,
            'masuk' => $masuk,
            'pindahan' => $pindahan,
            'pindah' => $pindah,
            'pendidikan' => $pendidikan,
            'catatan' => $catatan,
            'kesehatan' => $kesehatan,
            'penyakitKhusus' => $penyakitKhusus,
            'wali' => $wali,
            'kepribadian' => $kepribadian,
            'prestasi' => $prestasi,
            'beasiswa' => $beasiswa,
            'ayah' => $ayah,
            'ibu' => $ibu,
            'nilai' => $nilai,
            'siswaKelas' => $siswaKelas,
            'kehadiran' => $kehadiran,
            'pkl' => $pkl,
            'eskul' => $eskul,
        ];

        // return view('cetak/export-rapor', $data);

        $view = view('cetak/export-rapor', $data);
         
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'Portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('RAPOR SISWA'. $s_nisn, array("Attachment"=>false));
    }
}
