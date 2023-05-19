<?php 
namespace App\Models;

use CodeIgniter\Model;

class BeasiswaModel extends Model
{
    protected $table = 'tb_beasiswa';
    protected $primaryKey = 'id_beasiswa';
    protected $allowedFields = ['id_beasiswa', 's_namabeasiswa', 's_tahunbeasiswa', 's_beasiswadari', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->findAll();
    }

    public function deleteBeasiswa($id)
    {
        $query = $this->db->table('tb_beasiswa')->delete(array('id_beasiswa' => $id));
        return $query;
    }

}