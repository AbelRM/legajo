<!doctype html>
<html class="no-js" lang="">
<!--<![endif]-->
<?php include 'head.html'; ?>

<body>
  <!-- Left Panel -->
  <?php
  include 'aside.html';
  include 'conexion_pg.php';
  $id_adenda = $_POST['id_adenda'];
  ?>

  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include 'header.html';


    ?>
    <!-- Header-->

    <div class="content">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Editar modal</h4>
          </div>
          <?php

          $consulta = "SELECT * FROM cas_adenda INNER JOIN cas_contratos ON cas_adenda.id_contrato = cas_contratos.id_contrato WHERE id_adenda='" . $id_adenda . "' ";
          $resp = pg_query($con, $consulta);
          $array = pg_fetch_array($resp);

          $sql = "SELECT * FROM cas_adenda WHERE id_adenda='" . $id_adenda . "' ";
          $respuesta = pg_query($con, $sql);
          $row = pg_fetch_array($respuesta);

          ?>
          <div class="card-body">
            <form action="procesos/actualizar_adenda.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Contrato N°</label></div>
                    <div class="col-12 col-md-9"><input type="text" value="<?php echo $array['nro_contrato']; ?>" class="form-control" disabled>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Adenda N°</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="nro_adenda" name="nro_adenda" value="<?php echo $row['nro_adenda']; ?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Tipo de adenda</label></div>
                    <div class="col-12 col-md-9">
                      <?php $tipo_dadenda = $row['id_tadenda']; ?>
                      <select name="tipo_dadenda_editar" id="tipo_dadenda_editar" class="form-control-sm form-control">
                        <?php
                        $sql = "SELECT * FROM cas_tadenda";
                        $res = pg_query($con, $sql);
                        while ($rw = pg_fetch_array($res)) {
                          echo "<option value=" . $rw["id_tadenda"] . ">" . $rw["tipo_adenda"] . "</option> ";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Fecha inicio</label></div>
                    <div class="col-12 col-md-7"><input type="date" id="f_inicio" name="f_inicio" class="form-control" value="<?php echo $row['f_inicio']; ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Fecha termino</label></div>
                    <div class="col-12 col-md-7"><input type="date" id="f_termino" name="f_termino" class="form-control" value="<?php echo $row['f_termino']; ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Fuente</label></div>
                    <div class="col-12 col-md-7"><input type="text" id="fuente" name="fuente" style="font-size:14px;" value="<?php echo $row['fuente']; ?>" class="form-control">
                    </div><br><br>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Meta</label></div>
                    <div class="col-12 col-md-7"><input type="text" id="meta" name="meta" value="<?php echo $row['meta']; ?>" class="form-control">
                    </div><br><br>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Tipo adenda</label></div>
                    <div class="col-12 col-md-7">
                      <?php $tip_adenda = $row['tip_adenda']; ?>
                      <select class="form-control" id="tipo_adenda_edit" name="tipo_adenda_edit">
                        <option value="">Contrato Regular</option>
                        <option value="COVID-19">Contrato Covid</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Fecha Renuncia</label></div>
                    <div class="col-12 col-md-7"><input type="date" id="f_renuncia" name="f_renuncia" value="<?php echo $row['f_renuncia']; ?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Resol. Renuncia</label></div>
                    <div class="col-12 col-md-7"><input type="text" id="resol_renuncia" name="resol_renuncia" value="<?php echo $row['resol_renuncia']; ?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12">
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Subir archivo</label></div>
                    <div class="col-12 col-md-9">
                      <input type="file" id="archivo" name="archivo" accept=".pdf">
                    </div>
                  </div>
                </div>
                <input type="hidden" id="f_registro" name="f_registro" value="<?php echo date('d/m/Y'); ?>">
                <input type="hidden" name="id_adenda" value="<?php echo $id_adenda; ?>">
                <input type="hidden" name="id_contrato" value="<?php echo $row['id_contrato']; ?>">
              </div>
              <div class="modal-footer">
                <a href="javascript: history.go(-1)" type="button" class="btn btn-light">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </form>
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
  <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>
  <script src="assets/js/mdb.js"></script>
  <script>
    jQuery(document).ready(function() {
      jQuery(".standardSelect").chosen({
        disable_search_threshold: 10,
        no_results_text: "Oops, no ha sido encontrado!",
        width: "100%"
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#tipo_dadenda_editar > option[value="<?php echo $tipo_dadenda ?>"]').attr('selected', 'selected');
      $('#tipo_adenda_edit > option[value="<?php echo $tip_adenda ?>"]').attr('selected', 'selected');
    });
  </script>

  <script>
    /**
     * Abrimos la ventana modal para crear un nuevo elemento.
     * We open a modal window to create a new element.
     * @returns {undefined}
     */
    function newCbLanguage() {
      $('#editar').on('shown.bs.modal', function() {
        $('#myInput').focus()
      });
    }
  </script>
</body>

</html>