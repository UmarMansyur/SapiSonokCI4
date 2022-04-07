<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\pasangan_model;
use App\Models\prestasi_model;

class Prestasi extends BaseController
{

  protected $prestasi;
  protected $pasangan;
  public function __construct()
  {
    $this->prestasi = new prestasi_model();
    $this->pasangan = new pasangan_model();
  }
  public function index()
  {

    $hasil = $this->request->getVar('cari');
    if ($hasil) {
      $result = $this->prestasi->search($hasil);
    } else {
      $result = $this->prestasi;
    }

    $data = [
      'title'     => 'Prestasi',
      'subtitle'  => 'Prestasi',
      'pasangan'  => $this->pasangan->getPasanganKanan(session('id_peternak')),
      'prestasi'  => $this->prestasi->getPrestasi(session('id_peternak')),
    ];
    // dd($data['prestasi']);
    return view('admin/prestasi', $data);
  }
  public function tambah()
  {
    $count = $this->prestasi->countAllResults();
    $typeFile = $this->request->getFile('file_prestasi');
    $data = [
      'id_pasangan'     => $this->request->getPost('nama_pasangan'),
      'prestasi'     => $this->request->getPost('nama_prestasi'),
      'tahun_prestasi'     => $this->request->getPost('tahun_prestasi'),
      'file_prestasi' => $typeFile->getName(),
    ];
    $this->prestasi->insert($data);
    $typeFile->move('uploads/prestasi', $typeFile->getName());
    session()->setFlashdata('success', 'Data Berhasil Ditambahkan!');
    return redirect()->to('admin/prestasi');
  }
  public function edit()
  {
    // dd($this->request->getVar());
    $old_file = $this->prestasi->find($this->request->getPost('edit_id_prestasi'))['file_prestasi'];
    $typeFile = $this->request->getFile('edit_file_prestasi');
    $nameFile = $typeFile->getName() == null ? $old_file : $typeFile->getName();
    $data = [
      'id_pasangan' => $this->request->getPost('edit_nama_pasangan'),
      'prestasi' => $this->request->getPost('edit_nama_prestasi'),
      'file_prestasi' => $nameFile,
      'tahun_prestasi' => $this->request->getPost('edit_tahun_prestasi'),
    ];
    if ($typeFile->getName() == $nameFile) {
      $typeFile->move('uploads/prestasi', $nameFile);
    };
    $this->prestasi->update($this->request->getPost('id_prestasi'), $data);
    session()->setFlashdata('update', 'update berhasil');
    return redirect()->to('admin/prestasi');
  }
  public function lihat($id) 
  {
    $data = $this->prestasi->find($id);
    return $this->response->download($data['file_prestasi'], 'uploads/prestasi', false);
  }
  public function delete($id_prestasi)
  {
    $this->prestasi->delete($id_prestasi);
    return redirect()->to('admin/prestasi');
  }
}