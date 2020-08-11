<div class="modal fade" id="educacion" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="mediumModalLabel">Nivel Educativo</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form action="procesos/agregar_neduc.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Nivel Educativo</label></div>
                                            <div class="col-12 col-md-9">
                                                <select type="text" id="nivel_educat" name="nivel_educat" class="form-control"> 
                                                <?php
                                                $sql="SELECT * FROM t_niveleduc";
                                                $res=pg_query($con,$sql);
                                                while ($rw= pg_fetch_array($res)){
                                                echo "<option value=".$rw["codnivel"].">".$rw["nivel"]."</option> ";
                                                } 
                                                ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row form-group">
                                            <div class="col col-md-4"><label for="selectSm" class=" form-control-label">Centro de estudios</label></div>
                                            <div class="col-12 col-md-8">
                                                <select type="text" id="tipo_ce" name="tipo_ce" class="form-control"> 
                                                <?php
                                                $sql="SELECT * FROM t_tipoce";
                                                $res=pg_query($con,$sql);
                                                while ($rw= pg_fetch_array($res)){
                                                echo "<option value=".$rw["codce"].">".$rw["ceducativo"]."</option> ";
                                                } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Centro de Estudios</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nom_cestud" name="nom_cestud" placeholder="Nombre del Centro de Estudios" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Profesión / Título obtenido</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nom_profesion" name="nom_profesion" placeholder="Nombre de la profesión" class="form-control"></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 row">
                                        <div class="col col-md-4"><label for="text-input" class=" form-control-label">Condición actual</label></div>
                                        <div class="col-12 col-md-8">
                                                <select type="text" id="cond_a" name="cond_a" class="form-control"> 
                                                <?php
                                                $sql="SELECT * FROM t_cond";
                                                $res=pg_query($con,$sql);
                                                while ($rw= pg_fetch_array($res)){
                                                echo "<option value=".$rw["codca"].">".$rw["cactual"]."</option> ";
                                                } 
                                                ?>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 row">
                                        <div class="col col-md-4"><label for="text-input" class=" form-control-label">Fecha</label></div>
                                        <div class="col-12 col-md-8"><input type="date" id="f_educa" name="f_educa" placeholder="Nombre de la profesión" class="form-control"></div>
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