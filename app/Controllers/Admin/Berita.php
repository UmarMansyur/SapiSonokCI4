<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\berita_model;

class Berita extends BaseController
{
  protected $berita;
  public function __construct()
  {
    $this->berita = new berita_model();
  }
  public function index()
  {
    $hasil = $this->request->getVar('cari');
    if ($hasil) {
      $result = $this->berita->search($hasil);
    } else {
      $result = $this->berita;
    }
    $data = [
      'title' => 'Berita',
      'subtitle' => 'Berita',
      'berita' => $this->berita->paginate(5, 'berita'),
      'pager' => $this->berita->pager,
      'currentPage' => $this->request->getVar('page_berita') == null ? 1 : $this->request->getVar('page_berita')
    ];
    return view('admin/berita', $data);
  }
  public function insert()
  {
    $data = [
      'title' => 'Berita',
      'subtitle' => 'Tambah Berita',
    ];
    return view('admin/add_berita', $data);
  }
  public function delete($id)
  {
    $this->berita->delete($id);
    return redirect()->to(base_url('/berita'));
  }
  public function save()
  {
    $count = $this->berita->countAllResults();
    dd($data = $this->request->getVar());
    $this->berita->insert($data);
    if ($count < $this->berita->countAllResults()) {
      session()->setFlashdata('success', 'Data berhasil ditambahkan!');
      return redirect()->to(base_url('/berita'));
    }
  }
  public function edit()
  {
    $data = [
      'judul_berita' => $this->request->getPost('nama_berita'),
      'deskripsi_berita' => $this->request->getPost('deskripsi_berita'),
      'tanggal_berita' => $this->request->getPost('tanggal_berita')
    ];
    $this->berita->update($this->request->getPost('id_berita'), $data);
    session()->setFlashdata('update', 'update berhasil');
    return redirect()->to('admin/berita');
  }
  public function status($id)
  {
    $berita = $this->berita->find($id);
    $data = 
    [
      'ditampilkan' => $berita['ditampilkan'] == 1 ? 0 : 1
    ];
    $this->berita->update($id, $data);
    return redirect()->to('/berita');
  }
}
