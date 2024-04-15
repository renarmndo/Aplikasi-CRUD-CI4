<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>
    <?= $title; ?>
  </title>
  <style>
    .main-nav {
      background-color: #003566 !important;
    }

    .main-nav .navbar-nav a.nav-link {
      color: #fff;
      font-weight: 600;
    }

    /* .main-nav .navbar-nav .nav-link.active,
        .main-nav .navbar-nav .nav-link.hover {
            color: #FFC300;
        } */
    .main-nav .navbar-nav .nav-link.active {
      color: #FFC300;
    }

    .main-nav .navbar-nav .nav-item:hover .nav-link {
      color: #FFC300;
    }

    .navbar-brand {
      color: #FFC300;
    }

    .main-section {
      /* background-color: #003566 !important; */
      /* color: #ffff; */
      color: black;
    }

    .table th,
    .table td {
      text-align: middle;
      vertical-align: middle;
    }

    .footer {
      background-color: #f8f9fa;
      /* Warna grey yang umum */
      width: 100%;
      /* Lebar 100% dari lebar tampilan */
      text-align: center;
      /* Pusatkan teks di dalam footer */
      padding: 15px 0;
      /* Ruang bawah dan atas untuk memberikan ruang di dalam footer */
      /* position: fixed; */
      /* Footer tetap di bagian bawah layar */
      bottom: 0;
      /* Footer ditempatkan di bagian bawah */
    }
  </style>
</head>

<body>
  <header class="navbar navbar-expand-lg bg-light main-nav">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="<?php echo base_url('assets/image/logo.png'); ?>" height="75px"
          width="75px" class="img-circle img-sm" alt=""></a>
      <button style="background-color: #fff !important;" class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0"> -->
        <!-- menjadi rata sebelah kanan -->
        <ul class="navbar-nav ms-auto py-3">
          <li class="nav-item">
            <a class="nav-link active px-4" aria-current="page" href="<?= base_url('/'); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-4" href="<?= base_url('mahasiswa'); ?>">Mahasiswa</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle px-4" href="<?= base_url('matakuliah/'); ?>" role="button"
              data-bs-toggle="dropdown" aria-expanded="true">
              Jadwal Kuliah
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link px-4" href="<?= base_url('mahasiswa/kontak'); ?>">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <?= $this->renderSection('content'); ?>
  <footer class="footer">
    <div class="container">
      <span class="text-muted">&copy;
        <?= date('Y') ?> Rendani A H Hutagaol Rekayasa Web - Sistem Informasi, Fakultas Ilmu Komputer, Universitas
        Pamulang
      </span>
    </div>
  </footer>
  <script src="<?= base_url() ?>assets/js/bootstrap.bundle.js"></script>
  <script>
    function previewImg() {
      const sampul = document.querySelector('#sampul');
      const sampullabel = dodocument.querySelector('.form-label');
      const imgPreview = document.querySelector('.img-preview');
      sampulLabel.ttextContent = sampul.files[0].name;
      const fileSampul = new FileReader();
      fileSampul.readAsDataURL(sampul.files[0]);

      fileSampul.onload = function (e) {
        imgPreview.src = e.target.result;
      }
    }

  </script>
</body>

</html>