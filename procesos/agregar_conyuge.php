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
$telef=strtoupper($_POST['telef']);
$cel=strtoupper($_POST['cel']);
$f_matrim=$_POST['f_matrim'];
$nro_part=strtoupper($_POST['nro_part']);
$f_nac=$_POST['f_nac'];
$nac_distrito=strtoupper($_POST['nac_distrito']);
$g_instruc=strtoupper($_POST['g_instruc']);
$ocupacion=strtoupper($_POST['ocupacion']);
$c_trabajo=strtoupper($_POST['c_trabajo']);
$domic=strtoupper($_POST['domic']);
$dom_dist=strtoupper($_POST['dom_distrito']);

$f_reg=$_POST['f_reg'];
$h_reg=$_POST['h_reg'];

//echo $nombres;
$sql= "INSERT INTO d3_conyuge ( idmovim, appat, apmat, nomb, sexo, dni, dom, coddist, fecmat, part, fecnac, coddist_nac, telefon, ginst, ocup, centro, fereg, hrreg) VALUES ('".$idmovim."','".$ape_pat."','".$ape_mat."','".$nombres."','".$sexo."','".$dni."','".$domic."','".$dom_dist."','$f_matrim','".$nro_part."','$f_nac','".$nac_distrito."','".$telef."','".$g_instruc."','".$ocupacion."','".$c_trabajo."','$f_reg','$h_reg')";

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