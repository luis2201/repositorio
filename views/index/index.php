<!-- views/index/index.php -->
<!-- Header -->
<?php include_once "views/layout/header.php"; ?>
<!-- / Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center" style="height: 100% !Important;">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center">          
          <p data-aos="fade-up" data-aos-delay="100">El Repositorio Digital ITSUP es un espacio innovador diseñado para el almacenamiento, 
            preservación y acceso de documentos digitales de diversa índole que son resultado de la investigación, el aprendizaje y la enseñanza.
            Nuestro Repositorio Digital  no solo contribuye al avance y la difusión del conocimiento, 
            sino que también facilita la colaboración y la interconexión entre investigadores y instituciones de todo el mundo.
          </p>
          
          <form id="form" action="https://repositorio.itsup.edu.ec/documento/search" class="form-search d-flex align-items-stretch mb-3" method="post" enctype="multipart/form-data" autocomplete="off" data-aos="fade-up" data-aos-delay="200">
            <input type="text" id="txtBuscar" name="txtBuscar" class="form-control" placeholder="Palabra o texto para realizar una búsqueda de documento">
            <button type="submit" class="btn btn-primary">Buscar</button>
          </form>

          <form id="form" action="https://repositorio.itsup.edu.ec/proyectosinvestigacion/search" class="form-search d-flex align-items-stretch mb-3" method="post" enctype="multipart/form-data" autocomplete="off" data-aos="fade-up" data-aos-delay="200">
            <input type="text" id="txtBuscarIvestigacion" name="txtBuscarIvestigacion" class="form-control" placeholder="Palabra o texto para realizar una búsqueda de proyectos de Investigación">
            <button type="submit" class="btn btn-primary">Buscar</button>
          </form>

          <form id="form" action="https://repositorio.itsup.edu.ec/proyectosvinculacion/search" class="form-search d-flex align-items-stretch mb-3" method="post" enctype="multipart/form-data" autocomplete="off" data-aos="fade-up" data-aos-delay="200">
            <input type="text" id="txtBuscarVinculacion" name="txtBuscarVinculacion" class="form-control" placeholder="Palabra o texto para realizar una búsqueda de proyectos de Vinculación">
            <button type="submit" class="btn btn-primary">Buscar</button>
          </form>

          <form id="form" action="https://repositorio.itsup.edu.ec/patentes/search" class="form-search d-flex align-items-stretch mb-3" method="post" enctype="multipart/form-data" autocomplete="off" data-aos="fade-up" data-aos-delay="200">
            <input type="text" id="txtBuscarPatentes" name="txtBuscarPatentes" class="form-control" placeholder="Palabra o texto para realizar una búsqueda de patentes">
            <button type="submit" class="btn btn-primary">Buscar</button>
          </form>

          <?php if(isset($_SESSION['mensaje'])): ?>
            <?php echo $_SESSION['mensaje']; ?>
            <?php unset($_SESSION['mensaje']); ?>
          <?php endif; ?>

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">
            <?php //while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <!-- <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="<?php echo $row['CantidadDocumentos']; ?>" data-purecounter-duration="1" class="purecounter"></span>
                <p><?php echo $row['NombreCategoria']; ?></p>
              </div>
            </div> -->
            <?php //endwhile; ?>            

          </div>
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out" style="width:25em;">
          <img src="assets/img/hero-img.svg" class="img-fluid mb-lg-0" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->
    
  <main id="main" class="mt-6">
    <div class="col-6" style="margin:auto;height:50px;">
      
      </div>
    </div>
    
  </main><!-- End #main -->
  <!-- / Content -->

<!-- Footer -->
<?php include_once "views/layout/footer.php"; ?>
<!-- / Footer -->