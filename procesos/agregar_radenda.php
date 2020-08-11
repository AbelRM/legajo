
<?php 

include '../conexion_pg.php';
$id_adenda=$_POST['radenda'];
$nro_resol=$_POST['nro_resol'];
$f_renun=$_POST['f_renun'];

$sql1=pg_query($con,"UPDATE cas_adenda SET f_renuncia='$f_renun', resol_renuncia='".$nro_resol."'  WHERE id_adenda=$id_adenda");
$row=pg_fetch_array($sql1);


pg_close($con);  

echo "<script type='text/javascript'>";
echo "window.history.back(-1);";
echo "</script>";

?>