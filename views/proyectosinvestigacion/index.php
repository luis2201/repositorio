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
              <h4 class="page-title">Proyectos</h4>
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
                    <h1 style="position:absolute;">Listado de Proyectos de Investigación</h1>
                    <a class="btn btn-primary float-end" href="proyectosinvestigacion/crear" style="width:250px;">Nuevo Proyecto</a>  
                </div>
                <div class="card-body p-3">
                    <?php if(isset($_SESSION['mensaje'])): ?>
                        <?php echo $_SESSION['mensaje']; ?>
                        <?php unset($_SESSION['mensaje']); ?>
                    <?php endif; ?>
                    <table id="tbLista" class="table table-hover table-condensed table-collapsed" style="margin:auto;width:100%;">
                        <thead class="bg-primary">
                            <tr>
                              <th>#</th>
                              <th class="text-center text-light">Número Documento</th>
                              <th class="text-center text-light">Nombre del Proyecto</th>
                              <th class="text-center text-light">Inicio Vigencia</th>                                                        
                              <th class="text-center text-light">Fin Vigencia</th>                                                        
                              <th class="text-center text-light">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td class="text-center" style="width:15%">
                                  <?php 
                                    $file = explode('.', $row['ArchivoPDF']); 
                                    echo $file[0];
                                  ?>
                                </td>
                                <td class="text-center" style="width:15%"><?php echo $row['Nombre']; ?></td>
                                <td class="text-center" style="width:15%"><?php echo $row['FechaInicio']; ?></td>
                                <td class="text-center" style="width:15%"><?php echo $row['FechaFin']; ?></td>
                                <td class="text-center" style="width:20%">
                                    <a class="text-primary" href="proyectosinvestigacion/ver/<?php echo $row['ArchivoPDF']; ?>" target="_blank">Ver</a>
                                    <a class="text-warning" href="proyectosinvestigacion/editar/<?php echo $row['ProyectoID']; ?>">Editar</a>
                                    <a class="text-danger" href="proyectosinvestigacion/eliminar/<?php echo $row['ArchivoPDF']; ?>">Eliminar</a>
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
  