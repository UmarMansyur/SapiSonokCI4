<?php

namespace App\Models;
use CodeIgniter\Model;

class indukBetina_model extends Model
{
  protected $table = 'induk_betina';
  protected $primaryKey = 'id_induk_betina';
  protected $allowedFields = ['id_induk_betina', 'id_sapi'];
}