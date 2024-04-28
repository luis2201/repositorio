<!-- views/index/index.php -->
<!-- Header -->
<?php include_once "views/layout/header.php"; ?>
<!-- / Header -->
    
  <main id="main">

    <div class="col-8" style="margin:auto;">
        <div class="p-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Resultados de la Búsqueda: 
                        <?php 
                            $i = 0;
                            while ($num = $stnt->fetch(PDO::FETCH_ASSOC)): 
                                $i = $i+1;
                            endwhile;
                            echo $i . ' Archivo (s) econtrado (s)';
                        ?>
                    </h5>   
                </div>
                <div class="card-body p-3">
                    <table id="tbLista" class="table table-hover table-condensed table-collapsed" style="margin:auto;width:100%;">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-center">No. Documento</th>
                                <th class="text-center">Titulo</th>
                                <th class="text-center">F. Publicación</th>  
                                <th class="text-center">Ver</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td class="text-center" style="width:15%">
                                <?php 
                                    $file = explode('.', $row['ArchivoPDF']); 
                                    echo $file[0];
                                ?>
                                </td>
                                <td><?php echo $row['Titulo']; ?></td>
                                <td class="text-center" style="width:15%"><?php echo $row['FechaPublicacion']; ?></td>
                                <td class="text-center" style="width:20%">
                                    <a class="text-primary" href="<?php echo DIR; ?>documento/ver/<?php echo $row['ArchivoPDF']; ?>" target="_blank">Ver</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
    
  </main><!-- End #main -->
  <!-- / Content -->

<!-- Footer -->
<?php include_once "views/layout/footer.php"; ?>
<!-- / Footer -->