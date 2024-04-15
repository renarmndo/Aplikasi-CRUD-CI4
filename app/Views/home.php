<!-- app/Views/home.php -->

<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<section class="main-section py-5">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-6 text-center align-self-center">
        <h1>Universitas Pamulang</h1>
        <p>
          Universitas Pamulang adalah perguruan tinggi yang berlokasi di Pamulang, Tangerang, Indonesia. Universitas ini
          mungkin menawarkan berbagai program studi di berbagai bidang akademik. Informasi lebih lanjut tentang sejarah,
          visi, misi, serta fasilitas dan program yang ditawarkan dapat ditemukan melalui sumber resmi universitas.
        </p>
        <button type="button" class="btn btn-primary"
          onclick="window.location.href='<?= base_url('mahasiswa'); ?>'">Belajar Sekarang</button>
      </div>

      <div class="col-lg-6">
        <div class="px-4 py-5">
          <img src="<?= base_url('assets/image/gedung-unpam.png'); ?>" class="img-fluid" alt="">
        </div>
      </div>
    </div>
    <hr>
    <hr>
    <div class="row mt-5">
      <?php foreach ($mahasiswas as $mahasiswa): ?>
        <div class="col-lg-4 mb-4">
          <div class="card">
            <img src="<?= base_url('assets/image/' . $mahasiswa['sampul']); ?>" class="card-img-top img-thumbnail"
              alt="<?= $mahasiswa['nama'] ?>">
            <div class="card-body">
              <h5 class="card-title">
                <?= $mahasiswa['nama'] ?>
              </h5>
              <p class="card-text">
                <?= $mahasiswa['nim'] ?>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <hr>
    <div class="row mt-5">
      <div class="col-lg-8 mx-auto">
        <h1 class="text-center">Visi & Misi Universitas Pamulang</h1>

        <div class="mt-5">
          <h2 align="center">Visi</h2>
          <p>
            "Menjadi universitas peringkat 40 besar pada tingkat nasional yang dilandasi oleh nilai humanis dan religius
            pada tahun 2025"
          </p>
        </div>

        <div class="mt-5">
          <h2 align="center">Misi</h2>
          <ul>
            <li>Menyelenggarakan pendidikan akademik, vokasi, dan profesi yang profesional berbasis humanis dan
              religius.</li>
            <li>Melaksanakan penelitian berbasis humanis dan religius yang menghasilkan inovasi untuk kesejahteraan
              masyarakat.</li>
            <li>Melaksanakan pengabdian kepada masyarakat implementasi penelitian berbasis humanis dan religius.</li>
            <li>Menyelenggarakan peningkatan kualitas sumber daya manusia yang kompeten dan profesional.</li>
            <li>Menyelenggarakan kerja sama dalam negeri dan luar negeri berbasis saling menguntungkan.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>