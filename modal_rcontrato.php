<div class="modal fade" id="fin_contrato" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="mediumModalLabel">Agregar renuncia</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form action="procesos/agregar_rcontrato.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Contrato</label></div>
                                            <div class="col-12 col-md-9"><select name="rcontrato" id="rcontrato" class="form-control-sm form-control">
                                                    <?php
                                                        $sql="SELECT * FROM cas_contratos WHERE idcas= $id_cas";
                                                        $res=pg_query($con,$sql);
                                                        while ($rw= pg_fetch_array($res)){
                                                            $id_contrato=$rw['id_contrato'];
                                                        echo "<option value=".$rw["id_contrato"]."> CAS N° ".$rw["nro_contrato"]."</option> ";
                                                            
                                                        } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Resol. N°</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="nro_resol" name="nro_resol" placeholder="Ejemplo: '008-2017'" class="form-control">
                                            </div><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Fecha renuncia</label></div>
                                            <div class="col-12 col-md-9"><input type="date" id="f_renun" name="f_renun" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <input type="hidden" id="f_reg" name="f_reg" value="<?php echo date('d/m/Y');?>">

                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Renuncia</button>
                                </div>
                                            
                                </form>
                        </div>
                    </div>
                </div>
            </div>