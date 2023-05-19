<?php 
namespace App\Models;

use CodeIgniter\Model;

class KesehatanModel extends Model
{
    protected $table = 'tb_kesehatan';
    protected $primaryKey = 'id_kesehatan';
    protected $allowedFields = ['id_kesehatan', 's_bbterima', 's_tbterima', 's_bbkeluar', 's_tbkeluar', 's_golongandarah', 's_kelainan', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->first();
    }

    public function deleteKesehatan($id)
    {
        $query = $this->db->table('tb_kesehatan')->delete(array('id_kesehatan' => $id));
        return $query;
    }

}