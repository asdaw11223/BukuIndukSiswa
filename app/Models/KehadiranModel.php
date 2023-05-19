<?php 
namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    protected $table = 'tb_kehadiran';
    protected $primaryKey = 'id_kehadiran';
    protected $allowedFields = ['id_kehadiran', 'kh_kelas', 'kh_semester', 'kh_jmlhadir', 'kh_sakit', 'kh_izin', 'kh_alpa', 'kh_jmlbelajar', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->findAll();
    }

    public function deleteKehadiran($id)
    {
        $query = $this->db->table('tb_kehadiran')->delete(array('id_kehadiran' => $id));
        return $query;
    }

}