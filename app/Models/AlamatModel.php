<?php 
namespace App\Models;

use CodeIgniter\Model;

class AlamatModel extends Model
{
    protected $table = 'tb_alamat';
    protected $primaryKey = 'id_alamat';
    protected $allowedFields = ['id_alamat', 's_alamat', 's_rt', 's_rw', 'subdis_id', 'dis_id', 'city_id', 'prov_id', 's_telprumah', 's_tinggal', 's_jaraksekolah', 's_kendaraan', 's_NISN'];
    
    public function getSiswaDetail($s_NISN)
    {
        return $this->where(['s_NISN' => $s_NISN])->first();
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
    
    public function getOneProv($prov){
        return $this->db->table('provinces')
        ->where('prov_id', $prov)
        ->get()->getResultArray();
    }

    public function getOneCity($city){
        return $this->db->table('cities')
        ->where('city_id', $city)
        ->get()->getResultArray();
    }

    public function getOneDis($dis){
        return $this->db->table('districts')
        ->where('dis_id', $dis)
        ->get()->getResultArray();
    }

    public function getOneSubdis($subdis){
        return $this->db->table('subdistricts')
        ->where('subdis_id', $subdis)
        ->get()->getResultArray();
    }

    public function deleteAlamat($id)
    {
        $query = $this->db->table('tb_alamat')->delete(array('id_alamat' => $id));
        return $query;
    }
} 