<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\peternak_model;

class Profile extends BaseController
{

  protected $peternak;
  public function __construct()
  {
    $this->peternak = new peternak_model();
  }
  public function index()
  {
    $data = [
      'title' => 'Dashboard',
      'subtitle' => 'Profile',
    ];
    return view('admin/profile', $data);
  }
  public function verifikasi()
  {
    // dd($this->request->getFile('foto')->getName());
    if ($this->request->getFile('foto') != "") {
      $foto = $this->request->getFile('foto');
      $foto->move('uploads/profile', $foto->getName());
      $get_foto = $foto->getName();
      $image = \Config\Services::image()
        ->withFile(ROOTPATH . 'public/uploads/profile/' . $get_foto)
        ->fit(128, 128, 'center')
        ->save(ROOTPATH . 'public/uploads/profile/' . 'icon_' . $get_foto);
      $gambar = \Config\Services::image()
        ->withFile(ROOTPATH . 'public/uploads/profile/' . $get_foto)
        ->fit(180, 180, 'center')
        ->save(ROOTPATH . 'public/uploads/profile/' . 'profile_' . $get_foto);
      $data = [
        'nama_peternak' => $this->request->getPost('nama_peternak') == null ? user_login()->nama_peternak : $this->request->getPost('nama_peternak'),
        'nomor_telpon'  => $this->request->getPost('nomor_telpon') == null ? user_login()->nomor_telpon : $this->request->getPost('nomor_telpon'),
        'status_admin'  => $this->request->getPost('status_admin') == null ? user_login()->status_admin : $this->request->getPost('status_admin'),
        'alamat'        => $this->request->getPost('alamat_peternak') == null ? user_login()->alamat : $this->request->getPost('alamat_peternak'),
        'email'         => $this->request->getPost('email') == null ? user_login()->email : $this->request->getPost('email'),
        'status_akun'   => $this->request->getPost('status') == null ? user_login()->status_akun : $this->request->getPost('status'),
        'password'      => $this->request->getPost('password') == null ? user_login()->password : $this->request->getPost('password'),
        'foto'          => $this->request->getFile('foto') == null ? user_login()->foto : $this->request->getFile('foto')->getName(),
        'icon'          => $image,
        'profile'       => $gambar
      ];
      $this->peternak->update(user_login()->id_peternak, $data);
      return redirect()->to('profile');
    }
    $data = [
      'nama_peternak' => $this->request->getPost('nama_peternak') == null ? user_login()->nama_peternak : $this->request->getPost('nama_peternak'),
      'nomor_telpon'  => $this->request->getPost('nomor_telpon') == null ? user_login()->nomor_telpon : $this->request->getPost('nomor_telpon'),
      'status_admin'  => $this->request->getPost('status_admin') == null ? user_login()->status_admin : $this->request->getPost('status_admin'),
      'alamat'        => $this->request->getPost('alamat_peternak') == null ? user_login()->alamat : $this->request->getPost('alamat_peternak'),
      'email'         => $this->request->getPost('email') == null ? user_login()->email : $this->request->getPost('email'),
      'status_akun'   => $this->request->getPost('status') == null ? user_login()->status_akun : $this->request->getPost('status'),
      'password'      => $this->request->getPost('password') == null ? user_login()->password : $this->request->getPost('password'),
    ];
    $this->peternak->update(user_login()->id_peternak, $data);
    return redirect()->to('profile');
  }
}
