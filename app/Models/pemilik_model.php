<?php
namespace App\Models;

use CodeIgniter\Model;

class pemilik_model extends Model
{
  protected $table = 'kepemilikan';
  protected $primaryKey = 'id_kepemilikan';
  protected $allowedFields = ['id_kepemilikan', 'id_peternak', 'id_sapi', 'tanggal_awal_kepemilikan'];

  public function getSapi($id_peternak){
    return $this->table('kepemilikan')
                ->select('kepemilikan.id_sapi')
                ->select('id_peternak')
                ->select('sapi.id_sapi')
                ->select('nama_sapi')
                ->select('jenis_kelamin')
                ->select('tanggal_lahir')
                ->select('tanggal_awal_kepemilikan')
                ->select('status_sapi')
                ->join('sapi', 'kepemilikan.id_sapi = sapi.id_sapi', 'left')
                ->select('nama_sapi')->where('kepemilikan.id_peternak',$id_peternak)->paginate(5, 'peternak');
  }
  public function search ($search) 
  {
    return $this->table('sapi')->like('nama_sapi', $search);
  }
}