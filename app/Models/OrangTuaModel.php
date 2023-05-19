<?php 
namespace App\Models;

use CodeIgniter\Model;

class OrangTuaModel extends Model
{
    protected $table = 'tb_orangtua';
    protected $primaryKey = 'id_orangtua';
    protected $allowedFields = ['id_orangtua', 'id_jeniskelamin', 'sa_nama', 'sa_tempatlahir', 'sa_tgllahir', 'sa_kewanegaraan', 'sa_ptertinggi', 'sa_pekerjaan', 'sa_penghasilan', 'sa_alamat', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->db->table('tb_orangtua')
        ->where(['tb_orangtua.s_NISN' => $s_NISN])
        ->get()->getResultArray();
    }

    public function getAyah($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->where(['id_jeniskelamin' => 1])->first();
    }

    public function getIbu($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->where(['id_jeniskelamin' => 2])->first();
    }


    public function deleteOrangTua($id)
    {
        $query = $this->db->table('tb_orangtua')->delete(array('id_orangtua' => $id));
        return $query;
    }

}