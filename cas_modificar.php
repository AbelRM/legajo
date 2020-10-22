<!doctype html>
<html class="no-js" lang="">
<!--<![endif]-->
<?php include 'head.html'; ?>

<body>
  <!-- Left Panel -->
  <?php include 'aside.html';
  include 'conexion_pg.php';
  $id_cas = $_POST['id']; ?>

  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include 'header.html';
    include 'modal_contrato.php';
    // include 'modal_constancia.php';
    include 'modal_adenda.php';
    include 'modal_rcontrato.php';
    include 'modal_radenda.php';
    ?>
    <!-- Header-->

    <div class="content">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Modificar datos</h4>
          </div>
          <div class="card-body">
            <p class="text-muted m-b-15">Registro de todos los contratos y adendas del trabajador. Se recomienda siempre actualizar la página en caso de no cargar datos recién ingresados.
              <br> Al ingresar un contrato o addenda, ingresar campos COMPLETOS.</p>


            <!---modificar datos CAS -->
            <?php
            $datoscomp = "SELECT * FROM cas_registro WHERE id_cas='" . $id_cas . "' ";
            $resp = pg_query($con, $datoscomp);
            while ($rw = pg_fetch_array($resp)) {

              // $nombres=$rw['nombres'].' '.$rw['ape_pat'].' '.$rw['ape_mat'];
              $nombres = $rw['nombres'];
              $ape_pat = $rw['ape_pat'];
              $ape_mat = $rw['ape_mat'];
              $dni = $rw['dni'];
              $domic = $rw['domic'];
              $cel = $rw['cel'];
              $correo = $rw['correo'];
              $fech_nac = $rw['fech_nac'];
            }
            ?>
            <form action="procesos/modificar_cas.php" method="POST">

              <input type="hidden" value="<?php echo $id_cas; ?>" name="id">

              <div class="row form-group">
                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nombres</label></div>
                <div class="col-12 col-md-9"><input type="text" name="nombres" class="form-control" value="<?php echo $nombres; ?>" required></div>
              </div>

              <div class="row form-group">
                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Apellido Paterno</label></div>
                <div class="col-12 col-md-9"><input type="text" name="ape_pat" class="form-control" value="<?php echo $ape_pat; ?>" required></div>
              </div>

              <div class="row form-group">
                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Apellido Materno</label></div>
                <div class="col-12 col-md-9"><input type="text" name="ape_mat" class="form-control" value="<?php echo $ape_mat; ?>" required></div>
              </div>

              <div class="row form-group">
                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">DNI</label></div>
                <div class="col-12 col-md-9"><input type="text" name="dni" class="form-control" value="<?php echo $dni; ?>" maxlength="9" minlength="8" required></div>
              </div>

              <div class="row form-group">
                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Domicilio</label></div>
                <div class="col-12 col-md-9"><input type="text" name="domic" class="form-control" value="<?php echo $domic; ?>" required></div>
              </div>

              <div class="row form-group">
                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Celular</label></div>
                <div class="col-12 col-md-9"><input type="text" name="cel" class="form-control" value="<?php echo $cel; ?>" maxlength="9" minlength="9" required></div>
              </div>

              <div class="row form-group">
                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Correo</label></div>
                <div class="col-12 col-md-9"><input type="text" name="correo" class="form-control" value="<?php echo $correo; ?>" placeholder="example@example.com" required></div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Fecha Nac.</label></div>
                <div class="col-12 col-md-3"><input type="date" name="fech_nac" value="<?php echo $fech_nac; ?>" class="form-control" required></div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nacionalidad</label></div>
                <div class="col-12 col-md-3">
                  <select name="nacionalidad" id="nacionalidad" class="form-control">
                    <option value="">Selecciona...</option>
                    <option value="PERU">PERÚ</option>
                    <option value="VENEZUELA">VENEZUELA</option>
                    <option value="BRASIL">BRASIL</option>
                    <option value="COLOMBIA">COLOMBIA</option>
                    <option value="ECUADOR">ECUADOR</option>
                    <option value="CHILE">CHILE</option>
                    <option value="BOLIVIA">BOLIVIA</option>
                    <option value="ESPANA">ESPAÑA</option>
                    <option value="ARGENTINA">ARGENTINA</option>
                  </select>
                </div>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">
                  <i class="fa fa-plus"></i> Guardar
                </button>
              </div>
            </form>
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

  <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/cas_funciones.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

  <script>
    jQuery(document).ready(function() {
      jQuery(".standardSelect").chosen({
        disable_search_threshold: 10,
        no_results_text: "Oops, no ha sido encontrado!",
        width: "100%"
      });
    });
  </script>


</body>

</html>