<?php 
namespace App\Models;

use CodeIgniter\Model;

class WaliModel extends Model
{
    protected $table = 'tb_wali';
    protected $primaryKey = 'id_wali';
    protected $allowedFields = ['id_wali', 'sw_nama', 'sw_tempatlahir', 'sw_tgllahir', 'sw_kewanegaraan', 'sw_ptertinggi', 'sw_pekerjaan', 'sw_penghasilan', 'sw_alamat', 'sw_hubunganpeserta', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->first();
    }

    public function deleteWali($id)
    {
        $query = $this->db->table('tb_wali')->delete(array('id_wali' => $id));
        return $query;
    }

}