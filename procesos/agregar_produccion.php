<?php 

include '../conexion_pg.php';
$idmovim=$_POST['idmovim'];
$nom_invest = strtoupper($_POST['nom_invest']);
$rd_aprob = strtoupper($_POST['rd_aprob']);
$anio=strtoupper($_POST['anio']);
$f_reg=$_POST['f_reg'];
$h_reg=$_POST['h_reg'];

//echo $nombres;
$sql= "INSERT INTO d8_prod ( idmovim, public, docum, ano, fereg, hrreg) VALUES ('".$idmovim."','".$nom_invest."','".$rd_aprob."','".$anio."','$f_reg','$h_reg')";

$result=pg_query($con,$sql);
$rw=pg_fetch_row($result);
$id=$rw[0];
if (!$result){
	echo "Ocurrió un error.\n";

}else{
	echo "Registrado";
	header("Location: ../persona.php?idmovim=$idmovim");
}
pg_close($con);  

?>