<?php 

include '../conexion_pg.php';
$idmovim=$_POST['idmovim'];
$duracion = strtoupper($_POST['duracion']);
$nom_curso = strtoupper($_POST['nom_curso']);
$doc=strtoupper($_POST['doc']);
$f_capac=$_POST['f_capac'];
$f_reg=$_POST['f_reg'];
$h_reg=$_POST['h_reg'];

//echo $nombres;
$sql= "INSERT INTO d6_capac ( idmovim, curso, durac, docum, f_capac, fereg, hrreg) VALUES ('".$idmovim."','".$duracion."','".$nom_curso."','".$doc."','$f_capac','$f_reg','$h_reg')";

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