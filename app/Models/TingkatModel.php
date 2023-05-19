<?php 
namespace App\Models;

use CodeIgniter\Model;

class TingkatModel extends Model
{
    protected $table = 'tb_tingkat';
    protected $primaryKey = 'id_tingkat'; 
    protected $allowedFields = ['id_tingkat', 'nama_tingkat', 'id_jurusan'];
    
    public function getTingkat($tingkat){
        return $this->db->table('tb_tingkat')
        ->where('id_jurusan', $tingkat)
        ->get()->getResultArray();
    }
    
    public function deleteTingkat($id)
    {
        $query = $this->db->table('tb_tingkat')->delete(array('id_tingkat' => $id));
        return $query;
    }
}