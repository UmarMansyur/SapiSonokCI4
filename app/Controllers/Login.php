<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\peternak_model;

class Login extends BaseController
{
  protected $peternak;
  public function __construct()
  {
    $this->peternak = new peternak_model();
  }
  public function index()
  {
    return view('auth/form_login');
  }
  public function masuk()
  {
    dd($this->request->getVar());
  }
  public function create()
  {
    $validation = \config\Services::validation();
    if (!$this->validate([
      'nama' => [
        'rules' => 'required|min_length[3]|max_length[20]|is_unique[peternak.nama_peternak]',
        'errors' => [
          'required' => 'nama tidak boleh kosong',
          'min_length' => 'nama terlalu pendek',
          'max_length' => 'nama terlalu panjang',
          'is_unique' => 'nama yang anda masukkan sudah terdaftar',
        ]
      ],
      'alamat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'alamat tidak boleh kosong',
        ]
      ],
      'email' => [
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'email tidak boleh kosong',
          'valid_email' => 'Email tidak valid'
        ]
      ],
      'password' => [
        'rules' => 'required|min_length[3]|max_length[20]',
        'errors' => [
          'required' => 'password tidak boleh kosong',
          'min_length' => 'password terlalu pendek',
          'max_length' => 'password terlalu panjang',
        ]
      ],
    ])){
      return redirect()->to('/registrasi')->withInput()->with('validation', $validation);
    }
      $data = [
        'nama_peternak' => $this->request->getPost('nama'),
        'alamat' => $this->request->getPost('alamat'),
        'email' => $this->request->getPost('email'),
        'password' => password_hash(  $this->request->getPost('password'), PASSWORD_DEFAULT)
      ];
      $this->peternak->save($data);
      session()->setFlashdata('success', "Registrasi Berhasil");
      return redirect()->to('/login')->withInput()->with('validation', $validation);
  }
  public function signup()
  {
    $data = [
      'validation' => \Config\Services::validation()
    ];
    return view('auth/registrasi', $data);
  }

  public function signin()
  {
    $acount = [
      'email' => $this->request->getPost('email'),
      'password' => $this->request->getPost('password')
    ];
    $result = $this->peternak->where('email',$acount['email'])->first();
    if($result) {
      $verify_pass = password_verify($acount['password'], $result['password']);
      if($verify_pass) {
        $data = [
          'id_peternak'     => $result['id_peternak'],
          'nama_peternak'   => $result['nama_peternak'],
          'nomor_telpon'    => $result['nomor_telpon'],
          'email'           => $result['email'],
          'password'        => $result['password'],
          'temp_password'   => $acount['password'],
          'alamat'          => $result['alamat'],
          'tanggal_daftar'  => $result['tanggal_daftar'],
          'status_admin'    => $result['status_admin'],
          'foto'            => $result['foto'],
          'status_akun'     => $result['status_akun'],
          'logged_in'       => TRUE
        ];
        session()->set($data);
        return redirect()->to('/dashboard');
      } else {

      }
    } else {
      session()->setFlashdata('error', 'Email belum di daftarkan');
      return redirect()->back();
    }
    return redirect()->back();
  }
  public function logout()
  {
    session()->destroy();
    return redirect()->to('/login');
  }
}
