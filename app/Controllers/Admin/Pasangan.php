<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\pasangan_kanan_model;
use App\Models\pasangan_kiri_model;
use App\Models\pasangan_model;
use App\Models\pemilik_model;

class Pasangan extends BaseController
{
  protected $pasangan;
  protected $pasangan_kanan;
  protected $pasangan_kiri;
  protected $pemilik;
  protected $builder;
  public function __construct()
  {
    $this->pasangan = new pasangan_model();
    $this->pasangan_kanan = new pasangan_kanan_model();
    $this->pasangan_kiri = new pasangan_kiri_model();
    $this->pemilik = new pemilik_model();
    $this->builder = db_connect();
  }
  public function index()
  {
    $hasil = $this->request->getVar('cari');
    if ($hasil) {
      $result = $this->pasangan->search($hasil);
    } else {
      $result = $this->pasangan;
    }
    $data = [
      'title'     => 'Pasangan',
      'subtitle'  => 'Pasangan',
      'sapi'      => $this->pemilik->getSapi(session('id_peternak')),
      'pasangan'  => $this->pasangan->getPasanganKanan(session('id_peternak')),
      'currentPage' => $this->request->getVar('page_pasangan') == null ? 1 : $this->request->getVar('page_pasangan'),
      'pager'     => $this->pasangan->pager
    ];
    // dd($data['pasangan']);
    return view('admin/pasangan', $data);
  }
  public function insert()
  {

    $pasangan_kanan = [
      'id_sapi' => $this->request->getPost('pasangan_kanan')
    ];
    $this->pasangan_kanan->insert($pasangan_kanan);
    $kanan = $this->pasangan_kanan->insertID();
    $pasangan_kiri = [
      'id_sapi' => $this->request->getPost('pasangan_kiri')
    ];
    $this->pasangan_kiri->insert($pasangan_kiri);
    $kiri = $this->pasangan_kiri->insertID();
    $pasangan = [
      'nama_pasangan'      => $this->request->getPost('nama_pasangan'),
      'id_pasangan_kanan'  => $kanan,
      'id_pasangan_kiri'   => $kiri
    ];
    $this->pasangan->insert($pasangan);
    session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
    return redirect()->to(base_url('/pasangan'));
  }
  public function edit()
  {
    $data = [
      'nama_pasangan' => $this->request->getPost('edit_nama_pasangan'),
    ];
    $this->pasangan->update($this->request->getPost('edit_id_pasangan'), $data);
    $kanan = [
      'id_sapi' => $this->request->getPost('edit_nama_pasangan_kanan')
    ];
    $this->pasangan_kanan->update($this->request->getPost('edit_id_pasangan_kanan'), $kanan);
    $kiri = [
      'id_sapi' => $this->request->getPost('edit_nama_pasangan_kiri')
    ];
    $this->pasangan_kiri->update($this->request->getPost('edit_id_pasangan_kiri'), $kiri);
    session()->setFlashdata('update', 'data berhasil');
    return redirect()->to(base_url('/pasangan'));
  }
  public function delete($id_pasangan)
  {
    $data = [
      'id_pasangan_kanan'   => $this->pasangan->find($id_pasangan)['id_pasangan_kanan'],
      'id_pasangan_kiri'   => $this->pasangan->find($id_pasangan)['id_pasangan_kiri']
    ];
    $this->builder->table('pasangan')->delete(['id_pasangan'=> $id_pasangan]);
    $this->builder->table('pasangan_kanan')->delete(['id_pasangan_kanan'=> $data['id_pasangan_kanan']]);
    $this->builder->table('pasangan_kiri')->delete(['id_pasangan_kiri'=> $data['id_pasangan_kiri']]);
    return redirect()->to(base_url('/pasangan'));
  }
}
