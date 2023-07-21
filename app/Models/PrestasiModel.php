<?php 
namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table = 'tb_prestasi';
    protected $primaryKey = 'id_prestasi';
    protected $allowedFields = ['id_prestasi', 'pre_jenisprestasi', 'pre_keterangan', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->findAll();
    }
    
    public function getPrestasiDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->findAll();
    }

    public function deletePrestasi($id)
    {
        $query = $this->db->table('tb_prestasi')->delete(array('id_prestasi' => $id));
        return $query;
    }

}