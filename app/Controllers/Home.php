<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\TahunAjaranModel;
use App\Models\DaftarSiswaKelasModel;
use App\Models\JenisKelaminModel;
use App\Models\MatapelajaranModel;

class Home extends BaseController
{
    protected $siswaModel;
    protected $tahunajaranModel;
    protected $daftarSiswaKelasModel;
    protected $jenisKelaminModel;
    protected $matapelajaranModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->daftarSiswaKelasModel = new DaftarSiswaKelasModel();
        $this->tahunajaranModel = new TahunajaranModel();
        $this->jenisKelaminModel = new JenisKelaminModel();
        $this->matapelajaranModel = new MatapelajaranModel();
    }

    public function index()
    {
        $tahunajaran = $this->tahunajaranModel->findAll();
        $jk = $this->jenisKelaminModel->findAll();
        $siswa = $this->siswaModel->findAll();
        $matapelajaran = $this->matapelajaranModel->findAll();

        $data = [
            'title' => 'Dashboard',
            'siswa' => $siswa,
            'tahunajaran' => $tahunajaran,
            'jk' => $jk,
            'matapelajaran' => $matapelajaran,
        ];

        return view('pages/index', $data);
    }
}
