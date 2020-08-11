<?php 

include '../conexion_pg.php';
$idmovim=$_POST['idmovim'];
$sexo=$_POST['sexo'];
if ($sexo == 1) {
	$sexo="F";
}
	elseif ($sexo == 2) {
		$sexo="M";
	}
$dni=$_POST['dni'];
$ape_pat = strtoupper($_POST['ape_pat']);
$ape_mat = strtoupper($_POST['ape_mat']);
$nombres=strtoupper($_POST['nombres']);
$f_nac=$_POST['f_nac'];
$nac_dist=strtoupper($_POST['nac_dist']);
$cert_med=strtoupper($_POST['cert_med']);
$g_instruc=strtoupper($_POST['g_instruc']);
$domic=strtoupper($_POST['domicilio']);
$dom_dist=$_POST['dom_dist'];
$situacion=strtoupper($_POST['situacion']);
if ($situacion == 1) {
	$situacion="V";
}
	elseif ($situacion == 2) {
		$situacion="F";
	}
$f_reg=$_POST['f_reg'];
$h_reg=$_POST['h_reg'];

//echo $nombres;
$sql= "INSERT INTO d5_hijos ( idmovim, dni, apelpat, apelmat, nomb, dire, fec_nac, sexo, nac_dist, nro_certmed, gr_instruc, dire_dist, situacion, fereg, hrreg) VALUES ('".$idmovim."','".$dni."','".$ape_pat."','".$ape_mat."','".$nombres."','".$domic."','$f_nac','".$sexo."','".$nac_dist."','".$cert_med."','".$g_instruc."','".$dom_dist."','".$situacion."','$f_reg','$h_reg')";

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