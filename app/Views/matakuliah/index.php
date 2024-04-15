<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <h1 class="mt-2">Daftar Matakuliah</h1>
  <?php if (session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success" role="alert">
      <?= session()->getFlashdata('pesan'); ?>
    </div>
  <?php endif ?>
  <a href="/matakuliah/create" class="btn btn-primary mb-3">Tambah Matakuliah</a>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr align="center">
          <th>No</th>
          <th>Nama</th>
          <th>Kode</th>
          <th>SKS</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($matakuliah as $mk): ?>
          <tr>
            <td align="center">
              <?= $no++; ?>
            </td>
            <td>
              <?= $mk['nama']; ?>
            </td>
            <td align="center">
              <?= $mk['kode']; ?>
            </td>
            <td align="center">
              <?= $mk['sks']; ?>
            </td>
            <td align="center">
              <a href="/matakuliah/detail/<?= $mk['nama']; ?>" class="btn btn-success">Detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>