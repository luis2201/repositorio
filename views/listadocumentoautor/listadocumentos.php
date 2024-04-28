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
              <h4 class="page-title">Listado de Documentos por Autores</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Consultas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Documentos del Autor
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
                    <h1 style="position:absolute;"><?php echo $this->autor->Apellido.' '.$this->autor->Nombre; ?></h1> 
                    <a class="btn btn-primary float-end" href="/listadocumentoautor" style="width:100px;">Volver</a>
                </div>
                <div class="card-body p-3 mt-4">
                  <table id="tbLista" class="table table-hover table-condensed table-collapsed" style="margin:auto;width:100%;">
                          <thead class="bg-primary">
                              <tr>
                                  <th class="text-center text-light">#</th>
                                  <th class="text-center text-light">Título</th>
                                  <th class="text-center text-light">FechaPublicación</th>
                                  <th class="text-center text-light">Categoría</th>
                                  <th class="text-center text-light">Materia</th>
                                  <th class="text-center text-light"></th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $i = 1; ?>
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                              <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $row['Titulo']; ?></td>
                                  <td class="text-center" style="width:10%"><?php echo $row['FechaPublicacion']; ?></td>
                                  <td><?php echo $row['Categoria']; ?></td>
                                  <td><?php echo $row['Materia']; ?></td>
                                  <td class="text-center">
                                      <a class="text-success" href="<?php echo DIR; ?>listadocumentoautor/ver/<?php echo $row['ArchivoPDF']; ?>" target="_blank"><i class="fas fa-book"></i></a>
                                  </td>
                              </tr>
                              <?php endwhile; ?>
                          </tbody>
                      </table>    
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
  