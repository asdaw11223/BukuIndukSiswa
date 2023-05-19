<?php 
namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table = 'tb_jurusan';
    protected $primaryKey = 'id_jurusan'; 
    protected $allowedFields = ['id_jurusan', 'nama_jurusan'];
    
    public function deleteJurusan($id)
    {
        $query = $this->db->table('tb_jurusan')->delete(array('id_jurusan' => $id));
        return $query;
    }
}