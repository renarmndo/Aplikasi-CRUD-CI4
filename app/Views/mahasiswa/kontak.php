<!-- app/Views/mahasiswa/kontak.php -->

<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
  <div class="row">
    <div class="col">
      <h1 class="mt-3">Hubungi Kami</h1>
      <form>
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control" id="name" placeholder="Your name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Your email">
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Pesan</label>
          <textarea class="form-control" id="message" rows="3" placeholder="Your message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">kirim</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>