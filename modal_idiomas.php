<div class="modal fade" id="idioma" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="mediumModalLabel">Nueva becas/estudios o capacitación</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form action="procesos/agregar_idioma.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                    
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Idioma</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="idioma" name="idioma" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Habla</label></div>
                                        <div class="col-12 col-md-4"><select name="habla" id="habla" class="form-control-sm form-control">
                                            <option value="0">Seleccionar</option>
                                            <option value="1">Básico</option>
                                            <option value="2">Intermedio</option>
                                            <option value="3">Avanzado</option>
                                        </select></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Lee</label></div>
                                        <div class="col-12 col-md-4"><select name="lee" id="lee" class="form-control-sm form-control">
                                            <option value="0">Seleccionar</option>
                                            <option value="1">Básico</option>
                                            <option value="2">Intermedio</option>
                                            <option value="3">Avanzado</option>
                                        </select></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Escribe</label></div>
                                        <div class="col-12 col-md-4"><select name="escribe" id="escribe" class="form-control-sm form-control">
                                            <option value="0">Seleccionar</option>
                                            <option value="1">Básico</option>
                                            <option value="2">Intermedio</option>
                                            <option value="3">Avanzado</option>
                                        </select></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Lugar de Estudios</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="lugar" name="lugar" class="form-control"></div>
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