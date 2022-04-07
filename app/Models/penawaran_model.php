<?php

namespace App\Models;

use CodeIgniter\Model;

class penawaran_model extends Model
{
  protected $table = 'penawaran';
  protected $primaryKey = 'id_penawaran';
  protected $allowedFields = ['id_pasangan', 'tanggal_penawaran', 'nominal_pembayaran', 'foto', 'status_penawaran', 'update_at'];
  protected $useTimestamps = true;
  protected $createdField = 'tanggal_penawaran';
  protected $updatedField = 'update_at';

  public function search ($search) 
  {
    return $this->table('pasangan')->like('nama_pasangan', $search);
  }
  public function getPenawaran()
  {
    return $this->table('penawaran')
                ->select('nama_peternak')
                ->select('penawaran.update_at')
                ->select('pasangan.id_pasangan')
                ->select('id_penawaran')
                ->select('penawaran.foto')
                ->select('nama_pasangan')
                ->select('nominal_pembayaran')
                ->select('nomor_telpon')
                ->select('status_penawaran')
                ->join('pasangan', 'penawaran.id_pasangan = pasangan.id_pasangan', 'left')
                ->join('pasangan_kanan', 'pasangan.id_pasangan_kanan = pasangan_kanan.id_pasangan_kanan', 'left')
                ->join('sapi', 'pasangan_kanan.id_sapi = sapi.id_sapi', 'left')
                ->join('kepemilikan', 'sapi.id_sapi = kepemilikan.id_sapi', 'left')
                ->join('peternak', 'kepemilikan.id_peternak = peternak.id_peternak')->findAll();
  }
  public function getMyPenawaran($id)
  {
    return $this->table('penawaran')
                ->select('id_penawaran')
                ->select('penawaran.update_at')
                ->select('pasangan.id_pasangan')
                ->select('nama_pasangan')
                ->select('nominal_pembayaran')
                ->select('tanggal_penawaran')
                ->select('status_penawaran')
                ->select('penawaran.foto')
                ->join('pasangan', 'penawaran.id_pasangan = pasangan.id_pasangan', 'left')
                ->join('pasangan_kanan', 'pasangan.id_pasangan_kanan = pasangan_kanan.id_pasangan_kanan', 'left')
                ->join('sapi', 'pasangan_kanan.id_sapi = sapi.id_sapi', 'left')
                ->join('kepemilikan', 'sapi.id_sapi = kepemilikan.id_sapi', 'left')
                ->join('peternak', 'kepemilikan.id_peternak = peternak.id_peternak', 'left')
                ->where('kepemilikan.id_peternak', $id)
                ->paginate(5, 'penawaran');
  }
  public function getPenawaranById($id)
  {
    return $this->table('penawaran')
                ->select('nama_peternak')
                ->select('penawaran.update_at')
                ->select('pasangan.id_pasangan')
                ->select('id_penawaran')
                ->select('penawaran.foto')
                ->select('nama_pasangan')
                ->select('nominal_pembayaran')
                ->select('nomor_telpon')
                ->select('status_penawaran')
                ->join('pasangan', 'penawaran.id_pasangan = pasangan.id_pasangan', 'left')
                ->join('pasangan_kanan', 'pasangan.id_pasangan_kanan = pasangan_kanan.id_pasangan_kanan', 'left')
                ->join('sapi', 'pasangan_kanan.id_sapi = sapi.id_sapi', 'left')
                ->join('kepemilikan', 'sapi.id_sapi = kepemilikan.id_sapi', 'left')
                ->join('peternak', 'kepemilikan.id_peternak = peternak.id_peternak')->find($id);
  }
}