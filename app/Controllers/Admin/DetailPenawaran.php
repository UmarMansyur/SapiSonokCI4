<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\pasangan_model;
use App\Models\penawaran_model;
use App\Models\prestasi_model;

class DetailPenawaran extends BaseController
{
  protected $penawaran;
  protected $pasangan;
  protected $prestasi;
  public function __construct()
  {
    $this->penawaran = new penawaran_model();
    $this->pasangan = new pasangan_model();
    $this->prestasi = new prestasi_model();
  }
  public function index($id)
  { 
    $getid_pasangan = $this->penawaran->getPenawaranById($id)['id_pasangan'];
    $data = [
      'title'     => 'Pasar',
      'subtitle'  => 'Pasar',
      'penawaran' => $this->penawaran->getPenawaranById($id),
      'prestasi'  => $this->prestasi->getPrestasiById($getid_pasangan),
      'induk_betina_kanan'  => $this->pasangan->getIndukBetina($getid_pasangan)[0]['nama_sapi'],
      'induk_jantan_kanan'  => $this->pasangan->getIndukJantan($getid_pasangan)[0]['nama_sapi'],
      'induk_betina_kiri'  => $this->pasangan->getIndukBetinaKiri($getid_pasangan)[0]['nama_sapi'],
      'induk_jantan_kiri'  => $this->pasangan->getIndukJantanKiri($getid_pasangan)[0]['nama_sapi']
    ];
    return view('admin/detail_penawaran', $data);
  }
 
  
}
