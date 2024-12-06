<!-- views/home/index.php -->

<!-- Header -->
<?php include_once "views/layout/headeradmin.php"; ?>
<!-- / Header -->
  <!-- Menu -->
  <?php include_once "views/layout/asideadmin.php"; ?>
  <!-- / Menu -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">        
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-view-dashboard"></i>
                  </h1>
                  <h6><a href="home" class="text-white">Dashboard</a></h6>
                </div>
              </div>
            </div> -->
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-4 col-xlg-3">              
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-chart-areaspline"></i>
                  </h1>
                  <h6><a href="estadisticas" class="text-white">Estadísticas</a></h6>
                </div>                
              </div>
            </div> -->
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-collage"></i>
                  </h1>
                  <h6 class="text-white">Widgets</h6>
                </div>
              </div>
            </div> -->
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-border-outside"></i>
                  </h1>
                  <h6 class="text-white">Tables</h6>
                </div>
              </div>
            </div> -->
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-arrow-all"></i>
                  </h1>
                  <h6 class="text-white">Full Width</h6>
                </div>
              </div>
            </div> -->
            <!-- Column -->
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-receipt"></i>
                  </h1>
                  <h6 class="text-white">Forms</h6>
                </div>
              </div>
            </div> -->
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-relative-scale"></i>
                  </h1>
                  <h6 class="text-white">Buttons</h6>
                </div>
              </div>
            </div> -->
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-pencil"></i>
                  </h1>
                  <h6 class="text-white">Elements</h6>
                </div>
              </div>
            </div> -->
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-calendar-check"></i>
                  </h1>
                  <h6 class="text-white">Calnedar</h6>
                </div>
              </div>
            </div> -->
            <!-- Column -->
            <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-alert"></i>
                  </h1>
                  <h6 class="text-white">Errors</h6>
                </div>
              </div>
            </div> -->
            <!-- Column -->
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Número de Visitas</h4>
                      <h5 class="card-subtitle">Visitas en los últimos 12 meses</h5>
                    </div>
                  </div>
                  <div class="row">
                    <!-- column -->
                    <div class="col-lg-9">
                      <!-- Gráfico últimos 12 meses -->
                      <div>
                        <canvas id="chart12meses">

                        </canvas>
                      </div>
                      <!-- Gráfico últimos 12 meses -->
                    </div>
                    <div class="col-lg-3">
                      <div class="row">
                      <?php while ($row = $tvtesis->fetch(PDO::FETCH_ASSOC)): ?>
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-book-open-page-variant fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $row['Total']; ?></h5>
                            <small class="font-light">Total Visitas<br>Tesis</small>
                          </div>
                        </div>
                      <?php endwhile; ?>
                      <?php while ($row = $tvlibros->fetch(PDO::FETCH_ASSOC)): ?>
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-file-document fs-3 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $row['Total']; ?></h5>
                            <small class="font-light">Total Visitas Libros</small>
                          </div>
                        </div>
                      <?php endwhile; ?>
                      <?php while ($row = $areamasv->fetch(PDO::FETCH_ASSOC)): ?>
                        <div class="col-12 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <h6><?php echo $row['Area']; ?></h6>
                            <h5 class="mb-0 mt-1"><?php echo $row['Total']; ?></h5>
                            <small class="font-light">Área más visitada</small>
                          </div>
                        </div>
                      <?php endwhile; ?>
                      <?php while ($row = $areamenosv->fetch(PDO::FETCH_ASSOC)): ?>
                        <div class="col-12 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <h6><?php echo $row['Area']; ?></h6>
                            <h5 class="mb-0 mt-1"><?php echo $row['Total']; ?></h5>
                            <small class="font-light">Área más visitada</small>
                          </div>
                        </div>
                      <?php endwhile; ?>
                      </div>
                    </div>
                    <!-- column -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        
    <!-- Menu -->
    <?php include_once "views/layout/footeradmin.php"; ?>
    <!-- / Menu -->     