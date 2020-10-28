<!doctype html>
<html class="no-js" lang="">
<!--<![endif]-->
<?php include 'head.html'; ?>

<body>
  <!-- Left Panel -->
  <?php
  include 'aside.html';
  include 'conexion_pg.php';
  $id_contrato = $_POST['id_contrato'];
  echo $id_contrato;
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
            <h4>Editar contrato</h4>
          </div>
          <?php
          $consulta = "SELECT * FROM cas_contratos INNER JOIN t_ubicas ON t_ubicas.codofic=cas_contratos.cod_ubic 
											INNER JOIN cargo_oprof ON cargo_oprof.cod_prof=cas_contratos.id_cargo WHERE id_contrato='" . $id_contrato . "' ";
          $resp = pg_query($con, $consulta);
          $row = pg_fetch_array($resp);

          ?>
          <div class="card-body">
            <form action="procesos/actualizar_contrato.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">CAS N°</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="nro_cantrato" name="nro_cantrato" value="<?php echo $row['nro_contrato']; ?>" class="form-control">
                    </div><br><br>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Cargo</label></div>
                    <div class="col-12 col-md-9">
                      <?php $profesion = $row['cod_prof']; ?>
                      <select name="profesion_edit" id="profesion_edit" class="form-control-sm form-control">
                        <?php
                        $sql = "SELECT * FROM cargo_oprof";
                        $res = pg_query($con, $sql);
                        while ($rw = pg_fetch_array($res)) {
                          echo "<option value=" . $rw["cod_prof"] . ">" . $rw["profesion"] . "</option> ";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12">
                  <div class="row form-group">
                    <div class="col col-md-2"><label for="selectSm" class=" form-control-label">Ubicación</label></div>
                    <div class="col-md-10">
                      <?php $ubicacion_edit = $row['codofic']; ?>
                      <select name="ubicacion_cas_edit" id="ubicacion_cas_edit" class="form-control standardSelect">
                        <?php
                        $sql = "SELECT * FROM t_ubicas";
                        $res = pg_query($con, $sql);
                        while ($rw = pg_fetch_array($res)) {
                          echo "<option value=" . $rw["codofic"] . ">" . $rw["oficestr"] . " - " . $rw["estruc1"] . "</option> ";
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
                    <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Remuneración</label></div>
                    <div class="col-12 col-md-7"><input type="text" id="remuneracion" name="remuneracion" value="<?php echo $row['remuner']; ?>" class="form-control">
                    </div><br><br>
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
                    <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Tipo contrato</label></div>
                    <div class="col-12 col-md-7">
                      <?php $tip_contrato = $row['tip_contrato']; ?>
                      <select class="form-control" id="tipo_contrato_edit" name="tipo_contrato_edit">
                        <option value="">Contrato Regular</option>
                        <option value="(COVID-19)">Contrato Covid</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-5"><label for="selectSm" class=" form-control-label">N° convocatoria</label></div>
                    <div class="col-12 col-md-7"><input type="text" id="nro_convocatoria" name="nro_convocatoria" value="<?php echo $row['nro_convocatoria']; ?>" class="form-control">
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
                <div class="col-sm-12 col-md-6">
                  <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Subir archivo</label></div>
                    <div class="col-12 col-md-9">
                      <input type="file" id="archivo" name="archivo" accept=".pdf">
                    </div>
                  </div>
                </div>
                <input type="hidden" id="f_registro" name="f_registro" value="<?php echo date('d/m/Y'); ?>">

              </div>
              <div class="modal-footer">
                <a href="javascript: history.go(-1)" type="button" class="btn btn-secondary">Cancelar</a>
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
      $('#profesion_edit > option[value="<?php echo $profesion ?>"]').attr('selected', 'selected');
      $('#tipo_contrato_edit > option[value="<?php echo $tip_contrato ?>"]').attr('selected', 'selected');
      $('#ubicacion_cas_edit > option[value="<?php echo $ubicacion_edit ?>"]').attr('selected', 'selected');
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