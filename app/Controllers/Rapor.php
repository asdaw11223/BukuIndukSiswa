<?php

namespace App\Controllers;
use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\TahunAjaranModel;
use App\Models\JurusanModel;
use App\Models\DaftarSiswaKelasModel;

class Rapor extends BaseController
{
    protected $siswaModel;
    protected $kelasModel;
    protected $tahunajaranModel;
    protected $jurusanModel;
    protected $daftarSiswaKelasModel;
     
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->kelasModel = new KelasModel();
        $this->tahunajaranModel = new TahunajaranModel();
        $this->jurusanModel = new JurusanModel();
        $this->daftarSiswaKelasModel = new DaftarSiswaKelasModel();
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

        return view('rapor/rapor', $data);
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

}
