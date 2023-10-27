<?= $this->extend('template/navbar') ?>

<?= $this->section('content') ?>

<!-- main content-->

<div class="container pt-5 pb-3">
  
  <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Profil</h5>
                         <?php foreach ($utama as $u) : ?>
                        <h1 class="mb-0"><?= $u['judul_utama']; ?></h1>
                    </div>
                    <p><?= $u['konten_utama']; ?></p>
                </div>
                <div class="col-lg-7" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?php echo base_url(); ?>/img/<?= $u['foto']; ?>" style="object-fit: cover;">
                    </div>
                </div><?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<!-- .main content-->

<?= $this->endSection() ?>