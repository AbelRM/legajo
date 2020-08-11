<?php 

include '../conexion_pg.php';
$idmovim=$_POST['idmovim'];
$t_especializ = strtoupper($_POST['t_especializ']);
$año_especializ = strtoupper($_POST['año_especializ']);
$nom_especializ=strtoupper($_POST['nom_especializ']);
$nom_cestud=strtoupper($_POST['nom_cestud']);
$f_reg=$_POST['f_reg'];
$h_reg=$_POST['h_reg'];

//echo $nombres;
$sql= "INSERT INTO d2_especializ ( idmovim, coddetsbs, ano, nom_espec, c_estudios, fereg, hrreg) VALUES ('".$idmovim."','".$t_especializ."','".$año_especializ."','".$nom_especializ."','".$nom_cestud."','$f_reg','$h_reg')";

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