<?php

namespace App\Controllers;

use App\Models\NilaiModel;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use App\Models\JenisKelaminModel;
use App\Models\TahunAjaranModel;
use App\Models\JurusanModel;
use App\Models\TingkatModel;
use App\Models\MatapelajaranModel;
use App\Models\DaftarSiswaKelasModel;

class Nilai extends BaseController
{
    protected $nilaiModel;
    protected $siswaModel;
    protected $kelasModel;
    protected $jenisKelaminModel;
    protected $tingkatModel;
    protected $tahunajaranModel;
    protected $jurusanModel;
    protected $matapelajaranModel;
    protected $daftarSiswaKelasModel;
     
    public function __construct()
    {
        $this->nilaiModel = new NilaiModel();
        $this->kelasModel = new KelasModel();
        $this->siswaModel = new SiswaModel();
        $this->jenisKelaminModel = new JenisKelaminModel();
        $this->tahunajaranModel = new TahunajaranModel();
        $this->tingkatModel = new TingkatModel();
        $this->jurusanModel = new JurusanModel();
        $this->matapelajaranModel = new MatapelajaranModel();
        $this->daftarSiswaKelasModel = new DaftarSiswaKelasModel();
    }

    public function index()
    {
        $tahunajaran = $this->tahunajaranModel->findAll();
        $jurusanModel = $this->jurusanModel->findAll();
        $tingkat = $this->tingkatModel->findAll();
        $siswa = $this->siswaModel->findAll();
		$id_jurusan = $this->request->getVar('jurusan');
		$id_tingkat = $this->request->getVar('tingkat');
        $mapel = $this->matapelajaranModel->where('id_tingkat', $id_tingkat)->findAll();
		$id_kelas = $this->request->getVar('kelas');
        $kelas = $this->kelasModel->where('id_kelas', $id_kelas)
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_kelas.id_jurusan')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->findAll();
		$daftarSiswaKelas  = $this->daftarSiswaKelasModel->getSiswaKelas($id_kelas);
        
		$nilai = $this->nilaiModel
        ->join('tb_daftarsiswakelas', 'tb_daftarsiswakelas.id_daftarsiswakelas = tb_nilai.id_daftarsiswakelas')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarsiswakelas.id_kelas')
        ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
        ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
        ->where(['tb_kelas.id_kelas' => $id_kelas])
        ->findAll();



        $data = [
            'title' => 'Nilai',
            'siswa' => $siswa,
            'kelas' => $kelas,
            'tingkat' => $tingkat,
            'tahunajaran' => $tahunajaran,
            'jurusan' => $jurusanModel,
            'mapel' => $mapel,
            'nilai' => $nilai,
            'id_kelas' => $id_kelas,
            'daftarSiswaKelas' => $daftarSiswaKelas
        ];

        return view('nilai/nilai', $data);
    }
    
    public function jurusan()
	{
		if($this->request->isAJAX()){
			$jurusan = $this->request->getVar('id');
            $tingkat = $this->tingkatModel->where(['tb_tingkat.id_jurusan' => $jurusan])->get()->getResultArray();
			
			$isidata = '<option value="">Pilih Tingkat</option>';

            foreach($tingkat as $row ) :
                $isidata .= '<option value="' . $row['id_tingkat'] . '">' . $row['nama_tingkat'] . '</option>';
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
	}

    public function kelas()
	{
		if($this->request->isAJAX()){
			$tingkat = $this->request->getVar('id');
            $kelas = $this->kelasModel->where(['tb_kelas.id_tingkat' => $tingkat])->get()->getResultArray();
			
			$isidata = '<option value="">Pilih Kelas</option>';

            foreach($kelas as $row ) :
                $isidata .= '<option value="' . $row['id_kelas'] . '">' . $row['nama_kelas'] . '</option>';
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
	}
    
    public function filterMatapelajaran()
	{
		if($this->request->isAJAX()){
			$id_matapelajaran = $this->request->getVar('id');
		    $id_kelas = $this->request->getVar('id_kelas');
            
            $nilai = $this->daftarSiswaKelasModel
            ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
            ->where(['tb_daftarsiswakelas.id_kelas' => $id_kelas])
            ->findAll();

			$no = 1;
			$isidata = '';

            foreach($nilai as $row ) :
                $isidata .= '<tr>';
                $isidata .= '<td>'. $no++ .'</td><td>'. $row['s_NISN'] .'</td><td>'. $row['s_namalengkap'] .'</td>';
                $isidata .= '<td><input type="text" class="form-control" id="" name="" value=""></td>';
                $isidata .= '<td><input type="text" class="form-control" id="" name="" value=""></td>';
                $isidata .= '<td><input type="text" class="form-control" id="" name="" value=""></td>';
                $isidata .= '<td><textarea class="form-control" id="" name="" rows="2"></textarea></td>';
                $isidata .= '<td><input type="text" class="form-control" id="" name="" value=""></td>';
                $isidata .= '<td><input type="text" class="form-control" id="" name="" value=""></td>';
                $isidata .= '<td><input type="text" class="form-control" id="" name="" value=""></td>';
                $isidata .= '<td><textarea class="form-control" id="" name="" rows="2"></textarea></td>';
                $isidata .= '</tr>';
			endforeach;

			$msg = [
				'data' => $isidata
			];

			echo json_encode($msg);
				
		}
	}

	public function addNilai()
	{
		if($this->request->isAJAX()){
			
            $daftarSiswaKelas = $this->daftarSiswaKelasModel->where('id_kelas', $this->request->getVar('id_kelas'))->findAll();
            $mapel = $this->matapelajaranModel->where('id_tingkat', $this->request->getVar('id_tingkat'))->findAll();

            foreach($daftarSiswaKelas as $dsk){
                foreach($mapel as $mp){
                    $this->nilaiModel->save([
                        'id_nilai' => $this->request->getVar('id_' . $mp['id_nilai']),
                        'nama_matapelajaran' => $this->request->getVar('nama_mapel_' . $mp['id_matapelajaran']),
                        'np_kb' => $this->request->getVar('np_kb_' . $mp['id_matapelajaran']),
                        'np_angka' => $this->request->getVar('np_angka_' . $mp['id_matapelajaran']),
                        'np_predikat' => $this->request->getVar('np_predikat_' . $mp['id_matapelajaran']),
                        'np_deskripsi' => $this->request->getVar('np_deskripsi_' . $mp['id_matapelajaran']),
                        'nk_kb' => $this->request->getVar('nk_kb_' . $mp['id_matapelajaran']),
                        'nk_angka' => $this->request->getVar('nk_angka_' . $mp['id_matapelajaran']),
                        'nk_predikat' => $this->request->getVar('nk_predikat_' . $mp['id_matapelajaran']),
                        'nk_deskripsi' => $this->request->getVar('nk_deskripsi_' . $mp['id_matapelajaran']),
                        'id_daftarsiswakelas' => $dsk['id_daftarsiswakelas'],
                        'id_matapelajaran' => $this->request->getVar('id_mapel_' . $mp['id_matapelajaran'])
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
	
}
