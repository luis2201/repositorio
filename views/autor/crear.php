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
              <h4 class="page-title">Autor</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Autor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Registrar
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
        
        <div class="row p-3">

            <div class="card">
                <div class="card-header">
                    <h1 style="position:absolute;">Registrar Autor</h1>
                    <a class="btn btn-primary float-end" href="/autor" style="width:100px;">Volver</a>
                </div>
                <div class="card-body p-3">
                    <form action="https://repositorio.itsup.edu.ec/autor/almacenar" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="mb-3">
                            <label class="form-label" for="Nombre">Nombres:</label>
                            <input type="text" name="Nombre" id="Nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="Apellido">Apellidos:</label>
                            <input type="text" name="Apellido" id="Apellido" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="Afiliacion">Afiliación:</label>
                            <input type="text" name="Afiliacion" id="Afiliacion" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary" value="Crear">Guardar</button>
                    </form>                            
                </div>
                <?php if(isset($_SESSION['mensaje'])): ?>
                    <?php echo $_SESSION['mensaje']; ?>
                    <?php unset($_SESSION['mensaje']); ?>
                <?php endif; ?>
            </div>        

        </div>
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Menu -->
  <?php include_once "views/layout/footeradmin.php"; ?>
  <!-- / Menu -->