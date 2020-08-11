<div class="modal fade" id="especializacion" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="mediumModalLabel">Especialización</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form action="procesos/agregar_especializ.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Tipo</label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="t_especializ" id="t_especializ" class="form-control-sm form-control">
                                                    <?php
                                                $sql="SELECT * FROM t_detbsb";
                                                $res=pg_query($con,$sql);
                                                while ($rw= pg_fetch_array($res)){
                                                echo "<option value=".$rw["coddetbsb"].">".$rw["detalle"]."</option> ";
                                                } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-4"><label for="text-input" class=" form-control-label">Año</label></div>
                                            <div class="col-12 col-md-8"><input type="text" id="año_especializ" name="año_especializ" placeholder="Ingrese el año" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Especialización</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nom_especializ" name="nom_especializ" placeholder="Nombre del curso o especialización" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Procedencia</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nom_cestud" name="nom_cestud" placeholder="Nombre del centro de estudios" class="form-control"></div>
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