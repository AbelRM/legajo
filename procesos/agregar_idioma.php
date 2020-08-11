<?php 

include '../conexion_pg.php';
$idmovim=$_POST['idmovim'];
$habla=$_POST['habla'];
if ($habla == 1) {
	$habla="Básico";
}
	if ($habla == 2) {
		$habla="Intermedio";
	}
	elseif ($habla == 3){
		$habla="Avanzado";
	}

$lee=$_POST['lee'];
if ($lee == 1) {
	$lee="Básico";
}
	if ($lee == 2) {
		$lee="Intermedio";
	}
	elseif ($lee == 3){
		$lee="Avanzado";
	}

$escribe=$_POST['escribe'];
if ($escribe == 1) {
	$escribe="Básico";
}
	if ($escribe == 2) {
		$escribe="Intermedio";
	}
	elseif ($escribe == 3){
		$escribe="Avanzado";
	}

$lugar = strtoupper($_POST['lugar']);
$idioma = strtoupper($_POST['idioma']);
$f_reg=$_POST['f_reg'];
$h_reg=$_POST['h_reg'];

//echo $nombres;
$sql= "INSERT INTO d9_idioma ( idmovim, idioma, habla, lee, escribe, aprendio, fereg, hrreg) VALUES ('".$idmovim."','".$idioma."','".$habla."','".$lee."','".$escribe."','".$lugar."','$f_reg','$h_reg')";

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