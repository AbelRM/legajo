<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<?php include 'head.html'; 
include 'conexion.php';
$id_cas = $_POST['id_cas'];?>
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
                                <h4>Personal CAS</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                $sql="SELECT * FROM  personal_cas  where id_cas=$id_cas";
                                            $query = mysqli_query($conn, $sql);
                                            while ($row=mysqli_fetch_array($query)){
                                            $nombres=$row['nombres'];
                                            $apellidos=$row['apellidos'];
                                            $dni=$row['dni'];
                                            $cargo=$row['cargo'];
                                            $profesion=$row['profesion'];

                                ?>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="input-group">
                                                <div class="input-group-addon">Nombres</div>
                                                <input type="text" value="<?php echo $nombres;?>" class="form-control" readonly>
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="input-group">
                                                <div class="input-group-addon">Apellidos</div>
                                                <input type="text" value="<?php echo $apellidos;?>" class="form-control" readonly>
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div><br><br>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <div class="input-group-addon">DNI</div>
                                                <input type="text" value="<?php echo $dni;?>" class="form-control" readonly>
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">Cargo</div>
                                                <input type="text" value="<?php echo $cargo;?>" class="form-control" readonly>
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <div class="input-group-addon">Profesión</div>
                                                <input type="text" value="<?php echo $profesion;?>" class="form-control" readonly>
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        
                                    </div><br> <?php };?>
                                    
                                   <div class="text-right"><a href="proc_impugnativo.php" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp;Nuevo contrato</a></div>

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


    </body>
    </html>
