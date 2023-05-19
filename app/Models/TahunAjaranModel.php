<?php 
namespace App\Models;

use CodeIgniter\Model;

class TahunAjaranModel extends Model
{
    protected $table = 'tb_tahunajaran';
    protected $primaryKey = 'id_tahunajaran';
    protected $allowedFields = ['id_tahunajaran', 'nama_tahunajaran'];

    public function getTahunAjaran(){
        return $this->db->table('tb_tahunajaran')
        ->orderBy('id_tahunajaran', 'DESC')
        ->get()->getResultArray();
    }
    
    public function deleteTahunAjaran($id)
    {
        $query = $this->db->table('tb_tahunajaran')->delete(array('id_tahunajaran' => $id));
        return $query;
    }
}