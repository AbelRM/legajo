<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<?php include 'head.html'; ?>

    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
<body>
    <!-- Left Panel -->
    <?php include 'aside.html';
    include 'modal_pad.php';
    include 'modal_especializacion.html';
    include 'modal_padres.html';
    include 'modal_conyuge.html';
    include 'modal_hijos.html' ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'header.html';?>
        <!-- Header-->

        <div class="content">


                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Ingreso de Personal CAS</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted m-b-15">Busque al trabajador por su DNI, le aparecerá el registro de movimientos del trabajador en la tabla y podrá ingresar un nuevo movimiento mediante el botón <code>+ Nuevo movimiento</code></p>

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#busq_dni" role="tab" aria-controls="home" aria-selected="true">Búsqueda</a>
                                        </li>
                                        
                                    </ul><br>
                                    <div class="tab-content pl-3 p-1" id="myTabContent">
                                        <div class="tab-pane fade show active" id="busq_dni" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row"><br><br><br>
                                                <div class="col-md-12 text-right">
                                                    <a href="nuevo_cas.php" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp;Nuevo personal CAS</a>
                                                    
                                                </div> <br><br>
                                                <div class="col-md-12">
                                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombres y Apellidos</th>
                                                                <th>DNI</th>
                                                                <th>Tiempo de servicio</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                include 'conexion.php';
                                                                // $sql="SELECT * FROM  personal_cas  INNER JOIN cliente  ON proforma.id_cliente=cliente.id_cliente";
                                                                $sql="SELECT *FROM personal_cas";
                                                                $query = mysqli_query($conn, $sql);
                                                                while ($row=mysqli_fetch_array($query)){
                                                                $id_cas=$row['id_cas'];
                                                                $t_servicio=$row['t_servicio'];
                                                                $dni=$row['dni'];
                                                                $nombres=$row['nombres'].' '.$row['apellidos'];
                                                            ?>  
                                                            <tr>
                                                                <td><?php echo $nombres; ?></td>
                                                                <td><?php echo $dni; ?></td>
                                                                <td><?php echo $t_servicio?></td>
                                                                <td class='text-center'>
                                                                <form method="post" action="ver_cas.php">
                                                                <input type="hidden" value="<?php echo $id_cas ;?>" name="id_cas">                        
                                                                <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-mail-forward"></i>&nbsp; Visualizar</button>
                                                                </form>
                                                                </td> 
                                                                
                                                                
                                                                <!-- onclick="agregar('<?php echo $id_servicio ?>')" -->
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                                        
                                                    </table>
                                                    <br><br>
                                                </div>
                                            </div>
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


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    </body>
    </html>
