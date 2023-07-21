<?php 
namespace App\Models;

use CodeIgniter\Model;

class EskulModel extends Model
{
    protected $table = 'tb_eskul';
    protected $primaryKey = 'id_eskul';
    protected $allowedFields = ['id_eskul', 'eskul_kegiatan', 'eskul_keterangan', 'id_kelas', 's_NISN'];

    public function getEskulDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->findAll();
    }

    public function deleteEskul($id)
    {
        $query = $this->db->table('tb_eskul')->delete(array('id_eskul' => $id));
        return $query;
    }

}