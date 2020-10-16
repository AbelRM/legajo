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
            <h4>Registro de contratos del trabajador</h4>
          </div>
          <div class="card-body">
            <p class="text-muted m-b-15">Registro de todos los contratos y adendas del trabajador. Se recomienda siempre actualizar la página en caso de no cargar datos recién ingresados.
              <br> Al ingresar un contrato o addenda, ingresar campos COMPLETOS.</p>

            <?php
            // $id_cas=$_POST['id_cas'];
            $datoscomp = "SELECT * FROM cas_registro WHERE id_cas='" . $id_cas . "' ";
            $resp = pg_query($con, $datoscomp);
            while ($rw = pg_fetch_array($resp)) {

              $nombres = $rw['nombres'] . ' ' . $rw['ape_pat'] . ' ' . $rw['ape_mat'];
              $dni = $rw['dni'];
              $domic = $rw['domic'];
              $cel = $rw['cel'];
              $correo = $rw['correo'];
              $fech_nac = $rw['fech_nac'];
            }
            ?>

            <div class="col-sm-12 col-md-12">
              <!-- <p class="text-sm-left mt-2 mb-1">Datos del trabajador <?php echo $idmovim; ?></p> -->
              <br><br>
              <div class="row">
                <div class="col-sm-12 col-md-6 table text-left">
                  <p><b>Nombre:&nbsp;&nbsp;</b><?php echo $nombres; ?></p>
                </div>
                <div class="col-sm-12 col-md-3 table text-left">
                  <p><b>DNI:&nbsp;&nbsp;</b><?php echo $dni; ?></p>
                </div>
                <div class="col-sm-12 col-md-3 table text-left">
                  <p><b>Fech. Nac.:&nbsp;&nbsp;</b><?php echo $fech_nac; ?></p>
                </div>
                <div class="col-sm-12 col-md-6 table text-left">
                  <p><b>Domicilio:&nbsp;&nbsp;</b><?php echo $domic; ?></p>
                </div>
                <div class="col-sm-12 col-md-6 table text-left">
                  <p><b>Celular:&nbsp;&nbsp;</b><?php echo $cel; ?></p>
                </div>
                <div class="col-sm-12 table text-left">
                  <p><b>Correo:&nbsp;&nbsp;</b><?php echo $correo; ?></p>
                </div>
              </div>

            </div>
            <div class="secciones col-sm-12">
              <hr>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------- -->

            <div class="row">
              <div class="col-md-6 text-center">
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#contrato"><i class="fa fa-lightbulb-o"></i>&nbsp; Agregar contrato</button>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#adenda"><i class="fa fa-lightbulb-o"></i>&nbsp; Agregar adenda</button>
                <br><br><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#fin_contrato"><i class="fa fa-lightbulb-o"></i>&nbsp; Fin contrato</button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#fin_adenda"><i class="fa fa-lightbulb-o"></i>&nbsp; Fin adenda</button>

              </div>

              <!-- Reportes -->
              <div class="col-md-6 text-right">
                <form action="cas_informeVT.php" method="POST">
                  <input type="hidden" value="<?php echo $id_cas; ?>" id="id_cas" name="id_cas">
                  <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Informe V.T.</button>
                </form> <br>

                <form action="cas_informeRC.php" method="POST">
                  <input type="hidden" value="<?php echo $id_cas; ?>" id="id_cas" name="id_cas">
                  <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Informe R.C.</button>
                </form> <br>

                <form action="cas_constancia.php" method="POST">
                  <input type="hidden" value="<?php echo $id_cas; ?>" id="id_cas" name="id_cas">
                  <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Constancia de trabajo</button>
                </form> <br>
              </div>

              <div class="col-md-12">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Nro CAS</th>
                      <th scope="col">Cargo y ubicación</th>
                      <th scope="col">N° convocatoria</th>
                      <th scope="col">Plazo</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>

                  <?php
                  $d_info = "SELECT * FROM cas_contratos INNER JOIN t_ubicas ON t_ubicas.codofic=cas_contratos.cod_ubic 
														INNER JOIN cargo_oprof ON cargo_oprof.cod_prof=cas_contratos.id_cargo WHERE idcas='" . $id_cas . "' ORDER BY f_inicio desc";
                  $res = pg_query($con, $d_info);
                  while ($di_rw = pg_fetch_array($res)) {
                    $id_contrato = $di_rw['id_contrato'];
                    $contrato = $di_rw['nro_contrato'];
                    $f_inicio = $di_rw['f_inicio'];
                    $f_fin = $di_rw['f_termino'];
                    $remuneracion = $di_rw['remuner'];
                    $cargo = $di_rw['profesion'];
                    $ubicacion = $di_rw['estruc1'];
                    $oficina = $di_rw['oficestr'];
                    $id_contrato = $di_rw['id_contrato'];
                    $r_renuncia = $di_rw['resol_renuncia'];
                    $f_renuncia = $di_rw['f_renuncia'];
                    $nro_convocatoria = $di_rw['nro_convocatoria'];
                    $fuente = $di_rw['fuente'];
                    $meta = $di_rw['meta'];
                    $tipo_contrato = $di_rw['tip_contrato'];
                  ?>
                    <tbody>
                      <tr>
                        <td>CAS N° <?php echo $contrato; ?></td>
                        <td><?php echo $cargo; ?><br><small class="form-text text-muted">Ubicación: <?php echo $ubicacion; ?> <br> Oficina: <?php echo $oficina; ?></small></td>
                        <td>Conv. N° <?php echo $nro_convocatoria; ?></td>
                        <td><small class="form-text text-muted">Inicio : <?php echo $f_inicio; ?> <br> Fin : <?php echo $f_fin; ?>
                            <?php
                            if ($r_renuncia == '') {
                              echo "No hay renuncia";
                            } else {
                            ?> <br> <b>Renuncia : <?php echo $f_renuncia; ?></b>
                            <?php
                            }
                            ?>
                          </small>
                        </td>
                        <td>
                          <a href="#edit<?php echo $id_contrato; ?>" data-toggle="modal" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit">
                            </span> Editar</a>&nbsp;

                          <a href="#delete<?php echo $id_contrato; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash">
                            </span> Elominar</a>

                          <!-- include edit modal -->
                          <?php //include 'BorrarEditarModal.php' ; 
                          ?>
                          <!-- End -->
                        </td>

                      </tr>

                      <?php
                      $sql = "SELECT * FROM cas_adenda INNER JOIN cas_tadenda ON cas_adenda.id_tadenda=cas_tadenda.id_tadenda WHERE id_contrato='" . $id_contrato . "' ORDER BY id_adenda ";
                      $result = pg_query($con, $sql);
                      while ($rw = pg_fetch_array($result)) {
                        $nro_aden = $rw['nro_adenda'];
                        $f_in = $rw['f_inicio'];
                        $f_fi = $rw['f_termino'];
                        $id_adenda = $rw['id_adenda'];
                        $t_adenda = $rw['tipo_adenda'];
                        $r_arenuncia = $rw['resol_renuncia'];
                        $f_arenuncia = $rw['f_renuncia'];
                      ?>
                        <tr>
                          <td>Nro adenda <br>Tipo de adenda <br> Plazo <br></td>
                          <td><?php echo $nro_aden; ?> <br> <small class="form-text text-muted"><?php echo $t_adenda; ?> <br>Desde el <?php echo $f_in; ?> hasta el <?php echo $f_fi; ?> <br> <?php echo $f_arenuncia; ?>

                              <?php
                              if ($r_arenuncia == '') {
                              } else {
                              ?> <br> <b>Renuncia : <?php echo $f_arenuncia; ?></b>
                              <?php
                              } ?>

                            </small></td>
                        </tr>
                      <?php } ?>
                    </tbody>

                  <?php
                  } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /# column -->
  </div><!-- .content -->
  <!-- Ventana Editar Registros CRUD -->
  <div class="modal fade" id="myModalupdate<?php echo $id_contrato; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="mediumModalLabel">Editar Empleado</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid" style="font-size:12px;">
            <form method="POST" action="EditarRegistro.php?id=<?php echo $id_contrato; ?>">
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="exampleFormControlInput1">N° Convocatoria:</label>
                  <input type="text" style="font-size:12px;" class="form-control" name="convocatoria" value="<?php echo $nro_convocatoria; ?>">
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlInput1">CAS N°:</label>
                  <input type="text" style="font-size:12px;" class="form-control" name="nombres" value="<?php echo $contrato; ?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="exampleFormControlInput1">Fecha inicio:</label>
                  <input type="date" style="font-size:12px;" class="form-control" name="fech_inicio" value="<?php echo $f_inicio; ?>">
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlInput1">Fecha término:</label>
                  <input type="date" style="font-size:12px;" class="form-control" name="fech_fin" value="<?php echo $f_fin; ?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="exampleFormControlInput1">Remuneración:</label>
                  <input type="text" style="font-size:12px;" class="form-control" name="remuneracion" value="<?php echo $remuneracion; ?>">
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlInput1">Cargo:</label>
                  <select style="font-size:12px;" name="cargo" id="cargo" class="form-control">
                    <option value="<?php echo $cargo; ?>"><?php echo $cargo; ?></option>
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
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="control-label" style="position:relative; top:7px;">Ubicación:</label>
                </div>
                <div class="col-md-12">
                  <select style="font-size:12px;" name="ubicacion" id="ubicacion" class="form-control standardSelect">
                    <option value="<?php echo $ubicacion; ?>"><?php echo $ubicacion . "-" . $oficina; ?></option>
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
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="exampleFormControlInput1">Fuente financiamiento:</label>
                  <input type="text" style="font-size:12px;" class="form-control" name="fuente" value="<?php echo $fuente; ?>">
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlInput1">Meta:</label>
                  <input type="text" style="font-size:12px;" class="form-control" name="meta" value="<?php echo $meta; ?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-sm-3">
                  <label class="control-label" style="position:relative; top:7px;">Tipo contrato:</label>
                </div>
                <div class="col-sm-9">
                  <input type="text" style="font-size:12px;" class="form-control" name="tipo_contrato" value="<?php echo $tipo_contrato; ?>">
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
            </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Borrar -->
  <div class="modal fade" id="delete_<?php echo $id_contrato; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Borrar Empleado</h4>
        </div>
        <div class="modal-body">
          <p class="text-center">¿Esta seguro de Borrar el registro?</p>
          <h2 class="text-center"><?php echo $row['Nombres'] . ' ' . $row['Apellidos']; ?></h2>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
          <a href="BorrarRegistro.php?id=<?php echo $row['idEmp']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
        </div>

      </div>
    </div>
  </div>

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