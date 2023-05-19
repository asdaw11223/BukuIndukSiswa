<?php 
namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'tb_mapel_jadwal';
    protected $primaryKey = 'id_mapel_jawal';
    protected $allowedFields = ['id_mapel_jawal', 'id_tingkat', 'id_tahunajaran', 'id_matapelajaran'];

    public function deleteMatapelajaran($id)
    {
        $query = $this->db->table('tb_mapel_jadwal')->delete(array('id_mapel_jawal' => $id));
        return $query;
    }

}