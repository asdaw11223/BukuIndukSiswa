<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\TahunAjaranModel;
use App\Models\JurusanModel;

class Jadwal extends BaseController
{
    protected $jadwalModel;
    protected $jurusanModel;
    protected $tahunAjaranModel;
     
    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->jurusanModel = new JurusanModel();
        $this->tahunAjaranModel = new TahunAjaranModel();
    }

    public function index()
    {
        $jadwal = $this->jadwalModel->findAll();
        $jurusan = $this->jurusanModel->findAll();
        $tahunAjaran = $this->tahunAjaranModel->findAll();
		
        
        $data = [
            'title' => 'Jadwal Matapelajaran',
            'jadwal' => $jadwal,
            'jurusan' => $jurusan,
            'tahunAjaran' => $tahunAjaran
        ];

        return view('Sekolah/jadwal', $data);
    }

}
