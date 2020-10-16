<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit<?php echo $id_contrato;?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="mediumModalLabel">Editar Empleado</h4>
            </div>
            <div class="modal-body">
			<div class="container-fluid" style="font-size:12px;">
            <form method="POST" action="EditarRegistro.php?id=<?php echo $id_contrato; ?>">
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1">N° Convocatoria:</label>
                        <input type="text" style="font-size:12px;" class="form-control" name="convocatoria" value="<?php echo $nro_convocatoria; ?>">
                    </div>
					<div class="col-md-6">
                        <label for="exampleFormControlInput1">CAS N°:</label>
                        <input type="text" style="font-size:12px;" class="form-control" name="nombres" value="<?php echo $contrato; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1">Fecha inicio:</label>
                        <input type="date" style="font-size:12px;" class="form-control" name="fech_inicio" value="<?php echo $f_inicio; ?>">
                    </div>
					<div class="col-md-6">
                        <label for="exampleFormControlInput1">Fecha término:</label>
                        <input type="date" style="font-size:12px;" class="form-control" name="fech_fin" value="<?php echo $f_fin; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1">Remuneración:</label>
                        <input type="text" style="font-size:12px;" class="form-control" name="remuneracion" value="<?php echo $remuneracion; ?>">
                    </div>
					<div class="col-md-6">
                        <label for="exampleFormControlInput1">Cargo:</label>
                        <select style="font-size:12px;"  name="cargo" id="cargo" class="form-control">
                            <option value="<?php echo $cargo; ?>"><?php echo $cargo; ?></option>
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
				<div class="row form-group">
					<div class="col-md-12">
						<label class="control-label" style="position:relative; top:7px;">Ubicación:</label>
					</div>
					<div class="col-md-12">
						<!-- <input type="text" style="font-size:12px;" class="form-control" name="carrera" value="<?php echo $ubicacion; ?>"> -->
                        <select style="font-size:12px;" name="ubicacion" id="ubicacion" class="form-control standardSelect">
                            <option value="<?php echo $ubicacion; ?>"><?php echo $ubicacion."-".$oficina; ?></option>
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
                <!-- <div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Oficina:</label>
					</div>
					<div class="col-sm-9">
						<input type="text" style="font-size:12px;" class="form-control" name="carrera" value="<?php  ?>">
					</div>
                </div> -->
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="exampleFormControlInput1">Fuente financiamiento:</label>
                        <input type="text" style="font-size:12px;" class="form-control" name="fuente" value="<?php echo $fuente; ?>">
                    </div>
					<div class="col-md-6">
                        <label for="exampleFormControlInput1">Meta:</label>
                        <input type="text" style="font-size:12px;" class="form-control" name="meta" value="<?php echo $meta; ?>">
                    </div>
				</div>
                <div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Tipo contrato:</label>
					</div>
					<div class="col-sm-9">
						<input type="text" style="font-size:12px;" class="form-control" name="tipo_contrato" value="<?php echo $tipo_contrato; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Borrar -->
<div class="modal fade" id="delete_<?php echo $id_contrato; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Borrar Empleado</h4>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
				<h2 class="text-center"><?php echo $row['Nombres'].' '.$row['Apellidos']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['idEmp']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>