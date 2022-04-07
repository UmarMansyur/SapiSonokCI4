<?php

namespace App\Models;
use CodeIgniter\Model;

class berita_model extends Model {
  protected $table = 'berita';
  protected $primaryKey = 'id_berita';
  protected $allowedFields = ['id_berita', 'judul_berita', 'deskripsi_berita', 'tanggal_berita', 'ditampilkan'];

  public function search ($search) 
  {
    return $this->table('berita')->like('judul_berita', $search);
  }
}