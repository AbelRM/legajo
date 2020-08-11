<?php 

include '../conexion_pg.php';
$idmovim=$_POST['idmovim'];
$t_parent=$_POST['t_parent'];
if ($t_parent == 1) {
	$t_parent="PAPÁ";
}
	
	elseif ($t_parent == 2){
		$t_parent="MAMÁ";
	}

$g_instruc=$_POST['g_instruc'];
$situacion=$_POST['situacion'];
if ($situacion == 1) {
	$situacion="VIVO";
}
	
	elseif ($situacion == 2){
		$situacion="FALLECIDO";
	}

$nombres = strtoupper($_POST['nombres']);
$ape_mat = strtoupper($_POST['ape_mat']);
$ape_pat = strtoupper($_POST['ape_pat']);
$f_nac=$_POST['f_nac'];
$f_reg=$_POST['f_reg'];
$h_reg=$_POST['h_reg'];

//echo $nombres;
$sql= "INSERT INTO d11_padres ( idmovim, t_parent, appat, apmat, nomb, sit, g_instruc, fnac, fereg, hrreg) VALUES ('".$idmovim."','".$t_parent."','".$ape_pat."','".$ape_mat."','".$nombres."','".$situacion."','".$g_instruc."','$f_nac','$f_reg','$h_reg')";

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