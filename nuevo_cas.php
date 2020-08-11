<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<?php include 'head.html'; ?>
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
                                <h4>Registro de Personal CAS</h4>
                            </div>
                            <div class="card-body">
                                <form action="procesos/guardar_cas.php" method="post" class="">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="input-group">
                                                <div class="input-group-addon">Nombres</div>
                                                <input type="text" id="nombres" name="nombres" class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="input-group">
                                                <div class="input-group-addon">Apellidos</div>
                                                <input type="text" id="apellidos" name="apellidos" class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div><br><br>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <div class="input-group-addon">DNI</div>
                                                <input type="text" id="dni" name="dni" class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">Cargo</div>
                                                <input type="text" id="cargo" name="cargo" class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <div class="input-group-addon">Profesión</div>
                                                <input type="text" id="profesion" name="profesion" class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        
                                    </div><br>
                                    
                                    <div class="text-right"><button type="submit" class="btn btn-secondary btn-sm">Guardar</button></div>
                            </form>

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
