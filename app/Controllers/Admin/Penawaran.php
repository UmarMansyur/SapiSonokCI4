<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\pasangan_model;
use App\Models\penawaran_model;

class Penawaran extends BaseController
{
  
  protected $pasangan;
  protected $penawaran;

  public function __construct()
  {
    $this->pasangan = new pasangan_model();
    $this->penawaran = new penawaran_model();
  }
  
  public function index()
  { 
    $hasil = $this->request->getVar('cari');
    if ($hasil) {
      $result = $this->penawaran->search($hasil);
    } else {
      $result = $this->penawaran;
    }
    $data = [
      'title'     => 'Pasar',
      'subtitle'  => 'Penawaran',
      'pasangan'  => $this->pasangan->getPasanganKanan(session('id_peternak')),
      'penawaran' => $this->penawaran->getMyPenawaran(session('id_peternak')),
      'pager' => $this->penawaran->pager,
      'currentPage' => $this->request->getVar('page_penawaran') == null ? 1 : $this->request->getVar('page_penawaran')
    ];
    return view('admin/penawaran', $data);
  }
 
  public function tambah()
  {
    $count = $this->penawaran->countAllResults();
    $typeFile = $this->request->getFile('file_aksesoris');
    $typeFile->move('uploads/penawaran', $typeFile->getName());
    $product = \Config\Services::image()
    ->withFile(ROOTPATH . 'public/uploads/penawaran/' . $typeFile->getName())
    ->fit(400, 300, 'center')
    ->save(ROOTPATH . 'public/uploads/penawaran/product/' .$typeFile->getName());
    $foto = \Config\Services::image()
    ->withFile(ROOTPATH . 'public/uploads/penawaran/' . $typeFile->getName())
    ->fit(300, 300, 'center')
    ->save(ROOTPATH . 'public/uploads/penawaran/' . 'foto_' .$typeFile->getName());
    $data = [
      'id_pasangan'        => $this->request->getPost('nama_pasangan'),
      'nominal_pembayaran' => $this->request->getPost('nominal'),
      'foto'               => $this->request->getFile('file_aksesoris')->getName(),
      'status_penawaran'   => $this->request->getPost('status_penawaran'),
      'product'            => $product,
      'tawar'              => $foto
    ];
    $this->penawaran->insert($data);
    if($this->penawaran->countAllResults() > $count) {
      session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
      return redirect()->to(base_url('penawaran'));
    }
    return redirect()->to(base_url('penawaran'));
  }
  public function update()
  {
    $id = $this->request->getPost('id_penawaran');
    $getOldFile = $this->penawaran->where('id_penawaran', $id)->findAll()[0]['foto'];
    $typeFile = $this->request->getFile('file_aksesoris');
    $nameFile = $typeFile->getName() == null ? $getOldFile : $typeFile->getName();
    if ($typeFile->getName() == $nameFile) {
      $typeFile->move('uploads/penawaran', $nameFile);
      $product = \Config\Services::image()
      ->withFile(ROOTPATH . 'public/uploads/penawaran/' . $typeFile->getName())
      ->fit(400, 300, 'center')
      ->save(ROOTPATH . 'public/uploads/penawaran/product/' .$typeFile->getName());
      $foto = \Config\Services::image()
      ->withFile(ROOTPATH . 'public/uploads/penawaran/' . $typeFile->getName())
      ->fit(300, 300, 'center')
      ->save(ROOTPATH . 'public/uploads/penawaran/' . 'foto_' .$typeFile->getName());
      $data = [
        'id_pasangan'      => $this->request->getPost('edit_pasangan'),
        'nominal_pembayaran'          => $this->request->getPost('nominal'),
        'foto'             => $nameFile,
        'status_penawaran' => $this->request->getPost('status'),
        'product'          => $product,
        'pasar'            => $foto
      ];
      $this->penawaran->update($id, $data);
      session()->setFlashdata('update', 'fdg');
      return redirect()->to(base_url('penawaran'));
    };
    $data = [
      'id_pasangan'      => $this->request->getPost('edit_pasangan'),
      'nominal_pembayaran'          => $this->request->getPost('nominal'),
      'foto'             => $nameFile,
      'status_penawaran' => $this->request->getPost('status')
    ];
    $this->penawaran->update($id, $data);
    session()->setFlashdata('update', 'dfg');
    return redirect()->to(base_url('penawaran'));
  }
  public function delete($id)
  {
    $status = $this->penawaran->find($id)['status_penawaran'];
    if ($status == 1) {
      session()->setFlashdata('gagal', 'asdfsdf');
      return redirect()->to(base_url('penawaran'));
    }
    $this->penawaran->delete($id);
    return redirect()->to(base_url('penawaran'));
  }
}
