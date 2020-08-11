<?php 

include '../conexion_pg.php';
$idmovim=$_POST['idmovim'];
$memo = strtoupper($_POST['memo']);
$motivo = strtoupper($_POST['motivo']);
$nom_evento=strtoupper($_POST['nom_evento']);
$f_beca=$_POST['f_beca'];
$f_reg=$_POST['f_reg'];
$h_reg=$_POST['h_reg'];

//echo $nombres;
$sql= "INSERT INTO d7_beca ( idmovim, num, natura, evento, fecha, fereg, hrreg) VALUES ('".$idmovim."','".$memo."','".$motivo."','".$nom_evento."','$f_beca','$f_reg','$h_reg')";

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