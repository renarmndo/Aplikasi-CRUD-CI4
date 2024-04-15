<?php

namespace App\Models;

use CodeIgniter\Model;

class MatakuliahModel extends Model
{
  protected $table = 'matakuliah';
  protected $primaryKey = 'id';
  protected $allowedFields = ['kode', 'nama', 'sks', 'jadwal', 'nama_dosen', 'jadwal', 'kelas', 'jam']; // Sesuaikan dengan kolom yang ada di tabel matakuliah

  public function getMatakuliah($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }
    return $this->where(['nama' => $nama])->first();
  }
  // Tambahan metode atau properti model jika diperlukan
}