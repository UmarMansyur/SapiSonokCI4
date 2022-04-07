<?php

namespace App\Models;
use CodeIgniter\Model;

class pasangan_kiri_model extends Model
{
  protected $table = 'pasangan_kiri';
  protected $primaryKey = 'id_pasangan_kiri';
  protected $allowedFields = ['id_pasangan_kiri', 'id_sapi'];
}