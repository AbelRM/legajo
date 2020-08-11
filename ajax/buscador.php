<?php

	
	//include('is_logged.php');Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* conect To Database*/
	//require_once ("../config/db.php");Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../conexion_pg.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = pg_escape_string($con,(strip_tags(strtoupper($_REQUEST['q']), ENT_QUOTES)));
		 $aColumns = array('codplaza', 'd1_dni', 'd1_nombres', 'd1_apepat', 'd1_apemat');//Columnas de busqueda
		 $sTable = "ficha";
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
		$per_page = 10; //how much records you want to show
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
					<th>Plaza</th>
					<th>Nombres y Apellidos</th>
					<th >DNI</th>
					<th> </th>
					<!-- <th><span class="pull-right">Cant.</span></th>
					<th><span class="pull-right">Precio</span></th>
					<th class='text-center' style="width: 36px;">Agregar</th> -->
				</tr>
				<?php
				while ($row=pg_fetch_array($query)){
					$codplaza=$row['codplaza'];
					$nombres=$row['d1_nombres'].' '.$row['d1_apepat'].' '.$row['d1_apemat'];
					$dni=$row['d1_dni'];
					$idmovim=$row['idmovim'];
					// $precio_venta=$row["precio"];
					// $precio_venta=number_format($precio_venta,2,'.','');
					?>
					<tr>
						<td><?php echo $codplaza; ?></td>
						<td><?php echo $nombres; ?></td>
						<td><?php echo $dni; ?></td>
						<td> 
							<form method="POST" action="secciones.php">
								<input type="hidden" value="<?php echo $idmovim; ?>" name="idmovim">
								<button type="submit" class="btn btn-info"><i class="fa fa-mail-forward"></i>&nbsp; Visualizar</button>
							</form></td>
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