<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="mt-3">Update Matakuliah</h1>
      <!-- Bootstrap 5 Card -->
      <div class="card">
        <div class="card-header">
          Matakuliah Detail
        </div>
        <div class="card-body">
          <table class="table table-success table-striped">
            <!-- ... Tabel Detail Matakuliah ... -->
          </table>
          <!-- Admin CRUD -->
          <!-- Form Edit -->
          <form action="/matakuliah/save" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="">
            <div class="mb-3">
              <label for="kode" class="form-label">Kode Mata Kuliah</label>
              <input type="text" class="form-control" name="kode" value="" autofocus required>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Mata Kuliah</label>
              <input type="text" class="form-control" name="nama" value="" required>
            </div>
            <div class="mb-3">
              <label for="sks" class="form-label">SKS</label>
              <input type="text" class="form-control" id="sks" name="sks" value="" required>
            </div>
            <div class="mb-3">
              <label for="nama_dosen" class="form-label">Dosen Pengajar</label>
              <input type="text" class="form-control" name="nama_dosen" value="" required>
            </div>
            <div class="mb-3">
              <label for="jadwal" class="form-label">Jadwal</label>
              <input type="text" class="form-control" name="jadwal" value="" required>
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label">Kelas</label>
              <input type="text" class="form-control" name="kelas" value="" required>
            </div>
            <div class="mb-3">
              <label for="jam" class="form-label">Jam</label>
              <input type="text" class="form-control" name="jam" value="" required>
            </div>
            <!-- Tambahkan field untuk jadwal, kelas, dan jam matakuliah sesuai kebutuhan -->
            <button type="submit" class="btn btn-warning">Tambah</button>
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