<?= $this->extend('template/template/template') ?>

<?= $this->section('content') ?>

<!-- main content-->
<div class="container pt-5 pb-3">
  <div class="row">
    <div class="col-md-12">
      <center>
        <h1 class="pt-3">Program Belajar Majlis Quran</h1>
      </center>
      <br>
      <div class="container pt-3 text-center">

        <p>Majlis Alquran memiliki beberapa program belajar yang dapat disesuaikan dengan kebutuhan peserta baik untuk perorangan maupun kelompok</p>
        <div class="row pt-3 pb-3">
          <div class="card-deck px-3">
            <?php foreach ($program as $u) : ?>
              <div class="card">
                <img class="card-img-top" src="<?php echo base_url(); ?>/img/<?= $u['gambar']; ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?= $u['nama_program']; ?></h5>
                  <p class="card-text"><?= $u['keterangan']; ?></p>
                  <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <hr>
      <br>
    </div>
  </div>
</div>
<!-- .main content-->

<?= $this->endSection() ?>