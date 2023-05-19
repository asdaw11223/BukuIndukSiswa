<?php 
namespace App\Models;

use CodeIgniter\Model;

class KepribadianModel extends Model
{
    protected $table = 'tb_kepribadian';
    protected $primaryKey = 'id_kepribadian';
    protected $allowedFields = ['id_kepribadian', 's_intelegensi', 's_tgltestiq', 'sk_disiplin', 'sk_kreativitas', 'sk_tanggungjawab', 'sk_penyesuaiandiri', 'sk_kemantapanemosi', 'sk_kerjasama', 's_NISN'];

    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->first();
    }

    public function deleteKepribadian($id)
    {
        $query = $this->db->table('tb_kepribadian')->delete(array('id_kepribadian' => $id));
        return $query;
    }
} 