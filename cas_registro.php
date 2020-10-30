<!doctype html>
<html class="no-js" lang="">
<!--<![endif]-->
<?php include 'head.html'; ?>

<body>
  <!-- Left Panel -->
  <?php
  include 'aside.html';
  include 'conexion_pg.php';
  $id_cas = $_GET['id'];
  ?>

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
              $nacionalidad = $rw['nacionalidad'];
            }
            ?>


            <!-- <p class="text-sm-left mt-2 mb-1">Datos del trabajador <?php echo $idmovim; ?></p> -->

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
              <div class="col-sm-12 col-md-6 table text-left">
                <p><b>Correo:&nbsp;&nbsp;</b><?php echo $correo; ?></p>
              </div>
              <div class="col-sm-12 col-md-6 table text-left">
                <p><b>Nacionalidad:&nbsp;&nbsp;</b><?php echo $nacionalidad; ?></p>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-3">
                <form method="POST" action="cas_modificar.php">
                  <input type="hidden" value="<?php echo $id_cas; ?>" name="id">
                  <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"> </i>&nbsp; Modificar</button>
                </form>

              </div>
            </div>

            <div class="secciones col-sm-12">
              <hr>
            </div>

            <!-- --------------------------------------------------------------------------------------------------------- -->

            <div class="row">
              <div class="col-md-3 text-center">
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#contrato"><i class="fa fa-plus" aria-hidden="true"></i> Contrato</button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#fin_contrato"><i class="fa fa-ban" aria-hidden="true"></i> Fin contrato</button>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#adenda"><i class="fa fa-plus" aria-hidden="true"></i> Adenda</button>
                <br> <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#fin_adenda"><i class="fa fa-ban" aria-hidden="true"></i> Fin adenda</button>

              </div>

              <!-- Reportes -->
              <!-- <select class="mdb-select md-form" multiple>
                <option value="" disabled selected>Elegir </option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
              </select>
              <label class="mdb-main-label">Example label</label>
              <button class="btn-save btn btn-primary btn-sm">Elegir</button> -->

              <div class="col-md-9 text-right">
                <form action="cas_informeVT.php" method="POST">
                  <div class="row">
                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Elegir N° contrato:</label></div>
                    <div class="col-12 col-md-6">
                      <select name="nro_contrato" id="nro_contrato" class="form-control-sm form-control">
                        <?php
                        $consulta = "SELECT * FROM cas_contratos WHERE idcas = '$id_cas'";
                        $resultado = pg_query($con, $consulta);
                        while ($array = pg_fetch_array($resultado)) {
                          echo "<option value=" . $array["id_contrato"] . ">" . $array["nro_contrato"] . " / " . $array["estado_vt"] .  " / " . $array["fech_registro_vt"] . "</option> ";
                        }
                        ?>
                      </select>
                    </div>
                    <input type="hidden" value="<?php echo $id_cas; ?>" id="id_cas" name="id_cas">
                    <input type="hidden" id="fech_registro_vt" name="fech_registro_vt" value="<?php echo date('d/m/Y'); ?>">
                    <input type="hidden" id="estado_vt" name="estado_vt" value="REGISTRADO">
                    <div class="col-md-3">
                      <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Inf. Vacac. T.</button>
                    </div>
                  </div>
                </form> <br>

                <form action="cas_informeRC.php" method="POST">
                  <div class="row">
                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Elegir N° contrato:</label></div>
                    <div class="col-12 col-md-6">
                      <select name="nro_contrato" id="nro_contrato" class="form-control-sm form-control">
                        <?php
                        $consulta = "SELECT * FROM cas_contratos WHERE idcas = '$id_cas'";
                        $resultado = pg_query($con, $consulta);
                        while ($array = pg_fetch_array($resultado)) {
                          echo "<option value=" . $array["id_contrato"] . ">" . $array["nro_contrato"] . " / " . $array["estado_rc"] . " / " . $array["fecha_registro_rc"] . "</option> ";
                        }
                        ?>
                      </select>
                    </div>
                    <input type="hidden" value="<?php echo $id_cas; ?>" id="id_cas" name="id_cas">
                    <input type="hidden" id="fech_registro_rc" name="fech_registro_rc" value="<?php echo date('d/m/Y'); ?>">
                    <input type="hidden" id="estado_rc" name="estado_rc" value="REGISTRADO">
                    <div class="col-md-3">
                      <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Inf. Renov. C.</button>
                    </div>
                  </div>
                </form> <br>

                <form action="cas_constancia.php" method="POST">
                  <div class="row">
                    <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Registrado hasta:</label></div>
                    <div class="col-12 col-md-6">
                      <select name="nro_contrato" id="nro_contrato" class="form-control-sm form-control">
                        <?php
                        $consulta = "SELECT * FROM cas_contratos WHERE idcas = '$id_cas'";
                        $resultado = pg_query($con, $consulta);
                        while ($array = pg_fetch_array($resultado)) {
                          echo "<option value=" . $array["id_contrato"] . ">" . $array["nro_contrato"] . " / " . $array["estado_ct"] . " / " . $array["fecha_registro_ct"] . "</option> ";
                        }
                        ?>
                      </select>
                    </div>
                    <input type="hidden" value="<?php echo $id_cas; ?>" id="id_cas" name="id_cas">
                    <input type="hidden" id="fech_registro_ct" name="fech_registro_ct" value="<?php echo date('d/m/Y'); ?>">

                    <div class="col-md-3">
                      <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Constancia</button>
                    </div>
                  </div>
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
                      <th scope="col">Fuente y meta</th>
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
                    $r_renuncia = $di_rw['resol_renuncia'];
                    $f_renuncia = $di_rw['f_renuncia'];
                    $nro_convocatoria = $di_rw['nro_convocatoria'];
                    $fuente = $di_rw['fuente'];
                    $meta = $di_rw['meta'];
                    $tipo_contrato = $di_rw['tip_contrato'];
                  ?>
                    <tbody>
                      <tr>
                        <td style="display: none;"><?php echo $id_contrato; ?></td>
                        <td>CAS N° <?php echo $contrato; ?></td>
                        <td><?php echo $cargo; ?><br><small class="form-text text-muted">Ubicación: <?php echo $ubicacion; ?> <br> Oficina: <?php echo $oficina; ?></small></td>
                        <td>Conv. N° <?php echo $nro_convocatoria; ?></td>
                        <td><small class="form-text text-muted">Inicio : <?php echo $f_inicio; ?> <br> Fin : <?php echo $f_fin; ?>
                            <?php
                            if ($r_renuncia == '') {
                              echo "</br>No hay renuncia";
                            } else {
                            ?> <br> <b>Renuncia : <?php echo $f_renuncia; ?></b>
                            <?php
                            }
                            ?>
                          </small>

                        </td>
                        <td>
                          <small style="font-weight:700;">Fuente: </small><?php echo $fuente; ?><br><small style="font-weight: 700;">Meta:</small> <?php echo $meta; ?><br><small style="font-weight:700;">Remuneración: </small><?php echo $remuneracion; ?>
                        </td>

                        <td>
                          <form method="POST" action="modal_editarCAS.php">
                            <input type="hidden" value="<?php echo $id_contrato; ?>" name="id_contrato">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                          </form>

                          <a href="#ver<?php echo $id_contrato; ?>" data-toggle="modal" class="btn btn-success btn-sm m-1"><i class="fa fa-file-pdf-o"></i> Ver folio</a>

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#borrar_contrato_<?php echo $id_contrato; ?>"><i class="fa fa-trash"></i> Borrar</button>
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
                        $meta_adenda = $rw['meta'];
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
                            </small>
                          </td>
                          <td>Meta adenda: <?php echo $meta_adenda; ?> </td>
                          <td>
                            <form method="POST" action="modal_editar_adenda.php">
                              <input type="hidden" value="<?php echo $id_adenda; ?>" name="id_adenda">
                              <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"></i> Editar</button>
                            </form>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#borrar_adenda_<?php echo $id_adenda; ?>"><i class="fa fa-trash"></i> Borrar</button>

                          </td>
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

  <!-- DELETE MODAL -->
  <div class="modal fade" id="borrar_contrato_<?php echo $id_contrato; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <div class="row">
            <div class="col-md-8">
              <h5 class="modal-title" id="exampleModalLabel">ELIMINAR CONTRATO</h5>
            </div>
            <div class="col-md-4">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          </div>
        </div>
        <form action="procesos/borrar_contrato.php" method="POST">

          <div class="modal-body">

            <input type="hidden" name="id_contrato" value="<?php echo $id_contrato ?>">
            <h4>¿Desea eliminar el registro de formación?</h4>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn btn-light" data-dismiss="modal">NO</button>
            <button type="submit" class="btn btn-danger" name="deleteData">SI</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- DELETE MODAL -->
  <div class="modal fade" id="borrar_adenda_<?php echo $id_adenda; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <div class="row">
            <div class="col-md-8">
              <h5 class="modal-title" id="exampleModalLabel">ELIMINAR ADENDA</h5>
            </div>
            <div class="col-md-4">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          </div>
        </div>
        <form action="procesos/borrar_adenda.php" method="POST">

          <div class="modal-body">
            <input type="hidden" name="id_adenda" value="<?php echo $id_adenda ?>">
            <h4>¿Desea eliminar el registro de formación?</h4>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn btn-light" data-dismiss="modal">NO</button>
            <button type="submit" class="btn btn-danger" name="deleteData">SI</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <?php include 'footer.html'; ?>

  </div><!-- /#right-panel -->

  <!-- Right Panel -->

  <script src="assets/js/otros/jquery.min.js"></script>
  <script src="assets/js/otros/popper.min.js"></script>
  <script src="assets/js/otros/bootstrap.js"></script>
  <script src="assets/js/otros/jquery.matchHeight.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/cas_funciones.js"></script>
  <script src="assets/js/otros/jquery.js"></script>
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
      $('.deleteBtn').on('click', function() {

        $('#deleteModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#deleteId').val(data[0]);

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

    // Material Select Initialization
    $(document).ready(function() {
      $('.mdb-select').materialSelect();
    });
  </script>
</body>

</html>