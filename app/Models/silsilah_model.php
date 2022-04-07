<?php
namespace App\Models;
use CodeIgniter\Model;

class silsilah_model extends Model
{
  protected $table = 'silsilah';
  protected $primaryKey = 'id_silsilah';
  protected $allowedFields = ['id_silsilah', 'id_induk_betina', 'id_sapi', 'id_induk_jantan'];
}