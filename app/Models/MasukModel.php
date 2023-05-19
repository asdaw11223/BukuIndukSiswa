<?php 
namespace App\Models;

use CodeIgniter\Model;

class MasukModel extends Model
{
    protected $table = 'tb_masuk';
    protected $primaryKey = 'id_masuk';
    protected $allowedFields = ['id_masuk', 'sp_diterimatgl', 'sp_asalsekolah', 'sp_tglnoijasah', 'sp_tglijasah', 'sp_thnskhun', 'sp_thnnoskhun', 'sp_dikelas', 'sp_drsekolah', 'sp_alasanpindah', 'sp_jenis', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->db->table('tb_masuk')
        ->where(['tb_masuk.s_NISN' => $s_NISN])
        ->get()->getResultArray();
    }

    public function deleteMasuk($id)
    {
        $query = $this->db->table('tb_masuk')->delete(array('id_masuk' => $id));
        return $query;
    }

}