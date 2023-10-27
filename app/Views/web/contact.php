<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>
<div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/home">Home</a></li>
                <li class="breadcrumb-item active">Contact</li>
              </ul>
            </nav>
            <h1 class="text-center">Contact</h1>
          </div>
        </div>
      </div>
    </div>
  </header>
<div class="page-section">
    <div class="container">
      <div class="row text-center align-items-center">
        <?php foreach ($contact as $u) : ?>
        <div class="col-lg-4 py-3">
          <div class="display-4 text-center text-primary"><span class="mai-pin"></span></div>
          <p class="mb-3 font-weight-medium text-lg">Address</p>
          <p class="mb-0 text-secondary"> <?= $u['alamat_contact']; ?></p>
        </div>
        <div class="col-lg-4 py-3">
          <div class="display-4 text-center text-primary"><span class="mai-call"></span></div>
          <p class="mb-3 font-weight-medium text-lg">Phone</p>
          <p class="mb-0"><a href="#" class="text-secondary"> <?= $u['tlp_contact']; ?></a></p>
        </div>  
        <div class="col-lg-4 py-3">
          <div class="display-4 text-center text-primary"><span class="mai-mail"></span></div>
          <p class="mb-3 font-weight-medium text-lg">Email Address</p>
          <p class="mb-0"><a href="#" class="text-secondary"> <?= $u['email_contact']; ?></a></p>
        </div>
      </div>
    </div>
<?php endforeach ?>
    
  </div>

<!-- main content-->



  <div class="container pt-5 pb-3">
    <div class="row">
      <div class="col-md-12">
       
      </div>
    </div>
  </div>
  <!-- .main content-->

<?= $this->endSection() ?>