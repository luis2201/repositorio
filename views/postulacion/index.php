<!DOCTYPE html>
<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo DIR; ?>assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>ITSUP - ITSUP | Sistema de Postulaciones</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo DIR; ?>assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo DIR; ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo DIR; ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo DIR; ?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo DIR; ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?php echo DIR; ?>assets/vendor/libs/apex-charts/apex-charts.css" />

    
    <!-- Helpers -->
    <script src="<?php echo DIR; ?>assets/vendor/js/helpers.js"></script>
    
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
      <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
      <script src="<?php echo DIR; ?>assets/js/config.js"></script>
      
      <!-- FontAwesome CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
      
      <!-- DataTable CSS -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css" rel="stylesheet">
      <!-- JQueryConfirm -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
      
      <!-- Page CSS -->
      <link rel="stylesheet" href="<?php echo DIR; ?>assets/css/style.css">      
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="row">        
      <div class="text-center">
        <h2 class="bg-primary text-light mb-5">ITSUP - Sistema de Registro de Postulaciones</h2>
      </div>
      <div class="card col-8" style="margin:auto;">                
          <div class="card-body">
            <div class="row">
              <div class="col-6 text-center">                      
                  <img src="assets/img/logo/logo_itsup_2022_redondo.png" alt="itsup-postulacion" style="width:25em">
              </div>
              <div class="col-6 ">

                <div class="row p-2 border-primary" style="margin-top:7em">
                  <a href=" postulacion/catedra" class="btn btn-outline-primary btn-lg">
                    Ayudantía de Cátedra
                  </a>                    
                </div>
                <div class="row p-2 border-primary mt-2">
                  <a href=" postulacion/investigacion" class="btn btn-outline-primary btn-lg">
                    Ayudantía de Investigación
                  </a>                    
                </div>

              </div>
            </div>
          </div>
      </div>

      <!-- Footer -->
      <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0" style="margin:auto">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>                  
                <a href="https://www.itsup.edu.ec" target="_blank" class="footer-link fw-bolder">ITSUP</a>. 
                Todos los derechos reservados
              </div>                
          </div>
      </footer>
      <!-- / Footer -->        
        
    </div>
    <!-- / Layout wrapper -->
    
    
    <!-- Core JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo DIR; ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo DIR; ?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo DIR; ?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo DIR; ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?php echo DIR; ?>assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo DIR; ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?php echo DIR; ?>assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?php echo DIR; ?>assets/js/dashboards-analytics.js"></script>
    <!-- DataTable JS -->    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"></script>
    <!-- MomentJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <!-- JQueryConfirm js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!-- Libs JS -->
    <script src="<?php echo DIR; ?>libs/main.js"></script>
  </body>
</html>
