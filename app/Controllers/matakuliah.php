<?php

// File: app/Controllers/Matakuliah.php
namespace App\Controllers;            

use App\Models\MatakuliahModel;

class Matakuliah extends BaseController
{
  protected $MatakuliahModel;
  public function __construct()
  {
    $this->MatakuliahModel = new MatakuliahModel();
  }
  public function index()
  {
    // $matakuliah = $this->MatakuliahModel->findAll();
    // Logika untuk menampilkan daftar mata kuliah
    // $model = new MatakuliahModel();
    // $mahasiswa = $this->MatakuliahModel->findAll();

    $data = [
      'title' => 'Jadwal Matakuliah',
      'matakuliah' => $this->MatakuliahModel->getMatakuliah()
    ];
    // $data['matakuliah'] = $model->findAll();
    // $db = \Config\Database::connect();
    // $mahasiswa = $db->query("SELECT * FROM matakuliah");
    // foreach ($mahasiswa->getResultArray() as $row)
    // dd($row);
    // $MatakuliahModel = new MatakuliahModel();
    // dd($mahasiswa);
    return view('matakuliah/index', $data);
  }
  public function detail($nama)
  {
    // Konten controller di sini
    // $matakuliah =

    $data = [
      'title' => 'Detail Jadwal Kuliah',
      'matakuliah' => $this->MatakuliahModel->getMatakuliah($nama)
    ];
    // Jika Matakuliah Tidak Ada
    if (empty($data['matakuliah'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama matakuliah' . $nama . 'tidak ditemukan');
    }
    return view('matakuliah/detail', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Form Tambah Data'
    ];
    // Logika untuk menampilkan formulir pembuatan mata kuliah
    return view('matakuliah/create', $data);
  }

  public function save()
  {

    // validasi input
    if (
      !$this->validate([
        'kode' => 'required|is_unique[matakuliah.kode]',
      ])
    ) {
      // $validation = \Config\Services::validation();
      // dd($validation);
      return redirect()->to('matakuliah/create');
    }
    // dd($this->request->getVar());
    // Logika untuk menyimpan data mata kuliah
    $this->MatakuliahModel->save([
      'kode' => $this->request->getVar('kode'),
      'nama' => $this->request->getVar('nama'),
      'sks' => $this->request->getVar('sks'),
      'nama_dosen' => $this->request->getVar('nama_dosen'),
      'jadwal' => $this->request->getVar('jadwal'),
      'kelas' => $this->request->getVar('kelas'),
      'jam' => $this->request->getVar('jam'),
    ]);

    session()->setFlashdata('pesan', ' Data Berhsail Ditambahkan');
    return redirect()->to('/matakuliah');
    // ...
  }

  public function edit($nama)
  {
    $data = [
      'title' => 'Form Edit Data Mahasiswa',
      'matakuliah' => $this->MatakuliahModel->getMatakuliah($nama)
    ];
    return view('matakuliah/edit', $data);
    // Logika untuk menampilkan formulir pengeditan mata kuliah
    // ...
  }

  public function update($id)
  {
    $this->MatakuliahModel->save([
      'id' => $id,
      'kode' => $this->request->getVar('kode'),
      'nama' => $this->request->getVar('nama'),
      'sks' => $this->request->getVar('sks'),
      'nama_dosen' => $this->request->getVar('nama_dosen'),
      'jadwal' => $this->request->getVar('jadwal'),
      'kelas' => $this->request->getVar('kelas'),
      'jam' => $this->request->getVar('jam'),
    ]);

    session()->setFlashdata('pesan', ' Data Berhsail Diubah');
    return redirect()->to('/matakuliah');

    // Logika untuk memperbarui data mata kuliah
    // ...
  }

  public function delete($id)
  {
    $this->MatakuliahModel->delete($id);
    session()->setFlashdata('pesan', ' Data Berhsail Dihapus');
    return redirect()->to('/matakuliah');

    // Logika untuk menghapus data mata kuliah
    // ...
  }
}

