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

		$id_tingkat = $this->request->getVar('tingkat');

        $tahunajaran = $this->tahunajaranModel->orderBy('nama_tahunajaran', 'DESC')->findAll();
        $jurusan = $this->jurusanModel->findAll();
        $tingkat = $this->tingkatModel->findAll();
        $kelas = $this->kelasModel->where('id_tingkat', $id_tingkat)->findAll();



        $data = [
            'title' => 'Pilih Kelas',
            'tingkat' => $tingkat,
            'kelas' => $kelas,
            'tahunajaran' => $tahunajaran,
            'jurusan' => $jurusan
        ];

        return view('nilai/nilai_filter', $data);
    }

    public function nilai($id_kelas)
    {
		$filter = $this->request->getVar('filter');
        
        $kelas = $this->kelasModel->where('id_kelas', $id_kelas)
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_kelas.id_jurusan')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->first();

        $siswa = $this->daftarSiswaKelasModel->where('id_kelas', $id_kelas)
        ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
        ->findAll();
        
        $search_mapel = $this->nilaiModel->where('id_kelas', $id_kelas)
        ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
        ->findAll();

        if($filter == null) {
            $nilai = $this->nilaiModel->where('id_kelas', $id_kelas)
            ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
            ->join('tb_siswa', 'tb_siswa.s_NISN = tb_nilai.s_NISN')
            ->findAll();
        }else{
            $nilai = $this->nilaiModel->where(['tb_nilai.id_matapelajaran' => $filter])->where('id_kelas', $id_kelas)
            ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
            ->findAll();
        }

		$id_siswa = $this->nilaiModel->where('id_kelas', $id_kelas)
        ->first();

        $tingkat = $this->tingkatModel->findAll();
        $matapelajaran = $this->matapelajaranModel->findAll();

        $array = [];
        $id_mapel = [];
        foreach($nilai as $nm){
            if($id_siswa['s_NISN'] == $nm['s_NISN']){
                $array[] = $nm['nama_matapelajaran'];
            }
        }
        
        $nama_mapel = [];
        $id_mapel = [];
        foreach($search_mapel as $nm){
            if($id_siswa['s_NISN'] == $nm['s_NISN']){
                $nama_mapel[] = $nm['nama_matapelajaran'];
                $id_mapel[] = $nm['id_matapelajaran'];
            }
        }

        $data = [
            'title' => 'Nilai',
            'kelas' => $kelas,
            'siswa' => $siswa,
            'tingkat' => $tingkat,
            'array' => $array,
            'id_mapel' => $id_mapel,
            'nama_mapel' => $nama_mapel,
            'nilai' => $nilai,
            'matapelajaran' => $matapelajaran
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

	public function addMapel()
	{
		if($this->request->isAJAX()){
			
            $daftarSiswaKelas = $this->daftarSiswaKelasModel->where('id_kelas', $this->request->getVar('id_kelas'))->findAll();
            $mapel = $_POST['matapelajarans'];
            
            foreach($daftarSiswaKelas as $dsk){
                for ($i=0; $i < count($mapel); $i++) {

                    $this->nilaiModel->save([
                        'np_kb' => 0,
                        'np_angka' => 0,
                        'np_predikat' => '',
                        'np_deskripsi' => '',
                        'nk_kb' => 0,
                        'nk_angka' => 0,
                        'nk_predikat' => '',
                        'nk_deskripsi' => '',
                        'id_matapelajaran' => $mapel[$i],
                        's_NISN' => $dsk['s_NISN'],
                        'id_kelas' => $this->request->getVar('id_kelas')
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

	public function addNilai()
	{
		if($this->request->isAJAX()){
			
            $nilai = $this->nilaiModel->where('id_kelas', $this->request->getVar('id_kelas'))
            ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
            ->join('tb_siswa', 'tb_siswa.s_NISN = tb_nilai.s_NISN')
            ->findAll();

            foreach($nilai as $n) {
                $this->nilaiModel->save([
                    'id_nilai' => $this->request->getVar('id_nilai'. $n['id_nilai']),
                    'np_kb' => $this->request->getVar('np_kb'. $n['id_nilai']),
                    'np_angka' => $this->request->getVar('np_angka'. $n['id_nilai']),
                    'np_predikat' => $this->request->getVar('np_predikat'. $n['id_nilai']),
                    'np_deskripsi' => $this->request->getVar('np_deskripsi'. $n['id_nilai']),
                    'nk_kb' => $this->request->getVar('nk_kb'. $n['id_nilai']),
                    'nk_angka' => $this->request->getVar('nk_angka'. $n['id_nilai']),
                    'nk_predikat' => $this->request->getVar('nk_predikat'. $n['id_nilai']),
                    'nk_deskripsi' => $this->request->getVar('nk_deskripsi'. $n['id_nilai']),
                    'id_matapelajaran' => $this->request->getVar('id_matapelajaran'. $n['id_nilai']),
                    's_NISN' => $this->request->getVar('s_NISN'. $n['id_nilai'])
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
