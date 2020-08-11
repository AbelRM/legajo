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
                                $datoscomp="SELECT * FROM cas_registro WHERE id_cas='".$id_cas."' ";
                                                    $resp=pg_query($con,$datoscomp);
                                                    while ($rw=pg_fetch_array($resp)) {
                               
                                    $nombres=$rw['nombres'].' '.$rw['ape_pat'].' '.$rw['ape_mat'];
                                    $dni=$rw['dni'];
                                    $domic=$rw['domic'];
                                    $cel=$rw['cel'];
                                    $correo=$rw['correo'];
                                    


                                }
                                ?>


                                <div class="col-sm-12 col-md-8">
                                    <!-- <p class="text-sm-left mt-2 mb-1">Datos del trabajador <?php echo $idmovim;?></p> -->
                                    <br><br>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 table text-left"><p><b>Nombre:&nbsp;&nbsp;</b><?php echo $nombres;?></p></div>
                                        <div class="col-sm-12 col-md-6 table text-left"><p><b>DNI:&nbsp;&nbsp;</b><?php echo $dni;?></p></div>
                                        <div class="col-sm-12 col-md-6 table text-left"><p><b>Domicilio:&nbsp;&nbsp;</b><?php echo $domic;?></p></div>
                                        <div class="col-sm-12 col-md-6 table text-left"><p><b>Celular:&nbsp;&nbsp;</b><?php echo $cel;?></p></div>
                                        <div class="col-sm-12 table text-left"><p><b>Correo:&nbsp;&nbsp;</b><?php echo $correo;?></p></div>
                                    </div>

                                </div>
                                <div class="secciones col-sm-12"><hr></div>

                                <!-- --------------------------------------------------------------------------------------------------------- -->

                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#contrato"><i class="fa fa-lightbulb-o"></i>&nbsp; Agregar contrato</button>
                                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#adenda"><i class="fa fa-lightbulb-o"></i>&nbsp; Agregar adenda</button>
                                        <br><br><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#fin_contrato"><i class="fa fa-lightbulb-o"></i>&nbsp; Fin contrato</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#fin_adenda"><i class="fa fa-lightbulb-o"></i>&nbsp; Fin adenda</button>
                                        
                                    </div>

                                <!-- ---------- --------------------------------------------->
                                   <!----------------
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#adenda">Open Modal 1 </button>
                                    <div id="adenda" class="modal fade" role="dialog" style="z-index: 1400;">
                                    <div class="modal-dialog">
                                       
                                        <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal"      data-target="#contrato">Open Modal 2</button>
                                            
                                        </div>      
                                        </div>
                                    </div>
                                    </div>

                                    <div id="contrato" class="modal fade" role="dialog" style="z-index: 1600;">
                                    <div class="modal-dialog">
                                       
                                        <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            
                                            content
                                            
                                        </div>      
                                        </div>
                                    </div>
                                    </div>  ------------------------>
                                <!-- ---------- --------------------------------------------->

                                    <div class="col-md-6 text-right">

                                        <form action="cas_informeVT.php" method="POST">
                                            <input type="hidden" value="<?php echo $id_cas;?>" id="id_cas" name="id_cas">
                                            <button type="submit" class="btn btn-secondary btn-sm" ><i class="fa fa-lightbulb-o"></i>&nbsp; Informe V.T.</button>
                                        </form> <br>

                                        
                                        <form action="cas_constancia.php" method="POST">
                                            <input type="hidden" value="<?php echo $id_cas;?>" id="id_cas" name="id_cas">
                                            <button type="submit" class="btn btn-secondary btn-sm" ><i class="fa fa-lightbulb-o"></i>&nbsp; Constancia de trabajo</button>
                                        </form> <br>
                                    </div>
                                                
                                    <div class="col-md-12">
                                        <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Nro CAS</th>
                                                        <th scope="col">Cargo y ubicación</th>   
                                                        <th scope="col">Plazo</th>
                                                    </tr>
                                                </thead>

                                                <?php
                                                    $d_info="SELECT * FROM cas_contratos INNER JOIN t_ubicas ON t_ubicas.codofic=cas_contratos.cod_ubic INNER JOIN cargo_oprof ON cargo_oprof.cod_prof=cas_contratos.id_cargo WHERE idcas='".$id_cas."' ";
                                                    $res=pg_query($con,$d_info);
                                                    while ($di_rw=pg_fetch_array($res)) {
                            
                                                    $contrato=$di_rw['nro_contrato'];
                                                    $f_inicio=$di_rw['f_inicio'];
                                                    $f_fin=$di_rw['f_termino'];
                                                    $cargo=$di_rw['profesion'];
                                                    $ubicacion=$di_rw['estruc1'];
                                                    $oficina=$di_rw['oficestr'];
                                                    $id_contrato=$di_rw['id_contrato'];
                                                    $r_renuncia=$di_rw['resol_renuncia'];  
                                                    $f_renuncia=$di_rw['f_renuncia'];                                                  

                                                ?> 

                                                <tbody>
                                                 
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td>CAS N° <?php echo $contrato; ?></td>
                                                    <td><?php echo $cargo;?><br><small class="form-text text-muted">Ubicación: <?php echo $ubicacion;?> <br> Oficina: <?php echo $oficina;?></small></td>
                                                    <td> <small class="form-text text-muted">Inicio : <?php echo $f_inicio;?> <br> Fin : <?php echo $f_fin;?>

                                                        <?php
                                                        if ($r_renuncia=='') {
                                                             # code...
                                                         } else {
                                                            ?> <br> <b>Renuncia : <?php echo $f_renuncia;?></b> 
                                                            <?php
                                                         }
                                                          ?>

                                                        </small> </td>
                                                    
                                                                
                                                </tr>

                                                    <?php
                                                    $sql="SELECT * FROM cas_adenda INNER JOIN cas_tadenda ON cas_adenda.id_tadenda=cas_tadenda.id_tadenda WHERE id_contrato='".$id_contrato."' ";
                                                        $result=pg_query($con,$sql);
                                                        while ($rw=pg_fetch_array($result)) {
                                                            $nro_aden=$rw['nro_adenda'];
                                                            $f_in=$rw['f_inicio'];
                                                            $f_fi=$rw['f_termino'];
                                                            $id_adenda=$rw['id_adenda'];  
                                                            $t_adenda=$rw['tipo_adenda'];
                                                            $r_arenuncia=$di_rw['resol_renuncia'];
                                                            $f_arenuncia=$di_rw['f_renuncia'];
                                                    ?>
                                                    <tr>
                                                        
                                                        <td>Nro adenda  <br>Tipo de adenda  <br> Plazo <br></td>
                                                        <td><?php echo $nro_aden;?> <br> <small class="form-text text-muted"><?php echo $t_adenda;?> <br>Desde el <?php echo $f_in;?> hasta el <?php echo $f_fi;?> <br> <?php echo $f_arenuncia;?>
                                                        
                                                        <?php 
                                                        if ($r_arenuncia=='') {
                                                             # code...
                                                         } else{
                                                            ?> <br> <b>Renuncia : <?php echo $f_arenuncia;?></b> 
                                                            <?php
                                                         } ?>

                                                        </small></td>
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
