<?php 
namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table = 'tb_pendidikan';
    protected $primaryKey = 'id_pendidikan';
    protected $allowedFields = ['id_pendidikan', 's_tgltamat', 's_noijasah', 's_melanjutkansekolah', 's_alamat', 's_tglputus', 's_alasaputus', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->first();
    }

    public function deletePendidikan($id)
    {
        $query = $this->db->table('tb_pendidikan')->delete(array('id_pendidikan' => $id));
        return $query;
    }

}