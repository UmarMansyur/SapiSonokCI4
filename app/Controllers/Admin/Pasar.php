<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\penawaran_model;

class Pasar extends BaseController
{
  protected $penawaran;
  public function __construct()
  {
    $this->penawaran = new penawaran_model();
  }
  public function index()
  { 
    $data = [
      'title' => 'Pasar',
      'subtitle' => 'Pasar',
      'penawaran' => $this->penawaran->getPenawaran()
    ];
    return view('admin/pasar', $data);
  }
  
  
}
