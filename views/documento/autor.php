
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
                    <h1 style="position:absolute;">Registrar Autor a Documento</h1>
                    <a class="btn btn-primary float-end" href="/documento" style="width:100px;">Volver</a>
                </div>
                <div class="card-body p-3">                                        
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label" for="Titulo">Título del Documento:</label>
                            <input type="text" name="Titulo" id="Titulo" class="form-control" value="<?php echo $this->documento->Titulo; ?>" disabled>
                        </div>
                    </div>
                    <?php if(isset($_SESSION['mensaje'])): ?>
                        <?php echo $_SESSION['mensaje']; ?>
                        <?php unset($_SESSION['mensaje']); ?>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-6">
                            <table id="tbLista1" class="table table-hover table-condensed table-collapsed" style="margin:auto;width:100%;">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-center text-light">#</th>
                                        <th class="text-center text-light">Autor</th>
                                        <th class="text-center text-light"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 1;
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): 
                                    ?>
                                        <tr>
                                            <td style="width:2%"><?php echo $i++; ?></td>
                                            <td><?php echo $row['Nombre'].' '.$row['Apellido']; ?></td>                                            
                                            <td class="text-center" style="width:20%">                                                                                                    
                                                <a type class="text-primary" href="<?php echo DIR; ?>documentoautor/crear/<?php echo $this->documento->DocumentoID.'/'.$row['AutorID']; ?>">Agregar</a>                                            
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>                        
                        <div class="col-6">
                            <table id="tbLista2" class="table table-hover table-condensed table-collapsed" style="margin:auto;width:100%;">
                                <thead class="bg-success">
                                    <tr>
                                        <th class="text-center text-light">#</th>
                                        <th class="text-center text-light">Autor</th>
                                        <th class="text-center text-light"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 1;
                                        while ($row = $stmtDA->fetch(PDO::FETCH_ASSOC)):                                             
                                    ?>
                                        <tr>
                                            <td style="width:2%"><?php echo $i++; ?></td>
                                            <td><?php echo $row['NombreAutor']; ?></td>                                            
                                            <td class="text-center" style="width:20%">                                                                                                                                                
                                                <a class="text-danger" href="<?php echo DIR; ?>documentoautor/eliminar/<?php echo $this->documento->DocumentoID.'/'.$row['DocumentoAutoresID']; ?>">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div>                
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