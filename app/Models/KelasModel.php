<?php 
namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'tb_kelas';
    protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['id_kelas', 'nama_kelas', 'id_jurusan', 'id_tahunajaran', 'id_tingkat'];

    public function getKelas(){
        return $this->db->table('tb_kelas')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_kelas.id_jurusan')
        ->join('tb_tingkat', 'tb_tingkat.id_tingkat = tb_kelas.id_tingkat')
        ->get()->getResultArray();
    }

    public function deleteKelas($id)
    {
        $query = $this->db->table('tb_kelas')->delete(array('id_kelas' => $id));
        return $query;
    }

}