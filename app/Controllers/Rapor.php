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
use App\Models\NilaiModel;
use App\Models\MatapelajaranModel;
use App\Models\TingkatModel;
use App\Models\PKLModel;
use App\Models\EskulModel;

use Dompdf\Dompdf;
use Dompdf\Options;

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
    protected $dompdf;
    protected $nilaiModel;
    protected $matapelajaranModel;
    protected $tingkatModel;
    protected $pklModel;
    protected $eskulModel;
     
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
            $siswa = $this->siswaModel
            ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_siswa.id_tahunajaran')
            ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan')
            ->where('tb_siswa.id_jurusan', $id_jurusan)
            ->findAll();
        }else if($id_jurusan != null && $id_tahunajaran != null && $id_kelas == null){
            $siswa = $this->siswaModel
            ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_siswa.id_tahunajaran')
            ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan')
            ->where('tb_siswa.id_jurusan', $id_jurusan)
            ->where('tb_siswa.id_tahunajaran', $id_tahunajaran)
            ->findAll();
        }else if($id_kelas != null){
            $siswa = $this->daftarSiswaKelasModel
            ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
            ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_siswa.id_tahunajaran')
            ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan')
            ->where('id_kelas', $id_kelas)->findAll();
        }else{
            $siswa = $this->siswaModel
            ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_siswa.id_tahunajaran')
            ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan')
            ->findAll();
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
        $kehadiran = $this->kehadiranModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_kehadiran.id_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->findAll();
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

    public function catatan()
    {
		if($this->request->isAJAX()){
			$s_nisn = $this->request->getVar('id');
			$id_kelas = $this->request->getVar('kelas');

			$pkl = '';
			$eskul = '';
			$prestasi = '';
			$no1=1;
			$no2=1;
			$no3=1;

            $siswa_detail = $this->siswaModel->where('s_NISN', $s_nisn)->first();

            $dpkl = $this->pklModel->where('s_NISN', $s_nisn)->findAll();
            $deskul = $this->eskulModel->where('s_NISN', $s_nisn)
            ->join('tb_kelas', 'tb_kelas.id_kelas = tb_eskul.id_kelas')
            ->findAll();
            $dprestasi = $this->prestasiModel->where('s_NISN', $s_nisn)->findAll();

            if($dpkl == null) {
                $pkl .= '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>';
            }else{
                foreach($dpkl as $row ) :
                    $pkl .= '<tr><td>'. $no1++ .'</td><td>'. $row['pkl_namainstansi'] .'</td><td>'. $row['pkl_lokasi'] .'</td><td>'. $row['pkl_lama'] .'</td><td>'. $row['pkl_keterangan'] .'</td></tr>';
                endforeach;
            }
            
            if($deskul == null) {
                $eskul .= '<tr><td colspan="3" class="text-center">Tidak ada data</td></tr>';
            }else{
                foreach($deskul as $row ) :
                    $eskul .= '<tr><td>'. $no2++ .'</td><td>'. $row['eskul_kegiatan'] .'</td><td>'. $row['nama_kelas'] .'</td><td>'. $row['eskul_keterangan'] .'</td></tr>';
                endforeach;
            }

            if($dprestasi == null) {
                $prestasi .= '<tr><td colspan="3" class="text-center">Tidak ada data</td></tr>';
            }else{
                foreach($dprestasi as $row ) :
                    $prestasi .= '<tr><td>'. $no3++ .'</td><td>'. $row['pre_jenisprestasi'] .'</td><td>'. $row['pre_keterangan'] .'</td></tr>';
                endforeach;
            }

			$data = [
                'nama_siswa' => $siswa_detail['s_namalengkap'],
                'nisn_siswa' => $siswa_detail['s_NISN'],
                'id_kelas' => $id_kelas,
				'pkl' => $pkl,
                'eskul' => $eskul,
                'prestasi' => $prestasi
			];

			echo json_encode($data);
				
		}

    }

    public function getTingkatSiswa($s_nisn)
    {
		if($this->request->isAJAX()){
            $id_tingkat = $this->request->getVar('id');
            
            $kelas = $this->daftarSiswaKelasModel->where('s_NISN', $s_nisn)
            ->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarsiswakelas.id_kelas')
            ->join('tb_tingkat', 'tb_tingkat.id_tingkat = tb_kelas.id_tingkat')
            ->findAll();

            
            $isidata = '<option value=""> Pilih Kelas </option>';

            foreach($kelas as $k){
                if($k['id_tingkat'] == $id_tingkat){
                    $isidata .= '<option value="'. $k['id_kelas'].'">'. $k['nama_kelas'] .'</option>';
                }
            }

            $data = [
                'data' => $isidata,
            ];
            
            echo json_encode($data);
        }
    }

    public function nilai($s_nisn)
    {
        
		$id_kelas = $this->request->getVar('id_kelas');
		$semester = $this->request->getVar('semester');
    
        $siswa = $this->siswaModel->where('s_NISN', $s_nisn)->first();

        $nilai = $this->nilaiModel->where('id_kelas', $id_kelas)->where('semester', $semester)->where('s_NISN', $s_nisn)
        ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
        ->findAll();
        
        $kelas = $this->daftarSiswaKelasModel->where('s_NISN', $s_nisn)
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarsiswakelas.id_kelas')
        ->join('tb_tingkat', 'tb_tingkat.id_tingkat = tb_kelas.id_tingkat')
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

        $data = [
            'semester' => $semester,
            'nilai' => $nilai,
            'siswa' => $siswa,
            'kelas' => $kelas,
            'kehadiran' => $kehadiran,
            'prestasi' => $prestasi,
            'eskul' => $eskul,
            'pkl' => $pkl,
        ];
        

        return view('rapor/rapor-nilai', $data);
    }

}
