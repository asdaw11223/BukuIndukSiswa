<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\TahunAjaranModel;
use App\Models\TingkatModel;
use App\Models\JurusanModel;

class Jadwal extends BaseController
{
    protected $jadwalModel;
    protected $jurusanModel;
    protected $tingkatModel;
    protected $tahunAjaranModel;
     
    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->jurusanModel = new JurusanModel();
        $this->tingkatModel = new TingkatModel();
        $this->tahunAjaranModel = new TahunAjaranModel();
    }

    public function index()
    {
		$id_tahunajaran = $this->request->getVar('id_tahunajaran');        
		$id_jurusan = $this->request->getVar('id_jurusan');
        $jadwal = $this->jadwalModel
		->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_jadwal.id_matapelajaran')
		->join('tb_tingkat', 'tb_tingkat.id_tingkat = tb_jadwal.id_tingkat')
		->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_jadwal.id_tahunajaran')
        ->where(['tb_tahunajaran.id_tahunajaran' => $id_tahunajaran])
        ->findAll();
        $jurusan = $this->jurusanModel->findAll();
        $tingkat = $this->tingkatModel
		->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_tingkat.id_jurusan')->where(['tb_jurusan.id_jurusan' => $id_jurusan])->findAll();
        $tahunAjaran = $this->tahunAjaranModel->findAll();
		
        $data = [
            'title' => 'Jadwal Matapelajaran',
            'jadwal' => $jadwal,
            'tingkat' => $tingkat,
            'jurusan' => $jurusan,
            'tahunAjaran' => $tahunAjaran
        ];

        return view('sekolah/jadwal', $data);
    }

}
