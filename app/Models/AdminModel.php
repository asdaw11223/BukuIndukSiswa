<?php 
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash', 'status', 'status_message', 'active', 'force_pass_reset', 'created_at', 'updated_at', 'deleted_at'];
    
    public function deleteUser($id)
    {
        $query = $this->db->table('users')->delete(array('id' => $id));
        return $query;
    }
} 