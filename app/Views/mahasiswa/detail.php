<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
  /* CSS Anda yang ada sebelumnya */

  /* Aturan untuk mengatur ukuran maksimal gambar */
  .img-fluid {
    max-width: 100%;
    /* Maksimum lebar gambar adalah 100% dari kontainer yang memuatnya */
    height: auto;
    /* Tetap mempertahankan proporsi tinggi sesuai lebar */
  }

  /* CSS Anda yang ada setelahnya */
</style>

<div class="container">
  <div class="row">
    <div class="col mt-3">
      <h2>Detail Mahasiswa</h2>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/assets/image/<?= $mahasiswa['sampul']; ?>" class="img-fluid rounded-start"
              alt="<?= $mahasiswa['nama']; ?>">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Nama :
                <?= $mahasiswa['nama']; ?>
              </h5>
              <p class="card-text"><b>Alamat :</b>
                <?= $mahasiswa['alamat']; ?>
              </p>
              <p class="card-text"><b>NIM :</b>
                <?= $mahasiswa['nim']; ?>
              </p>
              <p class="card-text"><small class="text-muted">Jenis Kelamin :
                  <?= $mahasiswa['jenis_kelamin']; ?>
                </small></p>
              <a href="/mahasiswa/edit/<?= $mahasiswa['nama']; ?>" class="btn btn-warning">Edit</a>

              <form action="/mahasiswa/<?= $mahasiswa['id']; ?>" method="POST" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger"
                  onclick="return confirm('Apakah anda yakin?')">Delete</button>
              </form>
              <br><br>
              <a href="/mahasiswa">Kembali Kedaftar Mahasiswa</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection();