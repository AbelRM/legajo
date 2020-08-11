<?php 

include '../conexion_pg.php';
$idmovim=$_POST['idmovim'];
$especialidad = strtoupper($_POST['especialidad']);
$entidad = strtoupper($_POST['entidad']);
$fecha=strtoupper($_POST['fecha']);
$f_reg=$_POST['f_reg'];
$h_reg=$_POST['h_reg'];

//echo $nombres;
$sql= "INSERT INTO d10_explab ( idmovim, espec, entidad, ano, fereg, hrreg) VALUES ('".$idmovim."','".$especialidad."','".$entidad."','".$fecha."','$f_reg','$h_reg')";

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