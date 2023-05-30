<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class Profile extends BaseController
{
    protected $profileModel;
     
    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    public function index()
    {
        
        $profile = $this->profileModel->first();
        
        $data = [
            'title' => 'PROFILE SEKOLAH',
            'profile' => $profile
        ];


        return view('Sekolah/profile', $data);
    }
	
	public function update()
	{

			$this->profileModel->save([
				'id_profile' => $this->request->getVar('id_profile'),
				'nama_profile' => $_POST['nama_profile']
			]);
	}
	
}
