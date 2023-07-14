<?php 
namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    protected $table = 'tb_kehadiran';
    protected $primaryKey = 'id_kehadiran';
    protected $allowedFields = ['id_kehadiran', 'id_kelas', 'kh_semester', 'kh_sakit', 'kh_izin', 'kh_alpa', 's_NISN'];

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