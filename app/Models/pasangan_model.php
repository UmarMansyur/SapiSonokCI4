<?php

namespace App\Models;
use CodeIgniter\Model;

class pasangan_model extends Model {
  protected $table = 'pasangan';
  protected $primaryKey = 'id_pasangan';
  protected $allowedFields = ['id_pasangan', 'nama_pasangan', 'id_pasangan_kanan', 'id_pasangan_kiri'];

  public function search ($search) 
  {
    return $this->table('pasangan')->like('nama_pasangan', $search);
  }

  public function getPasanganKanan($id)
  {
    return $this->table('pasangan')
                ->select('id_pasangan')
                ->select('nama_pasangan')
                ->join('pasangan_kanan','pasangan.id_pasangan_kanan = pasangan_kanan.id_pasangan_kanan', 'left')
                ->select('pasangan.id_pasangan_kiri')
                ->join('pasangan_kiri','pasangan.id_pasangan_kiri = pasangan_kiri.id_pasangan_kiri', 'left')
                ->select('pasangan.id_pasangan_kanan')
                ->select('sp.nama_sapi')
                ->join('sapi AS sp', 'pasangan_kanan.id_sapi = sp.id_sapi', 'left')
                ->select('sp.id_sapi AS id_sapi_kanan')
                ->join('sapi', 'pasangan_kiri.id_sapi = sapi.id_sapi', 'left')
                ->select('sapi.nama_sapi AS sapi')
                ->select('sapi.id_sapi AS id_sapi_kiri')
                ->join('kepemilikan', 'sapi.id_sapi = kepemilikan.id_sapi', 'left')
                ->where('kepemilikan.id_peternak', $id)->orderBy('pasangan.id_pasangan ASC')->paginate(5, 'pasangan');
  }
  public function getIndukBetina($id)
  {
    return $this->table('pasangan')
                ->select('nama_sapi')
                ->join('pasangan_kanan', 'pasangan.id_pasangan_kanan = pasangan_kanan.id_pasangan_kanan', 'left')
                ->join('silsilah', 'pasangan_kanan.id_sapi = silsilah.id_sapi', 'left')
                ->join('induk_betina', 'silsilah.id_induk_betina = induk_betina.id_induk_betina', 'left')
                ->join('sapi', 'induk_betina.id_sapi = sapi.id_sapi', 'left')
                ->where('id_pasangan', $id)->findAll();
  }
  public function getIndukJantan($id)
  {
    return $this->table('pasangan')
                ->select('nama_sapi')
                ->join('pasangan_kanan', 'pasangan.id_pasangan_kanan = pasangan_kanan.id_pasangan_kanan', 'left')
                ->join('silsilah', 'pasangan_kanan.id_sapi = silsilah.id_sapi', 'left')
                ->join('induk_jantan', 'silsilah.id_induk_jantan = induk_jantan.id_induk_jantan', 'left')
                ->join('sapi', 'induk_jantan.id_sapi = sapi.id_sapi', 'left')
                ->where('id_pasangan', $id)->findAll();
  }
  public function getIndukBetinaKiri($id)
  {
    return $this->table('pasangan')
                ->select('nama_sapi')
                ->join('pasangan_kiri', 'pasangan.id_pasangan_kiri = pasangan_kiri.id_pasangan_kiri', 'left')
                ->join('silsilah', 'pasangan_kiri.id_sapi = silsilah.id_sapi', 'left')
                ->join('induk_betina', 'silsilah.id_induk_betina = induk_betina.id_induk_betina', 'left')
                ->join('sapi', 'induk_betina.id_sapi = sapi.id_sapi', 'left')
                ->where('id_pasangan', $id)->findAll();
  }
  public function getIndukJantanKiri($id)
  {
    return $this->table('pasangan')
                ->select('nama_sapi')
                ->join('pasangan_kiri', 'pasangan.id_pasangan_kiri = pasangan_kiri.id_pasangan_kiri', 'left')
                ->join('silsilah', 'pasangan_kiri.id_sapi = silsilah.id_sapi', 'left')
                ->join('induk_jantan', 'silsilah.id_induk_jantan = induk_jantan.id_induk_jantan', 'left')
                ->join('sapi', 'induk_jantan.id_sapi = sapi.id_sapi', 'left')
                ->where('id_pasangan', $id)->findAll();
  }
  
}