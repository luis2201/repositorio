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
              <h4 class="page-title">Estadisticas</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Estadísticas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Estadísticas de Visitas
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
                    <h1 style="position:absolute;">Estadísticas de Visitas a Libros</h1> 
                </div>
                <div class="card-body p-3 mt-4">
                  <table id="tbLista" class="table table-hover table-condensed table-collapsed" style="margin:auto;width:100%;">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-center text-light">#</th>
                            <th class="text-center text-light">Título</th>
                            <th class="text-center text-light">Materia</th>
                            <th class="text-center text-light">Area</th>
                            <th class="text-center text-light">Visitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo $row['Titulo']; ?></td>
                            <td><?php echo $row['Materia']; ?></td>
                            <td><?php echo $row['Area']; ?></td>
                            <td class="text-center"><?php echo $row['Visitas']; ?></td>
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
  