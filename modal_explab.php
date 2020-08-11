<div class="modal fade" id="exp_laboral" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="mediumModalLabel">Agregar Experiencia Laboral</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form action="procesos/agregar_explab.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                    
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Especialidad</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="especialidad" name="especialidad" placeholder="" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Entidad</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="entidad" name="entidad" placeholder="Ingrese donde laboró" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fecha</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="fecha" name="fecha" placeholder="Ej. 2010-2015" class="form-control"></div>
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