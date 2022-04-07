<?php

namespace App\Models;
use CodeIgniter\Model;

class aksesoris_model extends Model 
{
  protected $table = 'aksesoris';
  protected $primaryKey = 'id_aksesoris';
  protected $returnType = 'array';
  protected $allowedFields = ['id_aksesoris', 'nama_aksesoris', 'deksripsi_aksesoris', 'file_aksesoris'];

  public function search ($search) 
  {
    return $this->table('aksesoris')->like('nama_aksesoris', $search);
  }
}