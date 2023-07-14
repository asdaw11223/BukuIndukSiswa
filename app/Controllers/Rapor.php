<?php

namespace App\Controllers;
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

class Rapor extends BaseController
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
    }

    public function index()
    {
        $tahunajaran = $this->tahunajaranModel->findAll();
        $jurusanModel = $this->jurusanModel->findAll();
		$prov = $this->siswaModel->getProv();
        
        $id_jurusan = $this->request->getVar('jurusan');
        $id_tahunajaran = $this->request->getVar('tahunajaran');
        $id_kelas = $this->request->getVar('kelas');
        
        if($id_jurusan != null && $id_tahunajaran == null && $id_kelas == null){
            $siswa = $this->siswaModel->where('id_jurusan', $id_jurusan)->findAll();
        }else if($id_jurusan != null && $id_tahunajaran != null && $id_kelas == null){
            $siswa = $this->siswaModel->where('id_jurusan', $id_jurusan)->where('id_tahunajaran', $id_tahunajaran)->findAll();
        }else if($id_kelas != null){
            $siswa = $this->daftarSiswaKelasModel
            ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
            ->where('id_kelas', $id_kelas)->findAll();
        }else{
            $siswa = $this->siswaModel->findAll();
        }

        $data = [
            'title' => 'Rapor',
            'siswa' => $siswa,
            'tahunajaran' => $tahunajaran,
            'jurusan' => $jurusanModel,
            'prov' => $prov
        ];

        return view('rapor/daftar-rapor', $data);
    }

    public function getKelas()
	{
		if($this->request->isAJAX()){
            $id_jurusan = $this->request->getVar('id_jurusan');
            $id_tahunajaran = $this->request->getVar('id_tahunajaran');

            $kelas = $this->kelasModel->where('id_jurusan', $id_jurusan)->where('id_tahunajaran', $id_tahunajaran)->findAll();

			$isidata = '<option value=""> Pilih Kelas </option>';
			
			foreach($kelas as $row ) :
				$isidata .= '<option value="' . $row['id_kelas'] . '">' . $row['nama_kelas'] . '</option>';
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
	}
    
    public function rapor($s_nisn)
    {
        $siswa = $this->siswaModel
        ->where('s_NISN', $s_nisn)
        ->first();
        
        $tahunajaran = $this->tahunajaranModel->findAll();
        $jurusan = $this->jurusanModel->findAll();
        $jeniskelamin = $this->jenisKelaminModel->findAll();
        $alamat = $this->alamatModel->where('s_NISN', $s_nisn)->first();
        $masuk = $this->masukModel->where('s_NISN', $s_nisn)->first();
        $pindah = $this->pindahModel->where('s_NISN', $s_nisn)->first();
        $pendidikan = $this->pendidikanModel->where('s_NISN', $s_nisn)->first();
        $catatan = $this->catatanModel->where('s_NISN', $s_nisn)->first();
        $kesehatan = $this->kesehatanModel->where('s_NISN', $s_nisn)->first();
        $penyakitKhusus = $this->penyakitKhususModel->where('s_NISN', $s_nisn)->first();
        $wali = $this->waliModel->where('s_NISN', $s_nisn)->first();
        $prov = $this->alamatModel->getProv();
        $city = $this->alamatModel->getCity($alamat['prov_id']);
        $dis = $this->alamatModel->getDis($alamat['city_id']);
        $subdis = $this->alamatModel->getSubdis($alamat['dis_id']);
        $kepribadian = $this->kepribadianModel->where('s_NISN', $s_nisn)->first();
        $prestasi = $this->prestasiModel->where('s_NISN', $s_nisn)->findAll();
        $beasiswa = $this->beasiswaModel->where('s_NISN', $s_nisn)->findAll();
        $kehadiran = $this->kehadiranModel->where('s_NISN', $s_nisn)->first();
        $ayah = $this->orangTuaModel->getAyah($s_nisn);
        $ibu = $this->orangTuaModel->getIbu($s_nisn);
        
        $data = [
            'title' => 'Rapor',
            'siswa' => $siswa,
            'tahunajaran' => $tahunajaran,
            'jurusan' => $jurusan,
            'jeniskelamin' => $jeniskelamin,
            'alamat' => $alamat,
            'masuk' => $masuk,
            'pindah' => $pindah,
            'pendidikan' => $pendidikan,
            'catatan' => $catatan,
            'kesehatan' => $kesehatan,
            'penyakitKhusus' => $penyakitKhusus,
            'wali' => $wali,
            'prov' => $prov,
            'kepribadian' => $kepribadian,
            'prestasi' => $prestasi,
            'beasiswa' => $beasiswa,
            'ayah' => $ayah,
            'ibu' => $ibu,
            'kehadiran' => $kehadiran,
            'city' => $city,
            'dis' => $dis,
            'subdis' => $subdis,
        ];

        return view('rapor/rapor', $data);
    }

}
