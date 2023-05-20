<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'tb_profile';
    protected $primaryKey = 'id_profile';
    protected $allowedFields = ['id_profile', 'nama_profile'];

}