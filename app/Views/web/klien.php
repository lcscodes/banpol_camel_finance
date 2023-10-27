<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>

<div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/home">Home</a></li>
                <li class="breadcrumb-item active">Testimonial</li>
              </ul>
            </nav>
            <h1 class="text-center">Testimonial</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

<!-- main content-->
<div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead">Testimonial</div>
        <h2 class="title-section">What Our Clients Say About Our Digital Services</h2>
        <div class="divider mx-auto"></div>
      </div>
           
        <div class="row">
            <?php foreach ($klien as $u) : ?> 
          <div class="col-sm-6 col-lg-4 col-xl-3 py-3 wow zoomIn">
            <div class="features">
              <img class="img-fluid rounded" src="<?php echo base_url(); ?>/img/<?= $u['foto_klien']; ?>" style="width: 60px; height: 60px;" >
              <h5><?= $u['nama_klien']; ?></h5>
              <p><?= $u['dari_klien']; ?></p>
              <h6>"<?= $u['isi_klien']; ?>"</h6>
            </div>
          </div>
           <?php endforeach ?>
        </div>

    </div> <!-- .container -->
  </div> <!-- .page-section -->
<?= $this->endSection() ?>