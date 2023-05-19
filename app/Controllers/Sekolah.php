<?php

namespace App\Controllers;

use App\Models\MatapelajaranModel;
use App\Models\TingkatModel;

class Sekolah extends BaseController
{
    protected $matapelajaranModel;
    protected $tingkatModel;
     
    public function __construct()
    {
        $this->tingkatModel = new TingkatModel();
        $this->matapelajaranModel = new MatapelajaranModel();
    }

    public function index()
    {
		$id = $this->request->getVar('Jurusan'); ;
		$tingkat = $this->tingkatModel->where("id_jurusan", $id)->findAll();
        $matapelajaran = $this->matapelajaranModel->findAll();

		$data = [
			'title' => 'Profile Sekolah',
			'matapelajaran' => $matapelajaran
		];

		return view('sekolah/profile', $data);
    }
}
