<?php 
include 'conexion_pg.php';
$i=1
while ( $i <= 116) {
	# code...
}
$sql="INSERT INTO cas_tadenda (tipo_adenda) VALUES ('Reordenamiento de Metas')";
$a=pg_query($con,$sql);
?>