<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use PDO;

class Laporan extends BaseController
{
    protected $profileModel;
     
    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan'
        ];

        return view('pages/laporan', $data);
    }

    public function login(){
        $profile = $this->profileModel->first();
        
        $data = [
            'title' => 'Laporan',
            'profile' => $profile
        ];

        return view('auth/profile', $data);

    }
}
