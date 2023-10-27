 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <meta name="copyright" content="MACode ID, https://macodeid.com/">

   <link rel="shortcut icon" href="<?= base_url(); ?>/img/logo.jpeg" type="image/jpeg">
   <title> Mcloud</title>

   <link rel="stylesheet" href="<?= base_url() ?>/assets/web/css/maicons.css">

   <link rel="stylesheet" href="<?= base_url() ?>/assets/web/css/bootstrap.css">

   <link rel="stylesheet" href="<?= base_url() ?>/assets/web/vendor/animate/animate.css">

   <link rel="stylesheet" href="<?= base_url() ?>/assets/web/css/theme.css">

 </head>

 <body>

   <!-- Back to top button -->
   <div class="back-to-top"></div>

   <header>
     <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
       <div class="container">
         <?php foreach ($setting as $a) : ?>
           <img src="<?php echo base_url(); ?>/img/<?= $a['logo']; ?>" height="30px" alt="Image">
         <?php endforeach ?>

         <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>

         <div class="navbar-collapse collapse" id="navbarContent">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a class="nav-link" href="<?= base_url() ?>/home">Home</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="<?= base_url() ?>/about">About</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="<?= base_url() ?>/klien">Testimonial</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="<?= base_url() ?>/konten">Blog</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="<?= base_url() ?>/contact">Contact</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="<?= base_url() ?>/galeri">Galeri</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="<?= base_url() ?>/team">Team</a>
             </li>
             <!-- <li class="nav-item">
              <a class="btn btn-primary ml-lg-2" href="#">Free Analytics</a>
            </li> -->
           </ul>
         </div>

       </div>
     </nav>

     <?= $this->renderSection('content') ?>

     <footer class="page-footer bg-image" style="background-image: url(<?= base_url() ?>/assets/web/img/world_pattern.svg);">
       <div class="container">
         <div class="row mb-5">
           <div class="col-lg-4 py-4">
             <h3>Mcloud Simple Solution</h3>
             <p>Jasa pembuatan website di kawasan kota Madiun</p>
             <?php foreach ($setting as $u) : ?>
               <div class="social-media-button">
                 <a href="<?= $u['facebook']; ?>"><span class="mai-logo-facebook-f"></span></a>
                 <a href="<?= $u['instagram']; ?>"><span class="mai-logo-instagram"></span></a>
                 <a href="<?= $u['youtube']; ?>"><span class="mai-logo-youtube"></span></a>
               </div>
             <?php endforeach ?>
           </div>
           <?php foreach ($contact as $da) : ?>
             <div class="col-lg-4 py-4">
               <h5>Contact Us</h5>
               <p><?= $da['alamat_contact']; ?></p>
               <a href="#" class="footer-link"><?= $da['tlp_contact']; ?></a><br>
               <a href="#" class="footer-link"><?= $da['email_contact']; ?></a>
             </div><?php endforeach ?>
           <div class="col-lg-4 py-4">
             <h5>Company</h5>
             <ul class="footer-menu">
               <li><a href="<?= base_url() ?>/about">About Us</a></li>
               <li><a href="<?= base_url() ?>/galeri">Galeri</a></li>
               <!-- <li><a href="#">Advertise</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Help & Support</a></li> -->
             </ul>
           </div>

           <!-- <div class="col-lg-3 py-3">
          <h5>Newsletter</h5>
          <p>Get updates, news or events on your mail.</p>
          <form action="#">
            <input type="text" class="form-control" placeholder="Enter your email..">
            <button type="submit" class="btn btn-success btn-block mt-2">Subscribe</button>
          </form>
        </div>  -->
         </div>

         <p class="text-center" id="copyright">Copyright &copy; 2023. Mcloud Simple Solution</a></p>
       </div>
       <!-- Wa -->
       <?php foreach ($setting as $a) : ?>
         <div style="position:fixed;right:20px;bottom:20px;z-index:3;">
           <a href="https://api.whatsapp.com/send?phone=<?= $a['whatsapp']; ?>&text=<?= $a['greeting']; ?>%3F" target="_blank">
             <button style="background:#32C03C;vertical-align:center;height:36px;border-radius:5px;border:0;padding-bottom:5px;color:white;">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                 <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
               </svg> Whatsapp Kami</button></a>
         </div>
       <?php endforeach ?>
     </footer>

     <script src="<?= base_url() ?>/assets/web/js/jquery-3.5.1.min.js"></script>

     <script src="<?= base_url() ?>/assets/web/js/bootstrap.bundle.min.js"></script>

     <script src="<?= base_url() ?>/assets/web/ajs/google-maps.js"></script>

     <script src="<?= base_url() ?>/assets/web/vendor/wow/wow.min.js"></script>

     <script src="<?= base_url() ?>/assets/web/js/theme.js"></script>

 </body>

 </html>