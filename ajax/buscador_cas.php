<?php
	require_once ("../conexion_pg.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = pg_escape_string($con,(strip_tags(strtoupper($_REQUEST['q']), ENT_QUOTES)));
		 $aColumns = array('cond', 'dni', 'nombres', 'ape_pat', 'ape_mat');//Columnas de busqueda
		 $sTable = "cas_registro";
		 $sWhere = ""; 
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 15; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = pg_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= pg_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = '../admin.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $per_page OFFSET $offset";
		$query = pg_query($con, $sql);
		
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th>Condición</th>
					<th>Nombres y Apellidos</th>
					<th >DNI</th>
					<th> </th>
				</tr>
				<?php
				while ($row=pg_fetch_array($query)){
					$cond=$row['cond'];
					$nombres=$row['nombres'].' '.$row['ape_pat'].' '.$row['ape_mat'];
					$dni=$row['dni'];
					$id_cas=$row['id_cas'];
					?>
					<tr>
						<td><?php echo $cond; ?></td>
						<td><?php echo $nombres; ?></td>
						<td><?php echo $dni; ?></td>
						<td> 
							<form method="POST" action="cas_registro.php">
								<input type="hidden" value="<?php echo $id_cas; ?>" name="id">
								<button type="submit" class="btn btn-info btn-xs" ><i class="fa fa-eye"></i>&nbsp; Visualizar</button><p></p>
							</form>

							<form method="POST" action="cas_modificar.php">
								<input type="hidden" value="<?php echo $id_cas; ?>" name="id">
								<button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"> </i>&nbsp; Modificar</button>	
								</form></td>
							</td>
						</td>

						<!-- <td><textarea class="form-control" id="descrip_<?php echo $id_servicio;?>" cols="30" rows="3"></textarea></td>
						<td class='col-xs-1'>
						<div class="pull-right">
						<input type="text" class="form-control" style="text-align:right" id="cantidad_<?php echo $id_servicio; ?>"  value="1" >
						</div></td>
						<td class='col-xs-2'><div class="pull-right">
						<input type="text" class="form-control" style="text-align:right" id="precio_venta_<?php echo $id_servicio; ?>"  value="<?php echo $precio_venta;?>" >
						</div></td>
						<td class='text-center'><a class='btn btn-info' href="#" onclick="agregar('<?php echo $id_servicio ?>')"><i class="fa fa-plus"></i></a></td> -->
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>