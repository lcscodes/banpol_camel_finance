<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>

<div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/home">Home</a></li>
                <li class="breadcrumb-item active">Team</li>
              </ul>
            </nav>
            <h1 class="text-center">Team</h1>
          </div>
        </div>
      </div>
    </div>
  </header>


<div class="page-section banner-info">
    <div class="wrap bg-image" style="background-image: url(<?= base_url() ?>/assets/web/img/bg_pattern.svg);">
    <div class="container">
      <div class="text-center wow fadeInUp">
      </div>
      
      <div class="row mt-5">
         <?php foreach ($team as $u) : ?> 
        <div class="col-lg-4 py-3 wow zoomIn">
          <div class="card-pricing">
            <div class="header">
                <img class="img-fluid w-100" src="<?php echo base_url(); ?>/img/<?= $u['foto_team']; ?>" alt="">           
            </div>
            <div class="body">
              <div class="price">
                <h4><span class="suffix"><?= $u['nama_team']; ?></span></h4>
              </div>
              <h6><?= $u['jabatan_team']; ?></h6>
            </div>
            <!-- <div class="footer">
              <a href="#" class="btn btn-pricing btn-block">Subscribe</a>
            </div> -->
          </div>
        </div>
        <?php endforeach ?>

      </div>

      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->
<?= $this->endSection() ?>