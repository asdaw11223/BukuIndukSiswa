<?php 
namespace App\Models;

use CodeIgniter\Model;

class JenisKelaminModel extends Model
{
    protected $table = 'tb_jeniskelamin';
    protected $primaryKey = 'id_jeniskelamin'; 
    protected $allowedFields = ['id_jeniskelamin', 'nama_jeniskelamin'];
    
}