<div class="modal fade" id="contrato" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="mediumModalLabel">Ingresar Nuevo Contrato</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form action="procesos/agregar_contrato.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="selectSm" class=" form-control-label">CAS N°</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="nro_cas" name="nro_cas" placeholder="Ejemplo: '228-2017'" class="form-control">
                                            </div><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Cargo</label></div>
                                            <div class="col-12 col-md-9"><select name="profesion" id="profesion" class="form-control-sm form-control">
                                                    <?php
                                                        $sql="SELECT * FROM cargo_oprof";
                                                        $res=pg_query($con,$sql);
                                                        while ($rw= pg_fetch_array($res)){
                                                        echo "<option value=".$rw["cod_prof"].">".$rw["profesion"]."</option> ";
                                                        } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="row form-group">
                                        <div class="col col-md-2"><label for="selectSm" class=" form-control-label">Ubicación</label></div>
                                        <div class="col-md-10" >
                                            <select name="ubicacion" id="ubicacion" class="form-control standardSelect">
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
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Fecha inicio</label></div>
                                            <div class="col-12 col-md-7"><input type="date" id="f_inicio" name="f_inicio" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Fecha termino</label></div>
                                            <div class="col-12 col-md-7"><input type="date" id="f_fin" name="f_fin" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Remuneración</label></div>
                                            <div class="col-12 col-md-7"><input type="text" id="remun" name="remun" placeholder="Ejemplo: '2500'" class="form-control">
                                            </div><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Fuente</label></div>
                                            <div class="col-12 col-md-7"><input type="text" id="fuente" name="fuente" placeholder="Ejemplo: 'Recursos Ordinarios'" class="form-control">
                                            </div><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Meta</label></div>
                                            <div class="col-12 col-md-7"><input type="text" id="meta" name="meta" placeholder="Ejemplo: '0028'" class="form-control">
                                            </div><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-5"><label for="selectSm" class=" form-control-label">Tipo contrato</label></div>
                                            <div class="col-12 col-md-7">
                                            <select class="form-control" id="tip_contrato" name="tip_contrato">
                                                <option value="REGULAR">Contrato Regular</option>
                                                <option value="COVID-19">Contrato Covid</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <input type="hidden" id="id_cas" name="id_cas" value="<?php echo $id_cas ;?>">
                                    <input type="hidden" id="f_reg" name="f_reg" value="<?php echo date('d/m/Y');?>">
                                    <!-- <input type="hidden" id="h_reg" name="h_reg" value="<?php echo date('H:i:s');?>" > -->

                                    
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