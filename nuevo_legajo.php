<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<?php 
include 'conexion_pg.php';
include 'head.html'; ?>
</head>
<body>
    <!-- Left Panel -->
    <?php include 'aside.html';
    include 'modal_educacion.php';
    include 'modal_especializacion.php';
    include 'modal_padres.php';
    include 'modal_conyuge.php';
    include 'modal_hijos.php' ?>

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
                                <h4>Ingreso de Datos Personales</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted m-b-15">Ingrese cuidadosamente los datos de la ficha de actualización de datos, de la SECCION I del escalafón de los trabajadores. </p>

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="home" aria-selected="true">Identificación <br>Personal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="instruccion-tab" data-toggle="tab" href="#instruccion" role="tab" aria-controls="profile" aria-selected="false">Datos de <br>instrucción</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="familiar-tab" data-toggle="tab" href="#familiar" role="tab" aria-controls="contact" aria-selected="false">Datos <br>familiares</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="capacitaciones-tab" data-toggle="tab" href="#capacitaciones" role="tab" aria-controls="contact" aria-selected="false">Capacitaciones</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="becas-tab" data-toggle="tab" href="#becas" role="tab" aria-controls="contact" aria-selected="false">Becas/<br>Estudios</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="produccion-tab" data-toggle="tab" href="#produccion" role="tab" aria-controls="contact" aria-selected="false">Prod. Intelectual <br>y Cultural</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="idiomas-tab" data-toggle="tab" href="#idiomas" role="tab" aria-controls="contact" aria-selected="false">Idiomas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="experiencia-tab" data-toggle="tab" href="#experiencia" role="tab" aria-controls="contact" aria-selected="false">Experiencia <br> Laboral</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pl-3 p-1" id="myTabContent">
                                        <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12"><br>
                                                    <form action="procesos/agregar_identpers.php" method="post" class="">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Nombres</div>
                                                                                <input type="text" id="nombres" name="nombres" placeholder="Nombres" class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Ap. Paterno</div>
                                                                                <input type="text" id="ape_paterno" name="ape_paterno" placeholder="Apellido paterno" class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Ap. Materno</div>
                                                                                <input type="text" id="ape_materno" name="ape_materno" placeholder="Apellido Materno" class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Sexo</div>
                                                                                
                                                                                <select name="sexo" id="sexo" data-placeholder="Sexo" class="form-control" required>
                                                                                    <option value="1">Femenino</option>
                                                                                    <option value="2">Masculino</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Dni</div>
                                                                                <input type="text" id="dni" name="dni" placeholder="DNI" class="form-control" required minlength="8" maxlength="8">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Libreta M.</div>
                                                                                <input type="text" id="lib_militar" name="lib_militar" placeholder="Libreta militar" class="form-control" maxlength="10" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">CIIT</div>
                                                                                <input type="text" id="autogenerado" name="autogenerado" placeholder="Autogenerado" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">N° Brevete</div>
                                                                                <input type="text" id="brevete" name="brevete" placeholder="Nro Brevete" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-5">Estado civil</div>
                                                                                <div class="col-md-7" style="padding: 0;margin: 0;">
                                                                                    <select name="e_civil" id="e_civil" data-placeholder="Estado civil" class="form-control">
                                                                                <?php
                                                                                $sql="SELECT * FROM t_ecivil";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codeciv"].">".$rw["ecivil"]."</option> ";
                                                                                } 
                                                                                // completar lo de provincia y departamento
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">F. Nacimiento</div>
                                                                                <input type="date" id="nac_fecha" name="nac_fecha" placeholder="Fecha de nacimiento" class="form-control" required> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Cel #1</div>
                                                                                <input type="text" id="celular1" name="celular1" placeholder="Celular 1" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Cel #2</div>
                                                                                <input type="text" id="celular2" name="celular2" placeholder="Celular 2" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Correo</div>
                                                                                <input type="text" id="correo" name="correo" placeholder="Correo" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Grupo Sanguíneo</div>
                                                                                <input type="text" id="g_sanguineo" name="g_sanguineo" placeholder="Ex. O +" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Teléfono</div>
                                                                                <input type="text" id="telefono" name="telefono" placeholder="Teléfono" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Fecha de registro</div>
                                                                                <input type="text" id="f_registro" name="f_registro" placeholder="Fecha de registro" class="form-control" value="<?php echo date("d/m/Y");?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12"> Lugar de nacimiento<hr></div>
                                                                    
                                                                  <!--  <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                                <input type="text" id="nac_depart" name="nac_depart" placeholder="Depart. nacimien." class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->

                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-6">Departamento</div>
                                                                                <div class="col-md-6" style="padding: 0;margin: 0;">
                                                                                    <select name="nac_depart" id="nac_depart" data-placeholder="Depart. nacimien." class="form-control standardSelect" required> 
                                                                                        <!-- class: standardSelect -->
                                                                                <?php
                                                                                $sql="SELECT * FROM t_distritos";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codubig"].">".$rw["des_dpto"]."</option> ";
                                                                                } 
                                                                               
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                <!--    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                                <input type="text" id="nac_provincia" name="nac_provincia" placeholder="Provincia nacimien." class="form-control" readonly >
                                                                            </div>
                                                                        </div>
                                                                    </div> -->

                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-6">Provincia</div>
                                                                                <div class="col-md-6" style="padding: 0;margin: 0;">
                                                                                    <select name="nac_provincia" id="nac_provincia" data-placeholder="Provincia nacimien." class="form-control standardSelect" required> 
                                                                                        <!-- class: standardSelect -->
                                                                                <?php
                                                                                $sql="SELECT * FROM t_distritos";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codubig"].">".$rw["des_prov"]."</option> ";
                                                                                } 
                                                                               
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-4">Distrito</div>
                                                                                <div class="col-md-8" style="padding: 0;margin: 0;">
                                                                                    <select name="nac_distrito" id="nac_distrito" data-placeholder="Distrito nacimien." class="form-control standardSelect" required> 
                                                                                        <!-- class: standardSelect -->
                                                                                <?php
                                                                                $sql="SELECT * FROM t_distritos";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codubig"].">".$rw["des_dist"]."</option> ";
                                                                                } 
                                                                                // completar lo de provincia y departamento
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    

                                                                    <div class="col-md-12"> Domicilio actual<hr></div>
                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Domicilio (Av. Calle. Psje./N° Km. Mz. )</div>
                                                                                <input type="text" id="domicilio" name="domicilio" placeholder="Dirección completa" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-4">Distrito</div>
                                                                                <div class="col-md-8" style="padding: 0;margin: 0;">
                                                                                    <select name="distrito" id="distrito" data-placeholder="Distrito vive" class="form-control standardSelect"> 
                                                                                <?php
                                                                                $sql="SELECT * FROM t_distritos";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codubig"].">".$rw["des_dist"]."</option> ";
                                                                                } 
                                                                                // completar lo de provincia y departamento
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                                <input type="text" id="provincia" name="provincia" placeholder="Provincia" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                                                                <input type="text" id="departamento" name="departamento" placeholder="Departamento" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <hr>
                                                                    </div>

                                                                    <div class="col-sm-12 col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-2">Área de trabajo</div>
                                                                                <div class="col-md-10" style="padding: 0;margin: 0;">
                                                                                    <select name="a_trabajo" id="a_trabajo" data-placeholder="Área de trabajo" class="form-control standardSelect">
                                                                                <?php
                                                                                $sql="SELECT * FROM t_ubicas";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codofic"].">".$rw["oficestr"]." - ".$rw["estruc1"]."</option> ";
                                                                                } 
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-3">Cargo</div>
                                                                                <div class="col-md-9" style="padding: 0;margin: 0;">
                                                                                    <select name="cargo" id="cargo" data-placeholder="Cargo" class="form-control standardSelect" >
                                                                                <?php
                                                                                $sql="SELECT * FROM t_cargo";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codcar"].">".$rw["descar"]."</option> ";
                                                                                } 
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-3">Nivel</div>
                                                                                <div class="col-md-9" style="padding: 0;margin: 0;">
                                                                                    <select name="nivel" id="nivel" data-placeholder="Nivel" class="form-control standardSelect">
                                                                                <?php
                                                                                $sql="SELECT * FROM t_nivel";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codnivel"].">".$rw["denom"]." - ".$rw["tiptrab"]."</option> ";
                                                                                } 
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">F. de ingreso</div>
                                                                                <input type="date" id="f_ingreso" name="f_ingreso" placeholder="Fecha de ingreso" class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Código de plaza</div>
                                                                                <input type="text" id="cod_plaza" name="cod_plaza" placeholder="Ej. 024-2019" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12 col-md-4">
                                                                        <!-- REVISAR TABLA DE ENLACE -->
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-6">Situación laboral</div>
                                                                                <div class="col-md-6" style="padding: 0;margin: 0;">
                                                                                    <select name="s_laboral" id="s_laboral" data-placeholder="Régimen de pensión" class="form-control"> 
                                                                                <?php
                                                                                $sql="SELECT * FROM t_sitlab";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codsit"].">".$rw["situacion"]."</option> ";
                                                                                } 
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-7">Régimen de pensión</div>
                                                                                <div class="col-md-5" style="padding: 0;margin: 0;">
                                                                                    <select name="r_pension" id="r_pension" data-placeholder="Régimen de pensión" class="form-control"> 
                                                                                <?php
                                                                                $sql="SELECT * FROM t_regp";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codregp"].">".$rw["regimen"]."</option> ";
                                                                                } 
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-6">En caso AFP</div>
                                                                                <div class="col-md-6" style="padding: 0;margin: 0;">
                                                                                    <select id="afp" name="afp" data-placeholder="En caso de AFP" class="form-control"> 
                                                                                <?php
                                                                                $sql="SELECT * FROM t_afp";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codafp"].">".$rw["afp"]."</option> ";
                                                                                } 
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Cond_plaza</div>
                                                                                <input type="text" id="cond_plaza" name="cond_plaza" placeholder="Condición de plaza" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-6">Tipo vivienda</div>
                                                                                <div class="col-md-6" style="padding: 0;margin: 0;">
                                                                                    <select type="text" id="casa" name="casa" placeholder="Casa" class="form-control"> 
                                                                                <?php
                                                                                $sql="SELECT * FROM t_casa";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codcasa"].">".$rw["tipocasa"]."</option> ";
                                                                                } 
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-5">Tipo de trabaj.</div>
                                                                                <div class="col-md-7" style="padding: 0;margin: 0;">
                                                                                    <select name="t_trabajador" id="t_trabajador"  class="form-control">
                                                                                <?php
                                                                                $sql="SELECT * FROM t_tipt";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codtipt"].">".$rw["tipotrab"]."</option> ";
                                                                                } 
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <div class="input-group-addon">Unid. Ejecutora</div>
                                                                                <input type="text" id="u_ejecutora" name="u_ejecutora" placeholder="Unid. Ejecutora" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group row" style="margin: 0;">
                                                                                <div class="input-group-addon col-md-5">Condición</div>
                                                                                <div class="col-md-7" style="padding: 0;margin: 0;">
                                                                                    <select name="condicion" id="condicion"  class="form-control">
                                                                                <?php
                                                                                $sql="SELECT * FROM t_condlab";
                                                                                $res=pg_query($con,$sql);
                                                                                while ($rw= pg_fetch_array($res)){
                                                                                    echo "<option value=".$rw["codcondlab"].">".$rw["detalle"]."</option> ";
                                                                                } 
                                                                                ?>
                                                                                </select>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <hr>
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                                
                                                                <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-sm">Enviar</button></div>
                                                            </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="instruccion" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <br><button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#educacion"><i class="fa fa-lightbulb-o"></i>&nbsp; Agregar nivel educativo</button>
                                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#especializacion"><i class="fa fa-lightbulb-o"></i>&nbsp; Agregar especialización</button><br><br>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <table class="table">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Nivel educativo</th>
                                                                  <th scope="col">Tipo de centro <br>de estudios</th>
                                                                  <th scope="col">Nombre del centro de estudios</th>
                                                                  <th scope="col">Condición <br>actual</th>
                                                                  <th scope="col">Profesión /<br>Título obtenido</th>
                                                                  <th scope="col">Fecha</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Universidad</td>
                                                                <td>Estatal</td>
                                                                <td>Nombre</td>
                                                                <td>Bachiller</td>
                                                                <td>Ing. en asdlkdsflk</td>
                                                                <td>dd/mm/aa</td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Primaria</td>
                                                                <td>Privado</td>
                                                                <td>Nombre del centro de estudios</td>
                                                                <td>Bachiller</td>
                                                                <td>Ing. en asdlkdsflk</td>
                                                                <td>dd/mm/aa</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Secundaria</td>
                                                                <td>Correspondencia</td>
                                                                <td>Nombre del centro de estudios</td>
                                                                <td>Bachiller</td>
                                                                <td>Ing. en asdlkdsflk</td>
                                                                <td>dd/mm/aa</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="familiar" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <br><button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#padres"><i class="fa fa-lightbulb-o"></i>&nbsp; Agregar padres</button>
                                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#conyuge"><i class="fa fa-lightbulb-o"></i>&nbsp; Agregar cónyuge</button>
                                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#hijos"><i class="fa fa-lightbulb-o"></i>&nbsp; Agregar hijos</button><br><br>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <table class="table">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                  <th scope="col">#</th>
                                                                  <th scope="col">Tipo de parentezco</th>
                                                                  <th scope="col">Nombres y apellidos</th>
                                                                  <th scope="col">Situación</th>
                                                                  <th scope="col">Herramientas</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Padre</td>
                                                                <td>Nombre completo</td>
                                                                <td>Vivo</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Modificar</button>
                                                                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Eliminar</button>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Madre</td>
                                                                <td>Nombre completo</td>
                                                                <td>Fallecido(a)</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Modificar</button>
                                                                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Eliminar</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Hijo(a)</td>
                                                                <td>Nombre completo</td>
                                                                <td>Vivo</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Modificar</button>
                                                                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-lightbulb-o"></i>&nbsp; Eliminar</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="capacitaciones" role="tabpanel" aria-labelledby="contact-tab">
                                            <h3>Capacitaciones</h3>
                                            <p>Some content here.</p>
                                        </div>
                                        <div class="tab-pane fade" id="becas" role="tabpanel" aria-labelledby="contact-tab">
                                            <h3>Becas</h3>
                                            <p>Some content here.</p>
                                        </div>
                                        <div class="tab-pane fade" id="produccion" role="tabpanel" aria-labelledby="contact-tab">
                                            <h3>Produccion</h3>
                                            <p>Some content here.</p>
                                        </div>
                                        <div class="tab-pane fade" id="idiomas" role="tabpanel" aria-labelledby="contact-tab">
                                            <h3>Idioma</h3>
                                            <p>Some content here.</p>
                                        </div>
                                        <div class="tab-pane fade" id="experiencia" role="tabpanel" aria-labelledby="contact-tab">
                                            <h3>Expe</h3>
                                            <p>Some content here.</p>
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
        <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

        <script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>


    </body>
    </html>
