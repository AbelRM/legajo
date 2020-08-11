<div class="modal fade" id="beca" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="mediumModalLabel">Nueva becas/estudios o capacitación</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form action="procesos/agregar_becas.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                    
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">N° Memo o <br>Resolución</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="memo" name="memo" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Naturaleza o Motivo</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="motivo" name="motivo"  class="form-control"></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre del evento</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nom_evento" name="nom_evento" placeholder="AÑo de la publicación" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fecha</label></div>
                                        <div class="col-12 col-md-4"><input type="date" id="f_beca" name="f_beca"  class="form-control"></div>
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