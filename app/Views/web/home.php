<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>
      <div class="page-banner home-banner">
           <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 py-3 wow fadeInLeft">
             <?php foreach ($setting as $a) : ?>
            <h1 class="mb-4"><?= $a['judul_setting']; ?></h1>
            <p class="text-lg text-grey mb-5"><?= $a['slogan']; ?></p>
            <!-- <a href="#" class="btn btn-primary btn-split">Watch Video <div class="fab"><span class="mai-play"></span></div></a> -->
          </div><?php endforeach ?>
          <div class="col-md-6 py-5 wow zoomIn">
            <div class="img-fluid text-center">
              <img src="<?= base_url() ?>/assets/web/img/banner_image_1.svg" alt="">
            </div>
          </div>
        </div>
        <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
      </div>
      </div>
    </div>
  </header>
  <div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card-service wow fadeInUp">
            <div class="header">
              <img src="<?= base_url() ?>/assets/web/img/services/service-1.svg" alt="">
            </div>
            <div class="body">
              <h5 class="text-secondary">SEO Consultancy</h5>
              <p>We help you define your SEO objective & develop a realistic strategy with you</p>
              <!-- <a href="service.html" class="btn btn-primary">Read More</a> -->
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-service wow fadeInUp">
            <div class="header">
              <img src="<?= base_url() ?>/assets/web/img/services/service-2.svg" alt="">
            </div>
            <div class="body">
              <h5 class="text-secondary">Content Marketing</h5>
              <p>We help you define your SEO objective & develop a realistic strategy with you</p>
              <!-- <a href="service.html" class="btn btn-primary">Read More</a> -->
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-service wow fadeInUp">
            <div class="header">
              <img src="<?= base_url() ?>/assets/web/img/services/service-3.svg" alt="">
            </div>
            <div class="body">
              <h5 class="text-secondary">Keyword Research</h5>
              <p>We help you define your SEO objective & develop a realistic strategy with you</p>
              <!-- <a href="service.html" class="btn btn-primary">Read More</a> -->
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->


  <div class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3 wow fadeInUp">
          <span class="subhead text-white">About us</span>
          <?php foreach ($utama as $u) : ?>
          <h2 class="title-section text-light"><?= $u['judul_utama']; ?></h2>
          <div class="divider"></div>

          <h6 class="text-white"><?= $u['konten_utama']; ?></h6>
          <a href="<?= base_url() ?>/about" class="btn btn-info mt-3">Read More</a>
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


  <div class="page-section bg-light">
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

    <div class="page-section banner-info">
    <div class="wrap bg-image" style="background-image: url(<?= base_url() ?>/assets/web/img/bg_pattern.svg);">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead text-white">Team Members</div>
        <h2 class="title-section">Professional Stuffs Ready to Help Your Business</h2>
        <div class="divider mx-auto"></div>
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

  <!-- Banner info -->
  <!-- <div class="page-section banner-info">
    <div class="wrap bg-image" style="background-image: url(<?= base_url() ?>/assets/web/img/bg_pattern.svg);">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 pr-lg-5 wow fadeInUp">
            <h2 class="title-section">SEO to Improve Brand <br> Visibility</h2>
            <div class="divider"></div>
            <p>We're an experienced and talented team of passionate consultants who breathe with search engine marketing.</p>
            
            <ul class="theme-list theme-list-light text-white">
              <li>
                <div class="h5">SEO Content Strategy</div>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
              </li>
              <li>
                <div class="h5">B2B SEO</div>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
            <div class="img-fluid text-center">
              <img src="../assets/img/banner_image_2.svg" alt="">
            </div>
          </div>
        </div>
      </div> -->
   <!-- </div>  .wrap -->
 <!-- </div>  .page-section -->

  <!-- Blog -->
  <div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead">Our Blog</div>
        <h2 class="title-section">Read Latest News</h2>
        <div class="divider mx-auto"></div>
      </div>
    <?php foreach ($konten as $da) : ?> 
      <div class="row mt-5">
        <div class="col-lg-4 py-3 wow fadeInUp">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="<?php echo base_url(); ?>/img/<?= $da['foto_konten']; ?>" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="<?= base_url(); ?>/view/<?= $da['id_konten']; ?>"><?= $da['judul_konten']; ?></a></h5>
              <div class="post-date">Posted on <a href="#"><?= $da['tgl_konten']; ?></a></div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
        
        <div class="col-12 mt-4 text-center wow fadeInUp">
          <a href="<?= base_url() ?>/konten" class="btn btn-primary">View More</a>
        </div>
      </div>
    </div>
  </div>
        
   <!-- Full Screen Search Start -->
    <!-- <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Full Screen Search End -->


    <!-- Facts Start -->
   
    <!-- Facts Start -->


    



    
    <?= $this->endSection() ?>
    

   