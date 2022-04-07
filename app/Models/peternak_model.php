<?php

namespace App\Models;
use CodeIgniter\Model;

class peternak_model extends Model 
{
  protected $table = 'peternak';
  protected $primaryKey = 'id_peternak';
  protected $returnType = 'array';
  protected $allowedFields = ['nama_peternak','status_akun', 'status_admin' , 'nomor_telpon', 'email', 'password', 'alamat', 'foto'];
  protected $useTimestamps = true;
  protected $createdField = 'tanggal_daftar';
  protected $updatedField = 'update_at';
  public function search ($search) 
  {
    return $this->table('peternak')->like('nama_peternak', $search);
  }
}