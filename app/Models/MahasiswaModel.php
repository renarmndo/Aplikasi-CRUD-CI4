<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
  protected $table = 'mahasiswa';
  protected $allowedFields = ['nim', 'nama', 'alamat', 'jenis_kelamin', 'sampul'];

  public function getMahasiswa($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }
    return $this->where(['nama' => $nama])->first();
  }
}