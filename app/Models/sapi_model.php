<?php

namespace App\Models;

use CodeIgniter\Model;

class sapi_model extends Model
{
  protected $table = 'sapi';
  protected $primaryKey = 'id_sapi';
  protected $allowedFields = ['id_sapi', 'nama_sapi', 'jenis_kelamin', 'tanggal_lahir', 'status_sapi'];

  public function insertIndukJantan($induk_jantan)
  {
    $builder = db_connect();
    $data = [
      'id_sapi' => $induk_jantan
    ];
    return $builder->table('induk_jantan')->insert($data);
  }
  public function insertIndukBetina($induk_betina)
  {
    $builder = db_connect();
    $data = [
      'id_sapi' => $induk_betina
    ];
    return $builder->table('induk_betina')->insert($data);
  }
  
}