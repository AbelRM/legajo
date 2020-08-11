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
                                <h4>Registro de Recurso Impugnativo</h4>
                            </div>
                            <div class="card-body">
                                <form action="#" method="post" class="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="input-group-addon">Documento</div>
                                                <input type="text" id="username3" name="username3" class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="input-group-addon">Fecha de documento</div>
                                                <input type="date" id="username3" name="username3" class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div><br><br>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">R. Impugnativo</div>
                                                <select name="" id="" data-placeholder="Sexo" class="form-control">
                                                                                    <option value="0">Seleccionar</option>
                                                                                    <option value="">Apelación</option>
                                                                                    <option value="">Anular</option>
                                                                                    <option value="">Rectificar</option>
                                                                                    <option value="">Reducir</option>
                                                                                    <option value="">Reconsideración</option>
                                                                                </select>
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">Declarado</div>
                                                <select name="" id="" data-placeholder="Sexo" class="form-control">
                                                                                    <option value="0">Seleccionar</option>
                                                                                    <option value="">Procedente</option>
                                                                                    <option value="">Improcedente</option>
                                                                                </select>
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">Archivo</div>
                                                <input type="text" id="username3" name="username3" class="form-control">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div><br><br>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-addon">Detalle</div>
                                                <textarea name="" id="" cols="105" rows="3"></textarea>
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                    </div><br>
                                    
                                    <button type="submit" class="btn btn-secondary btn-sm">Enviar</button>
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
