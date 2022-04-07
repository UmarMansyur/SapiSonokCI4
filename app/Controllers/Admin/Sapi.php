<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\indukBetina_model;
use App\Models\indukJantan_model;
use App\Models\pemilik_model;
use App\Models\sapi_model;
use App\Models\silsilah_model;

class Sapi extends BaseController
{

  protected $sapi;
  protected $induk_jantan;
  protected $induk_betina;
  protected $pemilik;
  protected $betina;
  protected $jantan;
  protected $builder;
  protected $silsilah;
  public function __construct()
  {
    $this->sapi = new sapi_model();
    $this->induk_jantan = new indukJantan_model();
    $this->induk_betina = new indukBetina_model();
    $this->silsilah = new silsilah_model();
    $this->pemilik = new pemilik_model();
    $this->betina = new indukBetina_model();
    $this->jantan = new indukJantan_model();
    $this->builder = db_connect();
  }
  public function index()
  {
    $hasil = $this->request->getVar('cari');
    if ($hasil) {
      $result = $this->pemilik->search($hasil);
    } else {
      $result = $this->pemilik;
    }
    $data = [
      'title'     => 'Sapi',
      'subtitle'  => 'Sapi',
      'sapi'      => $this->pemilik->getSapi(session('id_peternak')),
      'pager' => $this->pemilik->pager,
      'currentPage' => $this->request->getVar('page_peternak') == null ? 1 : $this->request->getVar('page_peternak') 
    ];
    return view('admin/sapi', $data);
  }

  public function tambah()
  {
    $count = $this->sapi->countAllResults();
    $data = [
      'nama_sapi'     => $this->request->getPost('nama_sapi'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
      'status_sapi'   => $this->request->getPost('status_sapi'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
    ];
    $this->sapi->insert($data);
    $pemilik = [
      'id_peternak'               => session('id_peternak'),
      'id_sapi'                   => $this->sapi->getInsertID(),
      'tanggal_awal_kepemilikan'  => $this->request->getPost('tanggal_kepemilikan')
    ];
    $this->pemilik->insert($pemilik);
    if ($count < $this->sapi->countAllResults()) {
      session()->setFlashdata('success', 'Data Sapi berhasil ditambahkan');
      return redirect()->to(base_url('sapi'));
    } else {
      session()->setFlashdata('error', 'Data Sapi gagal ditambahkan');
      return redirect()->to(base_url('sapi'));
    }
    return redirect()->to(base_url('sapi'));
  }

  public function silsilah()
  {
    $count = $this->silsilah->countAllResults();

    $indukJantan =['id_sapi' => $this->request->getPost('induk_jantan')];
    $this->induk_jantan->insert($indukJantan);
    $id_induk_jantan = $this->induk_jantan->getInsertID();

    $indukBetina =['id_sapi' => $this->request->getPost('induk_betina')];
    $this->induk_betina->insert($indukBetina);
    $id_induk_betina = $this->induk_betina->getInsertID();


    $data = [
      'id_induk_betina' => $id_induk_betina,
      'id_sapi'         => $this->request->getPost('id_sapi'),
      'id_induk_jantan' => $id_induk_jantan
    ];
    $this->silsilah->insert($data);
    if($count < $this->silsilah->countAllResults()){
      session()->setFlashdata('silsilahSuccess', 'Berhasil');
      return redirect()->to('/sapi');
    }
    
  }
  
  public function edit()
  {
    $id_sapi = $this->request->getPost('edit_id_sapi');
    $sapi = [
      'nama_sapi' => $this->request->getPost('edit_nama_sapi'),
      'jenis_kelamin' => $this->request->getPost('edit_jenis_kelamin'),
      'tanggal_lahir' => $this->request->getPost('edit_tanggal_lahir'),
      'status_sapi' => $this->request->getPost('edit_status_sapi'),
    ];
    $this->sapi->update($id_sapi, $sapi);
    $pemilik = [
      'tanggal_awal_kepemilikan' => $this->request->getPost('edit_tanggal_kepemilikan'),
    ];
    $this->builder->table('kepemilikan')
                  ->set('tanggal_awal_kepemilikan', $this->request->getPost('edit_tanggal_kepemilikan'))
                  ->where('id_sapi', $id_sapi)
                  ->update();
    session()->setFlashdata('update', 'berhasil');
    return redirect()->to('/sapi');
  }

  public function delete($id) 
  {
    $this->builder->table('kepemilikan')->delete(['id_sapi'=> $id]);
    $this->builder->table('induk_betina')->delete(['id_sapi'=> $id]);
    $this->builder->table('induk_jantan')->delete(['id_sapi'=> $id]);
    $this->builder->table('sapi')->delete(['id_sapi'=> $id]);
    return redirect()->to('/sapi');
  }
}