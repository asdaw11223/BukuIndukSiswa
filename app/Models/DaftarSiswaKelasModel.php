<?php 
namespace App\Models;

use CodeIgniter\Model;

class DaftarSiswaKelasModel extends Model
{
    protected $table = 'tb_daftarsiswakelas';
    protected $primaryKey = 'id_daftarsiswakelas';
    protected $allowedFields = ['id_daftarsiswakelas', 'id_kelas', 's_NISN'];

    public function getSK(){
        return $this->db->table('tb_daftarsiswakelas')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarsiswakelas.id_kelas')
        ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
        ->get()->getResultArray();
    }

    public function getSiswaKelas($id_kelas){
        return $this->db->table('tb_daftarsiswakelas')
        ->join('tb_kelas', 'tb_kelas.id_kelas = tb_daftarsiswakelas.id_kelas')
        ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
        ->where(['tb_kelas.id_kelas' => $id_kelas])
        ->get()->getResultArray();
    }

    public function deleteDSiswa($id){
        $query = $this->db->table('tb_daftarsiswakelas')->delete(array('id_daftarsiswakelas' => $id));
        return $query;
    }
}