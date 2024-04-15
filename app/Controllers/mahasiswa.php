<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
  protected $mahasiswamodel;
  public function __construct()
  {
    $this->mahasiswamodel = new MahasiswaModel();

  }
  public function index(): string
  {
    $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

    // $mahasiswa = $this->mahasiswamodel->findAll();
    $data = [
      'title' => 'Menu | Mahasiswa',
      'mahasiswa' => $this->mahasiswamodel->getMahasiswa(),
      'mahasiswa' => $this->mahasiswamodel->paginate(5, 'mahasiswa'),
      'pager' => $this->mahasiswamodel->pager,
      'currentPage' => $currentPage
    ];



    // dd($mahasiswa);
    // $mahasiswamodel = new \App\Models\MahasiswaModel();
    //conecction tanpa database
    // $db = \Config\Database::connect();
    // $mahasiswa = $db->query("SELECT * FROM mahasiswa");
    // foreach ($mahasiswa->getResultArray() as $row) {
    // dd($row);
    // }
    // dd($mahasiswa);
    return view('mahasiswa/index', $data);
  }
  public function detail($nama)
  {
    // echo $nama;
    // $mahasiswa = 
    $data = [
      'title' => 'Detail Mahasiswa',
      'mahasiswa' => $this->mahasiswamodel->getMahasiswa($nama)
    ];
    return view('mahasiswa/detail', $data);
  }
  public function create()
  {
    session();
    $data = [
      'title' => 'Form Tambah Data Mahasiswa',
      'validation' => \Config\Services::validation()

    ];
    return view('mahasiswa/create', $data);

  }
  public function save()
  {
    //valdasi input
    if (
      !$this->validate([
        'nim' => [
          'rules' => 'required|is_unique[mahasiswa.nim]',
          'errors' => [
            'required' => '{field} Harus Diisi',
            'is_unique' => '{field} Sudah Ada'
          ]
        ],
        'nama' => [
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Harus Diisi'
          ]
        ],
        'alamat' => [
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Alamat Harus Diisi'
          ]
        ],
        'sampul' => [
          'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
          'errors' => [
            'max_size' => 'Ukuran Gambar Terlalu Besar',
            'is_image' => 'Yang anda pilih bukan gambar',
            'mime_in' => 'Yang anda pilih bukan gambar'
          ]
        ]
      ])
    ) {
      $validation = \Config\Services::validation();
      return redirect()->to('/mahasiswa/create')->with('validation', $validation);
      // return redirect()->to('/mahasiswa/create');
      // $data['validation'] = $validation
      // return view('create',$data);

    }
    // dd('berhsail');
    //Ambil gambar
    $sampul = $this->request->getFile('sampul');
    //apakah tidak ada gambar yang diupload
    if ($sampul->getError() == 4) {
      $namasampul = 'default.jpg';
    } else {
      // dd($sampul);
      // pindahkan file ke assets /image
      //generate nama sampul random
      $namasampul = $sampul->getRandomName();
      $sampul->move('assets/image', $namasampul);
      // $sampul->move('assets/image');
      //ambil nama file
      // $namasampul = $sampul->getName();
    }

    $this->mahasiswamodel->save([
      'nim' => $this->request->getVar('nim'),
      'nama' => $this->request->getVar('nama'),
      'alamat' => $this->request->getVar('alamat'),
      'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
      'sampul' => $namasampul
    ]);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

    return redirect()->to('/mahasiswa');
  }
  public function delete($id)
  {
    // $mahasiswa = $this->mahasiswamodel->find($id);

    // unlink('img' . $mahasiswa['sampul']);



    $this->mahasiswamodel->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to('/mahasiswa');
  }
  public function edit($nama)
  {
    $data = [
      'title' => 'Form Edit Data Mahasiswa',
      'validation' => \Config\Services::validation(),
      'mahasiswa' => $this->mahasiswamodel->getMahasiswa($nama)

    ];
    return view('mahasiswa/edit', $data);
  }
  public function update($id)
  {
    if (
      !$this->validate([
        'sampul' => [
          'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
          'errors' => [
            'max_size' => 'Ukuran Gambar Terlalu Besar',
            'is_image' => 'Yang anda pilih bukan gambar',
            'mime_in' => 'Yang anda pilih bukan gambar'
          ]
        ]
      ])
    ) {
      // Validasi gagal, handle sesuai kebutuhan (misalnya, redirect atau tampilkan pesan error)
    } else {
      // Validasi berhasil, handle unggahan file dan update database
      $sampul = $this->request->getFile('sampul');

      // Apakah tidak ada gambar yang diupload
      if ($sampul->getError() == 4) {
        $namasampul = $this->request->getVar('sampulLama');
      } else {
        // Pindahkan file ke assets /image
        // Generate nama sampul secara acak
        $namasampul = $sampul->getRandomName();
        $sampul->move('assets/image', $namasampul);
      }

      // Update database
      $this->mahasiswamodel->save([
        'id' => $id,
        'nim' => $this->request->getVar('nim'),
        'nama' => $this->request->getVar('nama'),
        'alamat' => $this->request->getVar('alamat'),
        'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
        'sampul' => $namasampul
      ]);

      session()->setFlashdata('pesan', 'Data Berhasil Diubah');
      return redirect()->to('/mahasiswa');
    }

  }
  public function kontak()
  {
    $data = [
      'title' => 'Menu|Kontak Kami'
    ];
    return view('mahasiswa/kontak', $data);
  }
  public function tambah()
  {
    // Logika penyimpanan data mahasiswa ke dalam database
    $data = [
      'nama' => $this->request->getPost('nama'),
      'nim' => $this->request->getPost('nim'),
      'sampul' => $this->request->getPost('sampul'), // Pastikan Anda menangani foto sesuai dengan kebutuhan
      'alamat' => $this->request->getPost('alamat')
    ];

    $mahasiswaModel = new MahasiswaModel();
    $mahasiswaModel->insert($data);

    // Redirect atau tampilkan pesan sukses
    return redirect()->to('/home');
  }
}
