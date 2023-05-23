<?php 
namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'tb_jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = ['id_jadwal', 'id_tingkat', 'id_tahunajaran', 'id_matapelajaran'];

    public function deleteMatapelajaran($id)
    {
        $query = $this->db->table('tb_jadwal')->delete(array('id_jadwal' => $id));
        return $query;
    }

}