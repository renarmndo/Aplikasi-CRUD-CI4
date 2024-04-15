<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
  <div class="col">
    <div class="row mt-3">
      <!-- <h1>Daftar Mahasiswa</h1> -->
      <div class="card mt-3">
        <div class="card-header">
          <H5>Daftar Mahasiswa</H5>
          <?php
          // Display session flash message if it exists
          if (session()->getFlashdata('pesan')):
            ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>
          <a href="/mahasiswa/create" class="btn btn-primary mb-3 mt-2">Tambah Data Mahasiswa</a>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr align="center">
                <th scope="col">ID</th>
                <th scope="col">Nim</th>
                <th scope="col">Nama</th>
                <!-- <th scope="col">Alamat</th> -->
                <!-- <th scope="col">Jenis Kelamin</th> -->
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 + (5 * ($currentPage - 1)); ?>
              <?php foreach ($mahasiswa as $m): ?>
                <tr align="center">
                  <th scope="row">
                    <?= $i++; ?>
                  </th>
                  <td>
                    <?= $m['nim']; ?>
                  </td>
                  <td>
                    <?= $m['nama']; ?>
                  </td>
                  <td><a href="/mahasiswa/detail/<?= $m['nama']; ?>" class="btn btn-success">Detail</a></td>
                  <!-- <td>@mdo</td> -->
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?= $pager->links('mahasiswa', 'mahasiswa_pagination'); ?>
        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection(); ?>