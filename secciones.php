<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<?php include 'head.html'; ?>
<body>
    <!-- Left Panel -->
    <?php include 'aside.html'; 
    include 'conexion_pg.php';
    $idmovim=$_POST['idmovim'];?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'header.html';?>
        <!-- Header-->

        <div class="content">


            <div class="animated fadeIn">

                <div class="row">

                    

                    <div class="col-md-12">
                        <div class="card row">
                            <div class="card-header col-xs-12">
                                <i class="fa fa-user"></i><strong class="card-title pl-2">Legajo del trabajador</strong>
                            </div>
                            <div class="card-body row">
                                <div class="mx-auto d-block col-sm-12 col-md-4">
                                    
                                    <div class="file-upload">
                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" />
                                            <div class="drag-text">
                                              <img class="rounded-circle mx-auto d-block" src="images/perfil.jpg" height="200px" width="180px">
                                            </div>
                                        </div>
                                        <div class="file-upload-content" style="display: none;  text-align: center;">
                                            <div class="image-title-wrap">
                                              <button type="button" onclick="removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar</button>
                                            </div>
                                            <img class="file-upload-image rounded-circle mx-auto d-block" src="#" height="200px" width="180px">
                                        </div>
                                        <br>
                                        <div class=" text-center"><button class="file-upload-btn btn btn-sm btn-secondary" type="button" onclick="$('.file-upload-input').trigger( 'click' )"><i class="fa fa-cloud-upload"></i>&nbsp; Cargar imagen</button></div>
                                        
                                    </div>
                                </div>

                               <?php
                                $cons="SELECT * FROM ficha, t_cargo, t_nivel, t_ubicas, detmov where ficha.idmovim=detmov.idmovim and cast(ficha.idmovim as integer)=$idmovim  and ficha.d1_codcar=t_cargo.codcar and ficha.d1_codniv=t_nivel.codnivel and ficha.codubic=t_ubicas.codofic ";
                                $query=pg_query($con,$cons);
                                while($rw=pg_fetch_array($query)){    
                                    $nombres=$rw['d1_nombres'].' '.$rw['d1_apepat'].' '.$rw['d1_apemat'];
                                    $plaza=$rw['codplaza'];
                                    $cargo=$rw['descar'];
                                    $nivel=$rw['denom'].' ['.$rw['tiptrab'].']';
                                    $ofic=$rw['oficestr'];
                                    $f_nomb=$rw['d1_fecing'];
                                    $dni=$rw['d1_dni'];
                                    $nombre=$rw['d1_apepat'].' '.$rw['d1_apemat'].' '.$rw['d1_nombres'];

                                    if ($rw['codtipacc']=='07001') {
                                        $f_contrato=$rw['fecefe'];
                                    } else{
                                        $f_contrato='[No registra]';
                                    }

                                    if ($rw['codtipacc']=='14001') {
                                        $f_nombr=$rw['fecefe'];
                                    }


                                }
                                ?>


                                <div class="col-sm-12 col-md-8">
                                    <!-- <p class="text-sm-left mt-2 mb-1">Datos del trabajador <?php echo $idmovim;?></p> -->
                                    <br><br>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 table text-left"><p><b>Nombre:&nbsp;&nbsp;</b><?php echo $nombres;?></p></div>
                                        <div class="col-sm-12 col-md-6 table text-left"><p><b>Cód. plaza:&nbsp;&nbsp;</b><?php echo $plaza;?></p></div>
                                        <div class="col-sm-12 col-md-6 table text-left"><p><b>Cargo:&nbsp;&nbsp;</b><?php echo $cargo;?></p></div>
                                        <div class="col-sm-12 col-md-6 table text-left"><p><b>Nivel:&nbsp;&nbsp;</b><?php echo $nivel;?></p></div>
                                        <div class="col-sm-12 table text-left"><p><b>Oficina:&nbsp;&nbsp;</b><?php echo $ofic;?></p></div>
                                        <div class="col-sm-12 col-md-6 table text-left"><p><b>Nombramiento:&nbsp;&nbsp;</b><?php echo $f_nombr;?></p></div>
                                        <div class="col-sm-12 col-md-6 table text-left"><p><b>Contrato:&nbsp;&nbsp;</b><?php echo $f_contrato?></p></div>
                                    </div>

                                </div>
                                <div class="secciones col-sm-12"><hr></div>
