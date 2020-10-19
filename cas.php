<!doctype html>
<html class="no-js" lang="">
<!--<![endif]-->
<?php include 'head.html'; ?>

<body>
  <!-- Left Panel -->
  <?php include 'aside.html'; ?>

  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include 'header.html'; ?>
    <!-- Header-->

    <div class="content">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Buscador</h4>
          </div>
          <div class="card-body">
            <p class="text-muted m-b-15">Busque al trabajador CAS por su DNI / por sus nombres / por sus apellidos</p>
            <div class="row">
              <div class="col-md-12 d-flex justify-content-end">
                <a href="reporte.php"><button type="button" class="btn btn-success btn-xs" id="editar" style="margin: 1px;"><i class="fa fa-book"></i> Descargar Reporte</button></a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 col-lg-12 text-center"><br>
                <div class="input-group">
                  <div class="input-group-btn">
                    <button class="btn btn-primary" onclick="load(1)">
                      <i class="fa fa-search"></i> Buscar
                    </button>
                  </div>
                  <input type="text" class="form-control" id="q" placeholder="DNI / Nombres / Apellidos del trabajador / CÓD. DE PLAZA" onkeyup="load(1)" style="text-transform: uppercase;">
                </div>
              </div><br><br><br>

              <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;" class="col-sm-12 text-center"></div><!-- Carga gif animado -->
              <div class="col-sm-12 outer_div"></div><!-- Datos ajax Final -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /# column -->
  </div><!-- .content -->

  <div class="clearfix"></div>

  <?php include 'footer.html'; ?>


  </div><!-- /#right-panel -->

  <!-- Right Panel -->

  <script src="assets/js/otros/jquery.min.js"></script>
  <script src="assets/js/otros/popper.min.js"></script>
  <script src="assets/js/otros/bootstrap.min.js"></script>
  <script src="assets/js/otros/jquery.matchHeight.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/cas_funciones.js"></script>
  <script src="assets/js/otros/jquery-3.2.1.min.js"></script>


</body>

</html>