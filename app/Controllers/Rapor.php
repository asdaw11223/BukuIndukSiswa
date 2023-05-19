<?php

namespace App\Controllers;
use App\Models\SiswaModel;
use App\Models\JenisKelaminModel;
use App\Models\TahunAjaranModel;
use App\Models\JurusanModel;

class Rapor extends BaseController
{
    protected $siswaModel;
    protected $jenisKelaminModel;
    protected $tahunajaranModel;
    protected $jurusanModel;
     
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->jenisKelaminModel = new JenisKelaminModel();
        $this->tahunajaranModel = new TahunajaranModel();
        $this->jurusanModel = new JurusanModel();
    }

    public function index()
    {
        $tahunajaran = $this->tahunajaranModel->findAll();
        $jurusanModel = $this->jurusanModel->findAll();
        $jk = $this->jenisKelaminModel->findAll();
        $siswa = $this->siswaModel->findAll();
		$prov = $this->siswaModel->getProv();

        $data = [
            'title' => 'Rapor',
            'siswa' => $siswa,
            'tahunajaran' => $tahunajaran,
            'jurusan' => $jurusanModel,
            'jk' => $jk,
            'prov' => $prov
        ];

        return view('rapor/rapor', $data);
    }
}
