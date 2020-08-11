<div class="modal fade" id="hijos" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="mediumModalLabel">Ingresar Hijo(a)</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form action="procesos/agregar_hijos.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Sexo</label></div>
                                            <div class="col-12 col-md-7"><select name="sexo" id="sexo" class="form-control-sm form-control">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1">Femenino</option>
                                                    <option value="2">Masculino</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">DNI</label></div>
                                            <div class="col-12 col-md-7"><input type="text" id="dni" name="dni" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="row form-group">
                                            <div class="col col-md-2"><label for="selectSm" class=" form-control-label">Nombres</label></div>
                                            <div class="col-12 col-md-10"><input type="text" id="nombres" name="nombres" placeholder="Primer Nombre" class="form-control">
                                            </div><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Apellido Paterno</label></div>
                                            <div class="col-12 col-md-7"><input type="text" id="ape_pat" name="ape_pat" placeholder="Apellido Paterno" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Apellido Materno</label></div>
                                            <div class="col-12 col-md-7"><input type="text" id="ape_mat" name="ape_mat" placeholder="Ingrese" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Fecha nacimiento</label></div>
                                            <div class="col-12 col-md-7"><input type="date" id="f_nac" name="f_nac" placeholder="Ingrese" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Distrito Nacimiento</label></div>
                                            <div class="col-12 col-md-7"><select name="nac_dist" id="nac_dist" data-placeholder="Distrito nacimien." class="form-control standardSelect" required> 
                                            <?php
                                            $sql="SELECT * FROM t_distritos";
                                            $res=pg_query($con,$sql);
                                                while ($rw= pg_fetch_array($res)){
                                                    echo "<option value=".$rw["codubig"].">".$rw["des_dist"]."</option> ";
                                                } 
                                            ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Provincia Nacimiento</label></div>
                                            <div class="col-12 col-md-7"><input type="text" id="text-input" name="text-input" placeholder="Ingrese" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Departamento Nacimiento</label></div>
                                            <div class="col-12 col-md-7"><input type="text" id="text-input" name="text-input" placeholder="Ingrese" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">N° Cert. Médico</label></div>
                                            <div class="col-12 col-md-7"><input type="text" id="cert_med" name="cert_med" placeholder="sólo por discapacidad" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">G. Instrucción</label></div>
                                            <div class="col-12 col-md-7"><select name="g_instruc" id="g_instruc" class="form-control-sm form-control">
                                                    <?php
                                                        $sql="SELECT * FROM t_ginst";
                                                        $res=pg_query($con,$sql);
                                                        while ($rw= pg_fetch_array($res)){
                                                        echo "<option value=".$rw["codginst"].">".$rw["ginst"]."</option> ";
                                                        } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col col-md-2"><label for="selectSm" class=" form-control-label">Domicilio</label></div>
                                             <?php
                                            $sql="SELECT * FROM ficha WHERE oid=$idmovim";
                                            $res=pg_query($con,$sql);
                                            $rw= pg_fetch_array($res);
                                            $domic=$rw['d1_domic'];
                                            ?>
                                            <div class="col-12 col-md-10"><input type="text" id="domicilio" name="domicilio" value="<?php echo $domic;?>" class="form-control"><small>*El domicilio por defecto es del trabajador, sin embargo es editable</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Distrito</label></div>
                                            <div class="col-12 col-md-7"><select name="dom_dist" id="dom_dist" data-placeholder="Distrito nacimien." class="form-control standardSelect" required> 
                                            <?php
                                            $sql="SELECT * FROM t_distritos";
                                            $res=pg_query($con,$sql);
                                                while ($rw= pg_fetch_array($res)){
                                                    echo "<option value=".$rw["codubig"].">".$rw["des_dist"]."</option> ";
                                                } 
                                            ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Provincia</label></div>
                                            <div class="col-12 col-md-7"><input type="text" id="text-input" name="text-input" placeholder="Ingrese" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Departamento</label></div>
                                            <div class="col-12 col-md-7"><input type="text" id="text-input" name="text-input" placeholder="Ingrese" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Situación</label></div>
                                            <div class="col-12 col-md-7"><select name="situacion" id="situacion" class="form-control-sm form-control">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1">Vivo</option>
                                                    <option value="2">Fallecido</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="idmovim" name="idmovim" value="<?php echo $idmovim ;?>">
                                    <input type="hidden" id="f_reg" name="f_reg" value="<?php echo date('d/m/Y');?>">
                                    <input type="hidden" id="h_reg" name="h_reg" value="<?php echo date('H:i:s');?>" >
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                                    
                                </form>
                        </div>
                        
                    </div>
                </div>
            </div>