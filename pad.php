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
                                <h4>Ingreso de Sanciones PAD</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted m-b-15">Busque al trabajador por su DNI, le aparecerá el registro de movimientos del trabajador en la tabla y podrá ingresar un nuevo movimiento mediante el botón <code>+ Nuevo movimiento</code></p>

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#busq_dni" role="tab" aria-controls="home" aria-selected="true">Búsqueda</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content pl-3 p-1" id="myTabContent">
                                        <div class="tab-pane fade show active" id="busq_dni" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-6 text-center"><br>
                                                    <div class="input-group">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-primary">
                                                                <i class="fa fa-search"></i> Buscar
                                                            </button>
                                                        </div>
                                                        <input type="text" id="input1-group2" name="input1-group2" placeholder="DNI del trabajador" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-6 text-center"><br>
                                                    <div class="input-group">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-primary">
                                                                <i class="fa fa-search"></i> Buscar
                                                            </button>
                                                        </div>
                                                        <input type="text" id="input1-group2" name="input1-group2" placeholder="Nombre del trabajador" class="form-control">
                                                    </div>
                                                </div><br><br><br>
                                                <div class="col-md-12 text-right">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#movimiento"><i class="fa fa-lightbulb-o"></i>&nbsp; Nueva Sanción PAD</button>
                                                </div> <br><br>
                                                <div class="col-md-12">
                                                    <table class="table">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Estado Actual</th>
                                                                  <th scope="col">Documento</th>
                                                                  <th scope="col">Fecha de efectividad</th>
                                                                  <th scope="col">Herramientas</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Sancionado</td>
                                                                <td>R.D. 025-DGHR-RRHH-TACNA</td>
                                                                <td>15/06/2018</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Visualizar</button>
                                                                    <a href="proc_impugnativo.php" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp;Abrir Recur. Impugnativo</a>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>En evaluación</td>
                                                                <td>R.D. 025-DGHR-RRHH-TACNA</td>
                                                                <td>23/02/2005</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Visualizar</button>
                                                                    <a href="proc_impugnativo.php" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp;Abrir Recur. Impugnativo</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Sancionado</td>
                                                                <td>R.D. 025-DGHR-RRHH-TACNA</td>
                                                                <td>06/08/1997</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Visualizar</button>
                                                                    <a href="proc_impugnativo.php" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp;Abrir Recur. Impugnativo</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="busq_nombre" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-sm-12 col-lg-4 text-center"><br>
                                                    <div class="input-group">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-primary">
                                                                <i class="fa fa-search"></i> Buscar
                                                            </button>
                                                        </div>
                                                        <input type="text" id="input1-group2" name="input1-group2" placeholder="Nombres y/o Apellidos del trabajador" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4"></div><br><br><br>
                                                <div class="col-md-12 text-right">
                                                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Nuevo movimiento</button>
                                                </div> <br><br>
                                                <div class="col-md-12">
                                                    <table class="table">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Acción</th>
                                                                  <th scope="col">Documento</th>
                                                                  <th scope="col">Fecha de efectividad</th>
                                                                  <th scope="col">Herramientas</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Rotación</td>
                                                                <td>R.D. 025-DGHR-RRHH-TACNA</td>
                                                                <td>15/06/2018</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Visualizar</button>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Destaque</td>
                                                                <td>R.D. 025-DGHR-RRHH-TACNA</td>
                                                                <td>23/02/2005</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Visualizar</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Permuta</td>
                                                                <td>R.D. 025-DGHR-RRHH-TACNA</td>
                                                                <td>06/08/1997</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Visualizar</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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


    </body>
    </html>
