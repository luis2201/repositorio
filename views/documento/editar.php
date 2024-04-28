
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
              <h4 class="page-title">Documentos</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Documentos</a></li>
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
                    <h1 style="position:absolute;">Registrar Documento</h1>
                    <a class="btn btn-primary float-end" href="/documento" style="width:100px;">Volver</a>
                </div>
                <div class="card-body p-3">                            
                    <form action="https://repositorio.itsup.edu.ec/documento/actualizar" method="post" enctype="multipart/form-data" autocomplete="off">                        
                        <input type="hidden" name="DocumentoID" value="<?php echo $this->documento->DocumentoID; ?>">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="Titulo">Título del Documento:</label>
                                <input type="text" name="Titulo" id="Titulo" class="form-control" value="<?php echo $this->documento->Titulo; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="Resumen">Resumen:</label>
                                <textarea name="Resumen" id="Resumen" class="form-control" rows="3" cols="50" required><?php echo $this->documento->Resumen; ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label" for="CategoriaID">Categoría:</label>
                                <select name="CategoriaID" id="CategoriaID" class="form-select" required>
                                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>                                        
                                        <?php if($this->documento->CategoriaID == $row['CategoriaID']){ ?>
                                            <option value="<?php echo encryptID($row['CategoriaID']); ?>" selected = "true"><?php echo $row['Nombre']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo encryptID($row['CategoriaID']); ?>"><?php echo $row['Nombre']; ?></option>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="MateriaID">Categoría:</label>
                                <select name="MateriaID" id="MateriaID" class="form-select" required>
                                    <?php while ($row = $materias->fetch(PDO::FETCH_ASSOC)): ?>                                        
                                        <?php if($this->documento->MateriaID == $row['MateriaID']){ ?>
                                            <option value="<?php echo encryptID($row['MateriaID']); ?>" selected = "true"><?php echo $row['Nombre']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo encryptID($row['MateriaID']); ?>"><?php echo $row['Nombre']; ?></option>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label" for="FechaPublicacion">Fecha de Publicación:</label>
                                <input type="date" name="FechaPublicacion" id="FechaPublicacion" class="form-control" value="<?php echo $this->documento->FechaPublicacion; ?>" required>
                            </div>
                            <div class="col-6 mb-3">
                                <input type="hidden" id="PDF" name="PDF" value="<?php echo $this->documento->ArchivoPDF ?>">
                                <label class="form-label" for="ArchivoPDF">Archivo PDF:</label>
                                <input type="file" name="ArchivoPDF" id="ArchivoPDF" class="form-control" accept="application/pdf" value="<?php echo $this->documento->ArchivoPDF ?>">
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