<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PasarDetail extends BaseController
{
  
  public function index()
  { 
    $image = \Config\Services::image()
    ->withFile(ROOTPATH. 'public/uploads/baru1.jpg')
    ->fit(300,300, 'center')
    ->save(ROOTPATH . 'public/uploads/baru2.jpg');
  
    $data = [
      'title' => 'Pasar',
      'subtitle' => 'Pasar',
      
    ];
    return view('admin/pasar', $data);
  }
 
  
}
