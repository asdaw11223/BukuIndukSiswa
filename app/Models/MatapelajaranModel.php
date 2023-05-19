<?php 
namespace App\Models;

use CodeIgniter\Model;

class MatapelajaranModel extends Model
{
    protected $table = 'tb_matapelajaran';
    protected $primaryKey = 'id_matapelajaran';
    protected $allowedFields = ['id_matapelajaran', 'nama_matapelajaran', 'nama_kelompok'];

    public function deleteMapel($id)
    {
        $query = $this->db->table('tb_matapelajaran')->delete(array('id_matapelajaran' => $id));
        return $query;
    }

}