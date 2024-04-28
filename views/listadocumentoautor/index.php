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
              <h4 class="page-title">Consultas</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Consultas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Lista de Documentos por Autor
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
                    <h1 style="position:absolute;">Listado de Documentos por Autores</h1> 
                </div>
                <div class="card-body p-3 mt-4">
                  <table id="tbLista" class="table table-hover table-condensed table-collapsed" style="margin:auto;width:100%;">
                          <thead class="bg-primary">
                              <tr>
                                  <th class="text-center text-light">#</th>
                                  <th class="text-center text-light">Nombres</th>
                                  <th class="text-center text-light">Apellidos</th>
                                  <th class="text-center text-light">Afiliación</th>
                                  <th class="text-center text-light"></th>
                              </tr>
                          </thead>
                          <tbody>
                              <?PHP $i = 1; ?>
                              <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                              <tr>
                                  <td class="text-center"><?php echo $i++; ?></td>
                                  <td><?php echo $row['Nombre']; ?></td>
                                  <td><?php echo $row['Apellido']; ?></td>
                                  <td><?php echo $row['Afiliacion']; ?></td>
                                  <td class="text-center">
                                      <a class="text-success" href="listadocumentoautor/leerDocumentoIDAutor/<?php echo $row['AutorID']; ?>"><i class="fas fa-search"></i></a>
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
  