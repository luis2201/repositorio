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
                    <h1 style="position:absolute;">Listado de Materias</h1>
                    <a class="btn btn-primary float-end" href="materia/crear" style="width:200px;">Crear Nueva Materia</a>   
                </div>
                <div class="card-body p-3">
                    <?php if(isset($_SESSION['mensaje'])): ?>
                        <?php echo $_SESSION['mensaje']; ?>
                        <?php unset($_SESSION['mensaje']); ?>
                    <?php endif; ?>
                    <table id="tbLista" class="table table-hover table-condensed table-collapsed" style="margin:auto;width:90%;">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-center text-light">MateriaID</th>
                                <th class="text-center text-light">Nombre</th>
                                <th class="text-center text-light">Área</th>
                                <th class="text-center text-light">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td class="text-center"><?php echo $row['MateriaID']; ?></td>
                                <td><?php echo $row['Nombre']; ?></td>
                                <td><?php echo $row['NombreArea']; ?></td>
                                <td class="text-center">
                                    <a class="text-success" href="materia/editar/<?php echo $row['MateriaID']; ?>">Editar</a>
                                    <a class="text-danger" href="materia/eliminar/<?php echo $row['MateriaID']; ?>');">Eliminar</a>
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