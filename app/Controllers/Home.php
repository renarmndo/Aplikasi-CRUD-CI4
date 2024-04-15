<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Home extends BaseController
{
    public function index()
    {
        // Ambil semua data mahasiswa dari model MahasiswaModel
        $mahasiswaModel = new MahasiswaModel();
        $mahasiswas = $mahasiswaModel->findAll();

        $data = [
            'title' => 'Menu | HOME',
            'mahasiswas' => $mahasiswas,
        ];

        return view('home', $data);
    }
}
