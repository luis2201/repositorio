
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
              <h4 class="page-title">Materia</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Materia</a></li>
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
                    <h1 style="position:absolute;">Editar Materia</h1>
                    <a class="btn btn-primary float-end" href="/materia" style="width:100px;">Volver</a>
                </div>
                <div class="card-body p-3">                            
                    <form action="https://repositorio.itsup.edu.ec/materia/actualizar" method="post" enctype="multipart/form-data" autocomplete="off">                        
                        <input type="hidden" name="MateriaID" value="<?php echo $this->materia->MateriaID; ?>">
                        <div class="row mt-3">
                            <div class="col-6 mb-3">
                                <label class="form-label" for="Nombre">Nombre de la Materia:</label>
                                <input type="text" name="Nombre" id="Nombre" class="form-control" value="<?php echo $this->materia->Nombre; ?>" required>
                            </div>                        
                            <div class="col-4 mb-3">
                                <label class="form-label" for="AreaID">Materia:</label>
                                <select name="AreaID" id="AreaID" class="form-select" required>
                                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>                                          
                                        <?php if($this->materia->AreaID == $row['AreaID']){ ?>
                                            <option value="<?php echo encryptID($row['AreaID']); ?>" selected = "true"><?php echo $row['Nombre']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo encryptID($row['AreaID']); ?>"><?php echo $row['Nombre']; ?></option>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-2 mb-3">
                                <button type="submit" class="btn btn-success" value="Crear" style="margin-top: 25px;width:100%">Guardar</button>                    
                            </div>
                        </div>                        
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