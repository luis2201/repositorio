<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ITSUP | Repositorio Digital</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo DIR; ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo DIR; ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="<?php echo DIR; ?>https://fonts.googleapis.com">
  <link rel="preconnect" href="<?php echo DIR; ?>https://fonts.gstatic.com" crossorigin>
  <link href="<?php echo DIR; ?>https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo DIR; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo DIR; ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo DIR; ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo DIR; ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo DIR; ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo DIR; ?>assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Jquery Confirm CSS -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

  <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

  <!-- Template Main CSS File -->
  <link href="<?php echo DIR; ?>assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Logis
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center" style="background-color:#5F5F5F; border-bottom: 2px solid #F46C4A">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?php echo DIR; ?>assets/logo/logo_itsup.png" alt="">
        <h1> Repositorio Digital ITSUP </h1>
        <img src="<?php echo DIR; ?>assets/logo/logo_eco_itsup.png" alt="">
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main">
    <div class="col-4" style="margin:auto;">
      <form action="https://repositorio2.itsup.edu.ec/login/validar" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="card mt-3 mb-3">
            <div class="card-header">
                <h4>Inicio de Sesión</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-info">
                            Bienvenido al sistema Repositorios. Ingrese su Correo Electrónico y su contraseña para iniciar sesión.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" id="Email" name="Email" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="email">Contraseña</label>
                        <input type="password" id="Contrasena" name="Contrasena" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" style="width:100%">Ingresar</button>
                    </div>
                </div>
            </div>
        </div>
      </form>
      <div class="row mt-3 mb-3" style="height:50px">
        <div class="col">            
            <?php if(isset($_SESSION['mensaje'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['mensaje']; ?>
                    <?php unset($_SESSION['mensaje']); ?>
                </div>
            <?php endif; ?>
        </div>  
      </div>
    </div>
  </main><!-- End #main -->
  <!-- / Content -->

<!-- Footer -->
<?php include_once "views/layout/footer.php"; ?>
<!-- / Footer -->