<!-- SECCION DE REGRESAR -->

                                <div class="col-sm-12 text-right regresar" style="display: none;">
                                    <a href="#" class="btn btn-sm btn-secondary" onclick="regresar()"><i class="fa fa-hand-o-left"></i>&nbsp;Regresar</a>
                                </div>
<!-- FIN REGRESAR -->                               
                                <div class="col-sm-12"><hr></div>

                                <div class="secciones row">
                                        
                                
                                    <div class="col-lg-4 col-md-6 seccion_1">
                                        <a href="#" onclick="abrir('seccion_i')" >
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Datos Personales</div>
                                                        <div class="stat-digit">Sección I</div>

                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-primary btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_2">
                                        <a href="#" onclick="abrir('seccion_ii')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib"><i class="ti-direction-alt text-secondary border-secondary"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Movimientos</div>
                                                        <div class="stat-digit">Sección II</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-secondary btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_3">
                                        <a href="#" onclick="abrir('seccion_iii')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib"><i class="ti-briefcase text-warning border-warning"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Capacitación</div>
                                                        <div class="stat-digit">Sección III</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-warning btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_4">
                                        <a href="#" onclick="abrir('seccion_iv')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib "><i class="ti-money text-danger border-danger"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Remuneración Personal</div>
                                                        <div class="stat-digit">Sección IV</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-danger btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_5">
                                        <a href="#" onclick="abrir('seccion_v')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib "><i class="ti-home text-info border-info"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Remuneración Familiar</div>
                                                        <div class="stat-digit">Sección V</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-info btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_6">
                                        <a href="#" onclick="abrir('seccion_vi')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib "><i class="ti-bookmark-alt text-dark border-dark"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Constancia de Haberes</div>
                                                        <div class="stat-digit">Sección VI</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-dark btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_7">
                                        <a href="#" onclick="abrir('seccion_vii')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib "><i class="ti-files text-success border-success"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Evaluaciones</div>
                                                        <div class="stat-digit">Sección VII</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_8">
                                        <a href="#" onclick="abrir('seccion_viii')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib "><i class="ti-thumb-down text-warning border-warning"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Deméritos</div>
                                                        <div class="stat-digit">Sección VIII</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-warning btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_9">
                                        <a href="#" onclick="abrir('seccion_ix')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib "><i class="ti-cup text-danger border-danger"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Méritos</div>
                                                        <div class="stat-digit">Sección IX</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-danger btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_10">
                                        <a href="#" onclick="abrir('seccion_x')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib "><i class="ti-clip text-secondary border-secondary"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Otros</div>
                                                        <div class="stat-digit">Sección X</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-secondary btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_11">
                                        <a href="#" onclick="abrir('seccion_xi')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib "><i class="ti-write text-dark border-dark"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Licencias Particulares</div>
                                                        <div class="stat-digit">Sección XI</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-dark btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_12">
                                        <a href="#" onclick="abrir('seccion_xii')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib "><i class="ti-gallery text-success border-success"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Lic. Person. y Vacac.</div>
                                                        <div class="stat-digit">Sección XII</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-success btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_13">
                                        <a href="#" onclick="abrir('seccion_xiii')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib "><i class="ti-wheelchair text-info border-info"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Lic. por Enfermedad</div>
                                                        <div class="stat-digit">Sección XIII</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                               <!--  <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-info btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                             </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 seccion_14">
                                        <a href="#" onclick="abrir('seccion_informe')">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-one">
                                                    <div class="stat-icon dib "><i class="ti-wheelchair text-info border-info"></i></div>
                                                    <div class="stat-content dib">
                                                        <div class="stat-text">Generación de informes</div>
                                                        <div class="stat-digit">Reportes</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <!-- <div class="text-right">&nbsp;&nbsp; <a href="#" target="modal" class="btn btn-outline-info btn-sm"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Historial</a></div> -->
                                             </div>
                                        </div></a>
                                    </div>
                                </div>



