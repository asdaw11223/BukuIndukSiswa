<?php 
namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'tb_siswa';
    protected $primaryKey = 'id_siswa';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_siswa', 's_NISN', 's_namalengkap', 's_namapanggilan', 'id_jeniskelamin', 's_tempatlahir', 's_tanggallahir', 's_photo', 's_agama', 's_kewanegaraan', 's_anakke', 's_anakyp', 's_bahasaharian', 's_kandung', 's_tiri', 's_angkat', 'id_tahunajaran', 'id_jurusan', 'created_at', 'updated_at'];

    public function getSiswa()
    {
        return $this->db->table('tb_siswa')
        ->join('tb_tahunajaran', 'tb_tahunajaran.id_siswa = tb_siswa.id_siswa')
        ->get()->getResultArray();
    }

    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->first();
    }

    public function cekSiswa($s_NISN)
    {
        return $this->db->table('tb_siswa')
        ->where('s_NISN', $s_NISN)
        ->get()->getRowArray();
    }
    
    public function Sfilter($s_NISN)
    {
        return $this->db->table('tb_siswa')
        ->where('s_NISN', $s_NISN)
        ->get()->getRowArray();
    }

    public function getSiswaTA($id_tahunajaran)
    {
        return $this->db->table('tb_siswa')
        ->where(['tb_siswa.id_tahunajaran' => $id_tahunajaran])
        ->get()->getResultArray();
    }
    
    public function getProv(){
        return $this->db->table('provinces')
        ->get()->getResultArray();
    }

    public function getCity($prov){
        return $this->db->table('cities')
        ->where('prov_id', $prov)
        ->get()->getResultArray();
    }

    public function getDis($city){
        return $this->db->table('districts')
        ->where('city_id', $city)
        ->get()->getResultArray();
    }

    public function getSubdis($dis){
        return $this->db->table('subdistricts')
        ->where('dis_id', $dis)
        ->get()->getResultArray();
    }

    public function getJK(){
        return $this->db->table('tb_jeniskelamin')
        ->get()->getResultArray();
    }

    public function add($data){
        $this->db->table('tb_siswa')->insert($data);
    }

    public function deleteSiswa($id)
    {
        $query = $this->db->table('tb_siswa')->delete(array('id_siswa' => $id));
        return $query;
    }
} 