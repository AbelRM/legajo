<?php 

include '../conexion_pg.php';
// $id_contrato=$_POST['id_contrato'];
$nro_adenda=$_POST['nro_adenda'];
$t_adenda=$_POST['t_adenda'];
// $ubicacion=$_POST['ubicacion'];
$f_inicio=$_POST['f_inicio'];
$f_fin=$_POST['f_fin'];
$id_contrato=$_POST['contrato'];
$fuente=$_POST['fuente'];
$meta=$_POST['meta'];
$tip_adenda=$_POST['tip_contrato'];
// $id_cargo=$_POST['profesion'];

$sql1=pg_query($con,"SELECT id_adenda as last from cas_adenda order by id_adenda desc");
$row=pg_fetch_array($sql1);
$id_adenda=$row['last']+1;

// $nombres = strtoupper($_POST['nombres']);


$sql= "INSERT INTO cas_adenda (  id_adenda, id_contrato, id_tadenda, nro_adenda, f_inicio, f_termino, fuente, meta,tip_adenda) VALUES ('".$id_adenda."','".$id_contrato."','".$t_adenda."','".$nro_adenda."', '$f_inicio', '$f_fin' ,'".$fuente."','".$meta."','".$tip_adenda."')";

$result=pg_query($con,$sql);


pg_close($con);  

echo "<script type='text/javascript'>";
echo "window.history.back(-1);";
echo "</script>";

?>