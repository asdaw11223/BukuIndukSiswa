<?php 
namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'tb_nilai';
    protected $primaryKey = 'id_nilai';
    protected $allowedFields = ['id_nilai', 'np_kb', 'np_angka', 'np_predikat', 'np_deskripsi', 'nk_kb', 'nk_angka', 'nk_predikat', 'nk_deskripsi', 'semester', 'id_matapelajaran', 's_NISN', 'id_kelas'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->db->table('tb_nilai')
        ->where(['tb_nilai.s_NISN' => $s_NISN])
        ->get()->getResultArray();
    }

    public function deleteMasuk($id)
    {
        $query = $this->db->table('tb_nilai')->delete(array('id_nilai' => $id));
        return $query;
    }

}