<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h2 class="my-3">Form Tambah Data Mahasiswa</h2>
      <?php if (session()->has('validation')): ?>
        <div class="alert alert-danger">
          <?= session('validation')->listErrors() ?>
        </div>
      <?php endif; ?>
      <form action="<?= base_url('mahasiswa/save') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?><!--Menjaga agar form diisi dari halaman ini saja-->
        <div class="row mb-3">
          <label for="nim" class="col-sm-2 col-form-label">NIM</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" id="nim"
              name="nim" value="<?= old('nim') ?>" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('nim'); ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>">
          </div>
        </div>
        <div class="row mb-3">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat') ?>">
          </div>
        </div>
        <div class="row mb-3">
          <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-10">
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
              <option value="Laki-laki" <?= (old('jenis_kelamin') == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
              <option value="Perempuan" <?= (old('jenis_kelamin') == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
              <option value="Lainnya" <?= (old('jenis_kelamin') == 'Lainnya') ? 'selected' : '' ?>>Lainnya</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <label for="sampul" class="col-sm-2 col-form-label">Foto</label>
          <div class="col-sm-2">
            <img src="/assets/image/default.jpg" class="img-thumbnail img-preview">
          </div>
          <div class="col-sm-8">
            <div class="mb-3">
              <input class="form-control <?php ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" type="file"
                id="sampul" name="sampul" onchange="previewImg()">
              <div class="invliad-feedback">
                <?= $validation->getError('sampul'); ?>
              </div>
              <label for="sampul" class="form-label">Pilih Gambar..</label>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>