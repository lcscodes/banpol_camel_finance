<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?= base_url(); ?>/assets/asset/assets/img/camel-logo.png" type="image/jpeg">
  <title>Camel Finance</title>
  <link href="<?= base_url(); ?>/mcloud/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="<?= base_url(); ?>/mcloud/css/style.css" rel="stylesheet">

  <!-- style datatable -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <!-- style datepicker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css" />
  <!-- script jquery -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>

<body>

  <div class="wrapper">
    <div class="sidebar border-end bg-white">
      <div class="d-flex flex-column flex-shrink-0 bg-white sidebar-content">
        <a href="#" class="d-flex align-items-center p-3 border-bottom mb-3 mb-md-0 link-dark text-decoration-none">
          <img src="<?= base_url(); ?>/img/camel-logo.png" alt="" width="32" height="32" class="d-inline-block align-text-bottom">
          <span class="fs-4 ps-2">Camel Finance</span>
        </a>

        <ul class="nav nav-pills flex-column mb-auto">

          <li>
            <a href="<?= base_url(); ?>/dashboard" class="nav-link link-dark border-bottom">
              <i class='bx bxs-dashboard'></i>
              Dashboard
            </a>
          </li>
          <!--<li>-->
          <!--  <a href="<?= base_url(); ?>/user" class="nav-link link-dark border-bottom">-->
          <!--    <i class='bx bx-user'></i>-->
          <!--    User-->
          <!--  </a>-->
          <!--</li>-->
          <li>
            <a href="<?= base_url(); ?>/belanja" class="nav-link link-dark border-bottom">
              <i class='bx bx-file'></i>
              Belanja
            </a>
          </li>
          <li>
            <a href="<?= base_url(); ?>/pendapatan" class="nav-link link-dark border-bottom">
              <i class='bx bx-file'></i>
              Pendapatan
            </a>
          </li>
          <li>
            <a href="<?= base_url(); ?>/laporan" class="nav-link link-dark border-bottom">
              <i class='bx bx-file'></i>
              Laporan
            </a>
          </li>
          <li>
            <a href="<?= base_url(); ?>/setting" class="nav-link link-dark border-bottom">
              <i class='bx bx-file'></i>
              Setting
            </a>
          </li>

        </ul>

      </div>
    </div> <!-- .sidebar -->
    <div class="main-navbar">
      <nav class="navbar navbar-light bg-white border-bottom">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <i class='bx bx-menu btn-sidebar'></i>
          </a>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle me-2" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?= base_url(); ?>/mcloud/img/user-circle-solid-108.png" alt="" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser2">
              <li><span class="ms-3 fw-bold"><?= session()->get('nama'); ?></span></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="<?= base_url(); ?>/logout">Sign out</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div> <!-- .main -->

    <?= $this->renderSection('content') ?>

    <script src="<?= base_url(); ?>/mcloud/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/mcloud/js/scripts.js" type="text/javascript"></script>


    <!-- script datatable -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <!-- script datepicker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {

        // initialising datatable
        $('#datatable').DataTable();
        // initialising datepicker
        $(".datepicker").datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          autoclose: true,
          language: "id",
          locale: "id",
        });

      });
    </script>

</body>

</html>