<?php 
namespace App\Models;

use CodeIgniter\Model;

class PindahModel extends Model
{
    protected $table = 'tb_pindah';
    protected $primaryKey = 'id_pindah';
    protected $allowedFields = ['id_pindah', 'pp_kesekolah', 'pp_tglpindah', 'pp_drkelas', 'pp_alamatsekolah', 'pp_alasanpindah', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->first();
    }

    public function deletePindah($id)
    {
        $query = $this->db->table('tb_pindah')->delete(array('id_pindah' => $id));
        return $query;
    }

}