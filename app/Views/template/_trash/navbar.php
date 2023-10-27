<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
     <link rel="shortcut icon" href="<?= base_url(); ?>/img/logo.jpeg" type="image/jpeg">
    <title> Mcloud</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url() ?>/assets/mcloud/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/mcloud/lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>/assets/mcloud/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url() ?>/assets/mcloud/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@example.com</small>
                </div>
            </div>
            <?php foreach ($setting as $a) : ?>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?= $a['facebook']; ?>"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?= $a['instagram']; ?>"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="<?= $a['youtube']; ?>"><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        
           
                <?php foreach ($setting as $a) : ?>   
                    <img src="<?php echo base_url(); ?>/img/<?= $a['logo']; ?>" height="30px" alt="Image">
                <?php endforeach ?>
      
           
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="<?= base_url() ?>/home" class="nav-item nav-link">Home</a>
                    <a href="<?= base_url() ?>/lembaga" class="nav-item nav-link">Profil</a>
                    <a href="<?= base_url() ?>/klien" class="nav-item nav-link">Klien</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Konten</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="detail.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <a href="service.html" class="nav-item nav-link">Gallery</a>
                     <a href="service.html" class="nav-item nav-link">Team</a>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                
            </div>
        </nav>
    </div>
    <!-- Navbar & Carousel End -->

       <?= $this->renderSection('content') ?>

        <!-- Footer Start -->
   
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container">
           
                
                    
                       <center> <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Mcloud Simple Solution</a>. All Rights Reserved 2023</p></center>
                   
                
         
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/mcloud/lib/wow/wow.min.js"></script>
    <script src="<?= base_url() ?>/assets/mcloud/lib/easing/easing.min.js"></script>
    <script src="<?= base_url() ?>/assets/mcloud/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url() ?>/assets/mcloud/lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url() ?>/assets/mcloud/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url() ?>/assets/mcloud/js/main.js"></script>
</body>

</html>