        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          All Rights Reserved by Matrix-admin. Designed and Developed by
          <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://repositorio.itsup.edu.ec/matrix/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="https://repositorio.itsup.edu.ec/matrix/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://repositorio.itsup.edu.ec/matrix/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="https://repositorio.itsup.edu.ec/matrix/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="https://repositorio.itsup.edu.ec/matrix/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="https://repositorio.itsup.edu.ec/matrix/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="https://repositorio.itsup.edu.ec/matrix/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="https://repositorio.itsup.edu.ec/matrix/dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="https://repositorio.itsup.edu.ec/matrix/assets/libs/flot/excanvas.js"></script>
    <script src="https://repositorio.itsup.edu.ec/matrix/assets/libs/flot/jquery.flot.js"></script>
    <script src="https://repositorio.itsup.edu.ec/matrix/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="https://repositorio.itsup.edu.ec/matrix/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="https://repositorio.itsup.edu.ec/matrix/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="https://repositorio.itsup.edu.ec/matrix/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="https://repositorio.itsup.edu.ec/matrix/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="https://repositorio.itsup.edu.ec/matrix/dist/js/pages/chart/chart-page-init.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
      let table = new DataTable('#tbLista', {
          destroy:true,       
          pageLength: 10,
          buttons: ['copy', 'excel', 'pdf'],
      });

      table.buttons().container()
          .appendTo('#tbLista_wrapper .col-md-6:eq(0)');
    </script>
  </body>
</html>
