<?php

namespace App\Controllers;

use App\Models\MatapelajaranModel;
use App\Models\TingkatModel;

class Tingkat extends BaseController
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
			'tingkat' => $tingkat,
			'matapelajaran' => $matapelajaran
		];
		dd($tingkat);

		return view('sekolah/tingkat', $data);
    }

	public function filter()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('jurusan') != null){
				
				$id = $this->request->getVar('jurusan');
				$tingkat = $this->tingkatModel->where("id_jurusan", $id)->findAll();

				$msg = [
					'berhasil' => [
						'succes' => $tingkat,
					]
				];

			}else{ 
				
				$msg = [
					'error' => [
						'gagal' => 'Data gagal dihapus',
					]
				];
			}

			echo json_encode($msg);
		}
	}
}
