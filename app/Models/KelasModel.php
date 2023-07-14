<?php 
namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'tb_kelas';
    protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['id_kelas', 'nama_kelas', 'id_tahunajaran', 'id_jurusan', 'id_tingkat'];

    public function deleteKelas($id)
    {
        $query = $this->db->table('tb_kelas')->delete(array('id_kelas' => $id));
        return $query;
    }

}