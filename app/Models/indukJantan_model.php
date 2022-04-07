<?php

namespace App\Models;
use CodeIgniter\Model;

class indukJantan_model extends Model
{
  protected $table = 'induk_jantan';
  protected $primaryKey = 'id_induk_jantan';
  protected $allowedFields = ['id_induk_jantan', 'id_sapi'];
}