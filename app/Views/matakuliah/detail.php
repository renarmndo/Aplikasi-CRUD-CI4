<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="mt-2">Detail Matakuliah</h1>

      <!-- Bootstrap 5 Card -->
      <div class="card">
        <div class="card-header">
          Matakuliah Detail
        </div>
        <div class="card-body">
          <table class="table table-success table-striped">
            <thead>
              <tr>
                <!-- <th scope="col">ID</th> -->
                <th scope="col">Kode</th>
                <th scope="col">Matakuliah</th>
                <th scope="col">SKS</th>
                <th scope="col">Dosen Pengajar</th>
                <th scope="col">Jadwal</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jam</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <!-- <th scope="row">1</th> -->
                <td>
                  <?= $matakuliah['kode']; ?>
                </td>
                <td>
                  <?= $matakuliah['nama']; ?>
                </td>
                <td>
                  <?= $matakuliah['sks']; ?>
                </td>
                <td>
                  <?= $matakuliah['nama_dosen']; ?>
                </td>
                <td>
                  <?= $matakuliah['jadwal']; ?>
                </td>
                <td>
                  <?= $matakuliah['kelas']; ?>
                </td>
                <td>
                  <?= $matakuliah['jam']; ?>
                </td>
              </tr>
            </tbody>
          </table>
          <a href="/matakuliah/edit/<?= $matakuliah['nama']; ?>" class="btn btn-warning">Edit</a>
          <form action="/matakuliah/<?= $matakuliah['id']; ?>" method="post" class="d-inline">
            <input type="hidden" name="_method" value="DELETE">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin')">Delete</button>
          </form>
          <br><br>
          <a href="/matakuliah">Kembali Ke Dashboard</a>
        </div>
      </div>
      <!-- End of Bootstrap 5 Card -->
    </div>
  </div>
</div>

<?= $this->endSection(); ?>