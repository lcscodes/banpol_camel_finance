<?= $this->extend('template/template/template') ?>

<?= $this->section('content') ?>

<!-- main content-->
<?php foreach ($profil as $u) : ?>
  <div class="container pt-5 pb-3">
    <div class="row">
      <div class="col-md-12">
        <?= $u['sejarah']; ?>
      </div>
    </div>
  </div>
<?php endforeach ?>
<!-- .main content-->

<?= $this->endSection() ?>