<!-- SECCIONES DEL LEGAJO -->
                                <div class="seccion_informe col-sm-12 row" style="display: none;">
                                    <div class="subir_informe col-md-12" style="display: none;">
                                        <form method="POST" action="informe.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion1">
                                                
                                                <div class="text-right col-md-12">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Asunto</div>
                                                            <input type="text" id="inf_asunto" name="inf_asunto" placeholder="Asunto del informe" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Referencia  <small class="form-text text-muted"> ¿Qué documentos adjunta? </small> </div>
                                                            <textarea class="form-inline" name="referencia_adj" id="referencia_adj" cols="100%" rows="5"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"> Emisor del informe </div>
                                                            <input type="text" id="inf_emisor" name="inf_emisor" placeholder="Ingrese sólo sus iniciales" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Descargar informe</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('informe')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Emitir informe</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Informes emitidos</th>
                                                <th>Emitido por</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="INFORMES";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/INFORMES");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION1/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="seccion_i col-sm-12 row" style="display: none;">
                                    <div class="subir_i col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion1">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION1">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('i')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION1";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION1");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION1/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                    

                                </div>

                                <div class="seccion_ii col-sm-12 row" style="display: none;">
                                    <div class="subir_ii col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion2">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION2">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('ii')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION2";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION2");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION2/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="seccion_iii col-sm-12 row" style="display: none;">
                                    <div class="subir_iii col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion3">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION3">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('iii')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION3";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION3");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION3/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="seccion_iv col-sm-12 row" style="display: none;">
                                    <div class="subir_iv col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">
                                            <div class="col-md-12 row" id="seccion4">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION4">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('iv')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION4";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION4");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION4/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="seccion_v col-sm-12 row" style="display: none;">
                                    <div class="subir_v col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion5">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION5">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('v')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION5";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION5");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION5/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="seccion_vi col-sm-12 row" style="display: none;">
                                    <div class="subir_vi col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion6">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION6">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('vi')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION6";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION6");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION6/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="seccion_vii col-sm-12 row" style="display: none;">
                                    <div class="subir_vii col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion7">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION7">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('vii')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION7";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION7");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION7/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="seccion_viii col-sm-12 row" style="display: none;">
                                    <div class="subir_viii col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion8">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION8">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('viii')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION8";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION8");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION8/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="seccion_ix col-sm-12 row" style="display: none;">
                                    <div class="subir_ix col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion9">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION9">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('ix')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION9";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION9");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION9/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="seccion_x col-sm-12 row" style="display: none;">
                                    <div class="subir_x col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion10">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION10">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('x')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION10";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION10");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION10/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="seccion_xi col-sm-12 row" style="display: none;">
                                    <div class="subir_xi col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion11">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION11">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('xi')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION11";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION11");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION11/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="seccion_xii col-sm-12 row" style="display: none;">
                                    <div class="subir_xii col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion12">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION12">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('xii')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION12";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION12");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION12/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="seccion_xiii col-sm-12 row" style="display: none;">
                                    <div class="subir_xiii col-md-12" style="display: none;">
                                        <form method="POST" action="procesos/agregar_documentos.php" enctype="multipart/form-data">


                                            <div class="col-md-12 row" id="seccion13">
                                                <div class="file-upload col-md-6">
                                                <div class="archivo-upload-wrap" style="  margin-top: 20px; margin-left: 15px; border: 2px dashed #579EBD; position: relative;">
                                                    <input class="archivo-upload-input" type='file' onchange="ar_readURL(this);" accept="application/pdf" style="position: absolute;  margin: 0;  padding: 0;  width: 100%;  height: 100%;  outline: none;  opacity: 0;  cursor: pointer;" name="file" id="exampleInputFile" />
                                                    <div class="drag-text">
                                                      <h4 class="text-center" style="padding: 60px 0; margin-left: 20px;margin-right: 20px;"><small>Arrastre o click aquí para cargar su archivo</small></h4>
                                                    </div>
                                                </div>
                                                <div class="archivo-upload-content" style="display: none;  text-align: center;">
                                                    
                                                    <img class="rounded-circle mx-auto d-block" src="images/pdf.png" height="100px" width="150px" >
                                                    <div class="archivo-title-wrap">
                                                      <button type="button" onclick="ar_removeUpload()" class="remove-image btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>&nbsp;Eliminar <span class="archivo-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                                
                                                </div>

                                                <div class="text-right col-md-6">
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre</div>
                                                            <input type="text" id="nom_doc" name="nom_doc" placeholder="Nombre del documento" class="form-control" required >
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Descripción del documento</div>
                                                            <textarea class="form-inline" name="descrip" id="descrip" cols="100%" rows="3"></textarea>
                                                        </div>
                                                    </div><br>
                                                    <input type="hidden" id="dni" name="dni" value="<?php echo $dni;?>">
                                                    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                                                    <input type="hidden" id="seccion" name="seccion" value="SECCION13">
                                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim;?>">
                                                    <button class="btn btn-primary" type="submit">Cargar documento</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="opcion1 col-xs-12 col-md-12">
                                        <div class="subir col-sm-12 text-right"><a href="#" onclick="subir('xiii')" class="btn btn-primary" ><i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;Subir documento</a></div> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th scope="col">Documentos</th>
                                                <th scope="col">Herramientas</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $seccion="SECCION13";
                                                $docs="SELECT * FROM documentos WHERE idmovim='".$idmovim."' AND seccion='".$seccion."' ";
                                                $query=pg_query($con,$docs);
                                                while ($row=pg_fetch_array($query)) {
                                                    # code...
                                                    $nom_doc=$row['nom_doc'];
                                                    $descrip=$row['descrip'];
                                                    $ruta_doc=$row['ruta_doc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nom_doc;?> <br> <small class="form-text text-muted"><?php echo $descrip;?></small></td>
                                                    <td class="text-center"> <a href="<?php echo $ruta_doc;?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table> <br>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Documento</th>
                                                    <!-- <th scope="col">Última modif.</th> -->
                                                    <th scope="col">Herramientas</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $archivos=scandir("pdfs/".$dni."-".$nombre."/SECCION13");
                                                for ($i=2; $i < count($archivos); $i++) { 
                                                    # code...
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $archivos[$i];?></td>
                                                    <!-- <td>[Fecha] <br>[Hora] <br> [Usuario]</td> -->
                                                    <td class="text-center">
                                                        <a href="pdfs/<?php echo $dni;?>-<?php echo $nombre?>/SECCION13/<?php echo $archivos[$i];?>" target="_blank" class="btn btn-sm btn-outline-secondary" ><i class="fa fa-file-o"></i>&nbsp;&nbsp;Visualizar</a>
                                                    </td>           
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

<!-- FIN DE SECCIONES DE LEGAJO -->

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
        <script src="assets/js/funciones.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

    <!-- Cargar imagenes -->
        <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="assets/js/images.js"></script>
    <!-- Fin cargar imagenes -->

    <!-- Cargar archivos -->
        <script src="assets/js/archivos.js"></script>
    <!-- Fin cargar archivos -->
    
    <!-- Al recargar la pagina mantiene la posicion actual -->
    <script>
    window.onload=function(){
    var pos=window.name || 0;
    window.scrollTo(0,pos);
    }
    window.onunload=function(){
    window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
    }
    </script>
    <!-- Fin -->

    </body>
    </html>
