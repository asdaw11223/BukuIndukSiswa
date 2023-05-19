<?php 
namespace App\Models;

use CodeIgniter\Model;

class CatatanModel extends Model
{
    protected $table = 'tb_catatanpenting';
    protected $primaryKey = 'id_catatanpenting';
    protected $allowedFields = ['id_catatanpenting', 's_catatanpenting', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->first();
    }

    public function deleteCatatan($id)
    {
        $query = $this->db->table('tb_catatanpenting')->delete(array('id_catatanpenting' => $id));
        return $query;
    }

}