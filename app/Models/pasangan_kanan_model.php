<?php

namespace App\Models;
use CodeIgniter\Model;

class pasangan_kanan_model extends Model
{
  protected $table = 'pasangan_kanan';
  protected $primaryKey = 'id_pasangan_kanan';
  protected $allowedFields = ['id_pasangan_kanan', 'id_sapi'];
}