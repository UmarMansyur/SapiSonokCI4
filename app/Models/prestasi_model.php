<?php
namespace App\Models;
use CodeIgniter\Model;
class prestasi_model extends Model
{
  protected $table = 'prestasi';
  protected $primaryKey = 'id_prestasi';
  protected $allowedFields = ['id_prestasi', 'id_pasangan', 'prestasi', 'file_prestasi', 'tahun_prestasi'];

  public function search($search)
  {
    return $this->table('prestasi')->like('prestasi', $search)->orLike('nama_pasangan', $search);
  }
  public function getPrestasi($id_peternak)
  {
    return $this->table('prestasi')
      ->select('pasangan.nama_pasangan')
      ->select('pasangan.id_pasangan')
      ->select('prestasi.prestasi')
      ->select('prestasi.id_prestasi')
      ->select('tahun_prestasi')
      ->select('file_prestasi')
      ->join('pasangan', 'prestasi.id_pasangan = pasangan.id_pasangan', 'left')
      ->join('pasangan_kanan', 'pasangan.id_pasangan_kanan = pasangan_kanan.id_pasangan_kanan', 'left')
      ->join('sapi', 'pasangan_kanan.id_sapi = sapi.id_sapi', 'left')
      ->join('kepemilikan', 'sapi.id_sapi = kepemilikan.id_sapi', 'left')
      ->where('kepemilikan.id_peternak', $id_peternak)
      ->paginate(5, 'peternak');
  }
  public function getPrestasiById($id)
  {
    return $this->table('pretasi')
                ->select('prestasi')
                ->where('prestasi.id_pasangan', $id)
                ->findAll();
  }
  public function getIndukBetina($id)
  {
    return $this->table('pasangan')
                ->select('sapi.nama_sapi')
                ->join('pasangan_kanan', 'id_pasangan_kanan = pasangan_kanan.id_pasangan_kanan', 'left')
                ->join('sapi', 'pasangan_kanan.id_sapi = sapi.id_sapi', 'left')
                ->join('induk_betina', 'sapi.id_sapi = induk_betina.id_sapi', 'left')
                ->where('id_pasangan', $id )
                ->findAll();
  }
}
