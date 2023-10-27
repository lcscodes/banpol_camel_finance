<?= $this->extend('template/template/template') ?>

<?= $this->section('content') ?>

<!-- main content-->
<?php foreach ($lokasi as $u) : ?>
  <div class="container pt-5 pb-3">
    <div class="row">
      <div class="col-md-12">
        <?= $u['nama_lokasi']; ?>
      </div>
    </div>
  </div>
  <!-- .main content-->
<?php endforeach ?>
<?= $this->endSection() ?>