 <?= $this->extend('template/template') ?>

<?= $this->section('content') ?>

 <div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/home">Home</a></li>
                <li class="breadcrumb-item active">About</li>
              </ul>
            </nav>
            <h1 class="text-center">About Us</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="page-section" id="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3 wow fadeInUp">
          <span class="subhead ">About us</span>
          <?php foreach ($utama as $u) : ?>
          <h2 class="title-section"><?= $u['judul_utama']; ?></h2>
          <div class="divider"></div>

          <h6><?= $u['konten_utama']; ?></h6>
        </div>
        <div class="col-lg-6 py-3 wow fadeInRight">
          <div class="img-fluid py-3 text-center">
            <img src="<?php echo base_url(); ?>/img/<?= $u['foto']; ?>"height="300px" alt="Image">
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->


  <?= $this->endSection() ?>