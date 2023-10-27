<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>
<div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/home">Home</a></li>
                <li class="breadcrumb-item active">Galeri</li>
              </ul>
            </nav>
            <h1 class="text-center">Galeri</h1>
          </div>
        </div>
      </div>
    </div>
  </header>
<!-- main content-->
<div class="container pt-3 text-center">
  
  <div class="row pt-3 pb-5">
    <?php foreach ($galeri as $u) : ?>
      <div class="col-md-4 pb-4">
        <div class="thumbnail">
          <a href="<?php echo base_url(); ?>/img/<?= $u['foto_galeri']; ?>" target="_blank">
            <img src="<?php echo base_url(); ?>/img/<?= $u['foto_galeri']; ?>" alt="Lights" style="width:100%">
          </a>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>
<!-- .main content-->

<?= $this->endSection() ?>