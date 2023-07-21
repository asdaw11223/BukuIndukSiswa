<?php

namespace App\Controllers;
use App\Models\AdminModel;

class Admin extends BaseController
{

    protected $adminModel;
	
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

	public function index()
	{
		$data['title'] = 'User List';
		// $users = new \Myth\Auth\Models\UserModel();

		$db = \Config\Database::connect();
		$builder = $db->table('users');
		$builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
		$query = $builder->get();
		
		$data['users'] = $query->getResult();

        return view('pages/admin', $data);
	}

	public function delete()
	{
		if($this->request->isAJAX()){

			if($this->request->getVar('d_id_User') != null){
				
				$id = $this->request->getVar('d_id_User');
				$this->adminModel->deleteUser($id);

				$msg = [
					'berhasil' => [
						'succes' => "Data berhasil dihapus",
					]
				];

			}else{
				
				$msg = [
					'error' => [
						'd_id_tahunajaran' => 'Data gagal dihapus',
					]
				];
			}

			echo json_encode($msg);
		}
	}
	
}
