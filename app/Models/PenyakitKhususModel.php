<?php 
namespace App\Models;

use CodeIgniter\Model;

class PenyakitKhususModel extends Model
{
    protected $table = 'tb_penyakitkhusus';
    protected $primaryKey = 'id_penyakit';
    protected $allowedFields = ['id_penyakit', 'p_jenispenyakit', 'p_kelas', 'p_tahun', 'p_lamasakit', 'p_keterangan', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->findAll();
    }

    public function deletePenyakitBerat($id)
    {
        $query = $this->db->table('tb_penyakitkhusus')->delete(array('id_penyakit' => $id));
        return $query;
    }

}