
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
              <h4 class="page-title">Proyectos de Investigación</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Proyectos de Investigación</a></li>
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
                    <h1 style="position:absolute;">Editar Proyecto</h1>
                    <a class="btn btn-primary float-end" href="/proyectosinvestigacion" style="width:100px;">Volver</a>
                </div>
                <div class="card-body p-3">            
                    <form action="https://repositorio2.itsup.edu.ec/proyectosinvestigacion/actualizar" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="Nombre">Nombre del Proyecto:</label>
                                <input type="text" name="Nombre" id="Nombre" class="form-control" value="<?php echo $this->proyectos->Nombre; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label" for="FechaInicio">Fecha Inicio de Vigencia:</label>
                                <input type="date" name="FechaInicio" id="FechaInicio" class="form-control" value="<?php echo $this->proyectos->FechaInicio; ?>" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="FechaFin">Fecha Fin de Vigencia:</label>
                                <input type="date" name="FechaFin" id="FechaFin" class="form-control" value="<?php echo $this->proyectos->FechaFin; ?>" required>
                            </div>                      
                        </div>  
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label" for="AutorDocente">Autor(es) Docente(s):</label>
                                <input type="text" name="AutorDocente" id="AutorDocente" class="form-control" value="<?php echo $this->proyectos->AutorDocente; ?>" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="AutorEstudiante">Autor(es) Estudiante(s):</label>
                                <input type="text" name="AutorEstudiante" id="AutorEstudiante" class="form-control" value="<?php echo $this->proyectos->AutorEstudiante; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="ArchivoPDF">Archivo PDF:</label>
                                <input type="file" name="ArchivoPDF" id="ArchivoPDF" class="form-control" accept="application/pdf" value="<?php echo $this->proyectos->ArchivoPDF; ?>" required>
                            </div>
                        </div>                      
                        <button type="submit" class="btn btn-success" value="Crear">Guardar</button>                    
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