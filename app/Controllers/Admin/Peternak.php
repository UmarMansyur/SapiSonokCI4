<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\peternak_model;

class Peternak extends BaseController
{
  protected $peternak;
  public function __construct()
  {
    $this->peternak = new peternak_model();
  }
  public function index()
  { 
    $hasil = $this->request->getVar('cari');
    if ($hasil) {
      $result = $this->peternak->search($hasil);
    } else {
      $result = $this->peternak;
    }
    $data = [
      'title' => 'Peternak',
      'subtitle' => 'Peternak',
      'peternak' => $this->peternak->paginate(5, 'peternak'),
      'pager' => $this->peternak->pager,
      'currentPage' => $this->request->getVar('page_peternak') == null ? 1 : $this->request->getVar('page_peternak'),
    ];
    return view('admin/peternak', $data);
  }
  public function changeStatus($id) 
  {
    $data = $this->peternak->find($id);
    $status = [
      'status_akun' => $data['status_akun'] == '1' ? '0' : '1'
    ];
    $this->peternak->update($id, $status);
    return redirect()->to('admin/peternak');
  }
  
}
