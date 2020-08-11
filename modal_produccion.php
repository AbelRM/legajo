<div class="modal fade" id="produc" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="mediumModalLabel">Nueva producción intelectual y cultural</h5>
                        </div>
                        <div class="modal-body">
                            
                            <form action="procesos/agregar_produccion.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row">
                                    
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Investigación y/o <br> Publicación</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nom_invest" name="nom_invest" placeholder="Nombre de la investigación" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">R.D. de aprobación</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="rd_aprob" name="rd_aprob" placeholder="R.D. 054-2017" class="form-control"></div>
                                    </div>
                                    <div class="col-md-12 row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Año de publicación</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="anio" name="anio" placeholder="AÑo de la publicación" class="form-control"></div>
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