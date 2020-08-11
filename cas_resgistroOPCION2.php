<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<?php include 'head.html'; ?>
<body>
    <!-- Left Panel -->
    <?php include 'aside.html';
    include 'conexion_pg.php' ; 
    $id_cas=$_POST['id'];?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'header.html';
        include 'modal_contrato.php';
        include 'modal_conyuge.php';
        include 'modal_adenda.php';
        ?>
        <!-- Header-->

        <div class="content">


                

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Buscador</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted m-b-15">Registro de todos los contratos y adendas del trabajador</p>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br><button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#contrato"><i class="fa fa-lightbulb-o"></i>&nbsp; Agregar contrato</button>
                                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#conyuge"><i class="fa fa-lightbulb-o"></i>&nbsp; Informe de vacaciones truncas</button>
                                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#hijos"><i class="fa fa-lightbulb-o"></i>&nbsp; Constancia de trabajo</button><br><br>
                                    </div>
                                                
                                    <div class="col-md-12">
                                        <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Nro CAS</th>
                                                        <th scope="col">Cargo y ubicación</th>
                                                        <th scope="col">Plazo</th>
                                                        <th scope="col">Herramientas</th>
                                                    </tr>
                                                </thead>

                                                <?php
                                                    $d_info="SELECT * FROM cas_contratos, cargo_oprof, t_ubicas WHERE idcas = $id_cas AND cargo_oprof.cod_prof=cas_contratos.id_cargo AND t_ubicas.codofic=cas_contratos.cod_ubic ";
                                                    $res=pg_query($con,$d_info);
                                                    while ($di_rw=pg_fetch_array($res)) {
                            
                                                    $contrato=$di_rw['nro_contrato'];
                                                    $f_inicio=$di_rw['f_inicio'];
                                                    $f_fin=$di_rw['f_termino'];
                                                    $cargo=$di_rw['profesion'];
                                                    $ubicacion=$di_rw['estruc1'];
                                                    $id_contrato=$di_rw['id_contrato'];

                                                    

                                                    

                                                ?> 

                                                <tbody>
                                                 
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td>CAS N° <?php echo $contrato; ?></td>
                                                    <td><?php echo $cargo;?><br><small class="form-text text-muted">Ubicación: <?php echo $ubicacion;?></small></td>
                                                    <td> <small class="form-text text-muted">Inicio : <?php echo $f_inicio;?> <br> Fin : <?php echo $f_fin;?></small> <?php echo $id_contrato;?> </td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary btn-sm" onclick="new_adenda(<?php echo $id_contrato;?>)" ><i class="fa fa-plus"></i>&nbsp; Adenda</button>
                                                        <!-- <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#adenda"><i class="fa fa-plus"></i>&nbsp; Adenda</button> -->
                                                        <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp; Fin contrato</button>
                                                    </td>
                                                                
                                                </tr>

                                                <?php
                                                $sql="SELECT * FROM cas_adenda, cas_tadenda WHERE id_contrato=$id_contrato AND cas_tadenda.id_tadenda=cas_adenda.id_tadenda";
                                                    $res=pg_query($con,$sql);
                                                    while ($rw=pg_fetch_array($res)) {
                                                        $nro_aden=$rw['nro_adenda'];
                                                        $f_in=$rw['f_inicio'];
                                                        $f_fin=$rw['f_termino'];
                                                        $id_adenda=$rw['id_adenda'];
                                                        $t_adenda=$rw['tipo_adenda'];
                                                ?>
                                                <tr>
                                                    <!-- <td colspan="4"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam obcaecati tempora suscipit atque, iure omnis. Reprehenderit molestias, ex cum, quibusdam dolore corporis perferendis molestiae, ullam, facere tenetur accusantium illum at.</p></td> -->
                                                    <td>Nro adenda  <br>Tipo de adenda  <br> Plazo <br></td>
                                                    <td><?php echo $nro_aden;?> <br> <small class="form-text text-muted"><?php echo $t_adenda;?> <br>Desde el <?php echo $f_in;?> hasta el <?php echo $f_fin?></small></td>
                                                </tr>
                                             
                                                <?php }?>
                                            </tbody>
                                                <?php }?>      
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                    <!-- /# column -->
        </div><!-- .content -->

            <div class="clearfix"></div>

            <?php include'footer.html'; ?>


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
