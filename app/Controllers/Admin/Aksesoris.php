<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\aksesoris_model;

class Aksesoris extends BaseController
{
  protected $aksesoris;
  public function __construct()
  {
    $this->aksesoris = new aksesoris_model();
  }
  public function index()
  { 
    
    $hasil = $this->request->getVar('cari');
    if ($hasil) {
      $result = $this->aksesoris->search($hasil);
    } else {
      $result = $this->aksesoris;
    }
    $data = [
      'title' => 'Aksesoris',
      'subtitle' => 'Aksesoris',
      'aksesoris' => $this->aksesoris->paginate(5, 'aksesoris'),
      'pager' => $this->aksesoris->pager,
      'currentPage' => $this->request->getVar('page_aksesoris') == null ? 1 : $this->request->getVar('page_aksesoris')
    ];
    return view('admin/aksesoris', $data);
  }
  public function insert()
  {
    $data = [
      'title' => "Aksesoris",
      'subtitle' => "Tambah Aksesoris",
      'validation' => \Config\Services::validation()
    ];

    return view('admin/add_aksesoris', $data);
  }
  public function edit()
  {
    $getOldFile = $this->aksesoris->where('id_aksesoris', $this->request->getPost('id_aksesoris'))->findAll()[0]['file_aksesoris'];
    $typeFile = $this->request->getFile('file_aksesoris');
    $nameFile = $typeFile->getName() == null ? $getOldFile : $typeFile->getName();
    $data = [
      'nama_aksesoris' => $this->request->getPost('nama_aksesoris'),
      'deksripsi_aksesoris' => $this->request->getPost('deksripsi_aksesoris'),
      'file_aksesoris' => $nameFile,
    ];

    if ($typeFile->getName() == $nameFile) {
      $typeFile->move('uploads/aksesoris', $nameFile);
    };
    $this->aksesoris->update($this->request->getPost('id_aksesoris'), $data);
    session()->setFlashdata('update', 'update berhasil');
    return redirect()->to(base_url('/aksesoris'));
  }
  public function delete($id)
  {
    $this->aksesoris->delete($id);
    return redirect()->to(base_url('/aksesoris'));
  }
  public function save()
  {
    $validation = \config\Services::validation();
    if (!$this->validate([
      'aksesoris' => [
        'rules' => 'required|is_image[file_aksesoris]',
        'errors' => [
          'required' => 'Judul aksesoris tidak diisi',
          'is_image' => 'Jenis file bukan gambar'
        ]
      ],
    ])) {
      return redirect()->to(base_url('/add_aksesoris'))->withInput()->with('validation', $validation);
    };

    $count = $this->aksesoris->countAllResults();
    $typeFile = $this->request->getFile('file_aksesoris');
    $data = [
      'nama_aksesoris' => $this->request->getPost('aksesoris'),
      'deksripsi_aksesoris' => $this->request->getPost('deksripsi'),
      'file_aksesoris' => $typeFile->getName(),
    ];
    $this->aksesoris->insert($data);
    $typeFile->move('uploads/aksesoris', $typeFile->getName());
    if ($count < $this->aksesoris->countAllResults()) {
      session()->setFlashdata('success', 'Data berhasil ditambahkan!');
      return redirect()->to(base_url('/aksesoris'));
    }
  }
}
