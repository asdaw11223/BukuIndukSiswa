<?php 
namespace App\Models;

use CodeIgniter\Model;

class PKLModel extends Model
{
    protected $table = 'tb_pkl';
    protected $primaryKey = 'id_pkl';
    protected $allowedFields = ['id_pkl', 'pkl_namainstansi', 'pkl_lokasi', 'pkl_lama', 'pkl_keterangan', 's_NISN'];

    public function getPKLDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->findAll();
    }

    public function deletePKL($id)
    {
        $query = $this->db->table('tb_pkl')->delete(array('id_pkl' => $id));
        return $query;
    }

}