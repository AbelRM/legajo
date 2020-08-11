<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<?php include 'head.html'; ?>
<body>
    <!-- Left Panel -->
    <?php include 'aside.html'; ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include 'header.html';?>
        <!-- Header-->

        <div class="content">  


                

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Nuevo CAS</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted m-b-15">Ingrese cuidadosamente los datos del nuevo trabajador bajo régimen CAS.</p>

                                <form action="procesos/agregar_cas.php" method="POST">
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombres</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nombres" name="nombres" class="form-control" required><small class="form-text text-muted">Nombres completos</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Ape. Paterno</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ape_pat" name="ape_pat" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Ape. Materno</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ape_mat" name="ape_mat" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">DNI</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="dni" name="dni" class="form-control" maxlength="8" minlength="8" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Celular</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="cel" name="cel" class="form-control" maxlength="9" minlength="9" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Domicilio</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="domic" name="domic" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Correo</label></div>
                                        <div class="col-12 col-md-9"><input type="email" id="correo" name="correo" class="form-control" placeholder="example@example.com" required></div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i> Agregar
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


    </body>
    </html>
