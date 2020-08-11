<?php 

include '../conexion_pg.php';
$idmovim=$_POST['idmovim'];
$nivel_educat = strtoupper($_POST['nivel_educat']);
$tipo_ce = strtoupper($_POST['tipo_ce']);
$nom_cestud=strtoupper($_POST['nom_cestud']);
$nom_profesion=strtoupper($_POST['nom_profesion']);
$cond_a=strtoupper($_POST['cond_a']);
$f_educa=$_POST['f_educa'];
$f_reg=$_POST['f_reg'];
$h_reg=$_POST['h_reg'];

//echo $nombres;
$sql= "INSERT INTO d2_estudio ( idmovim, nivel, tcentro, nombre, cond, titulo, f_educ, fereg, hrreg) VALUES ('".$idmovim."','".$nivel_educat."','".$tipo_ce."','".$nom_cestud."','".$cond_a."','".$nom_profesion."','$f_educa','$f_reg','$h_reg')";

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