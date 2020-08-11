<?php 

include '../conexion_pg.php';
$nombres = strtoupper($_POST['nombres']);
$ape_paterno = strtoupper($_POST['ape_paterno']);
$ape_materno=strtoupper($_POST['ape_materno']);
$sexo=$_POST['sexo'];
if ($sexo == 1) {
	$sexo="F";
}
	elseif ($sexo == 2) {
		$sexo="M";
	}
$dni=$_POST['dni'];
$lib_militar=strtoupper($_POST['lib_militar']);
$autogenerado=strtoupper($_POST['autogenerado']);
$brevete=strtoupper($_POST['brevete']);
$nac_fecha=$_POST['nac_fecha'];
$nac_provincia=strtoupper($_POST['nac_provincia']);
$nac_distrito=strtoupper($_POST['nac_distrito']);
$nac_depart=strtoupper($_POST['nac_depart']);
$e_civil=strtoupper($_POST['e_civil']);
$a_trabajo=strtoupper($_POST['a_trabajo']);
$cargo=strtoupper($_POST['cargo']);
$nivel=strtoupper($_POST['nivel']);
$f_ingreso=$_POST['f_ingreso'];
$domicilio=strtoupper($_POST['domicilio']);
$distrito=strtoupper($_POST['distrito']);
$provincia=strtoupper($_POST['provincia']);
$departamento=strtoupper($_POST['departamento']);
$telefono=$_POST['telefono'];
$celular1=$_POST['celular1'];
$celular2=$_POST['celular2'];
$correo=strtoupper($_POST['correo']);
$s_laboral=strtoupper($_POST['s_laboral']);
$g_sanguineo=strtoupper($_POST['g_sanguineo']);
$r_pension=strtoupper($_POST['r_pension']);
$afp=strtoupper($_POST['afp']);
$cond_plaza=strtoupper($_POST['cond_plaza']);
$casa=strtoupper($_POST['casa']);
$t_trabajador=strtoupper($_POST['t_trabajador']);
$u_ejecutora=strtoupper($_POST['u_ejecutora']);
$condicion=strtoupper($_POST['condicion']);
$f_registro=$_POST['f_registro'];
$cod_plaza=strtoupper($_POST['cod_plaza']);

//echo $nombres;
$sql= "INSERT INTO ficha ( d1_nombres,d1_apepat,d1_apemat,d1_sexo,d1_dni,d1_lm,d1_autogen,d1_brevet,d1_fecnac,d1_coddisn,d1_codeciv,codubic,d1_codcar,d1_codniv,d1_fecing,d1_domic,d1_coddist,d1_telefon,d1_cel1,d1_cel2,d1_email,d1_sitlab,d1_grupo,d1_codregp,d1_codafp,c1_condpl,d1_codcas,d1_codtipt,d1_codunid,d1_codcond,fereg,codplaza) VALUES ('".$nombres."','".$ape_paterno."','".$ape_materno."','".$sexo."','".$dni."','".$lib_militar."','".$autogenerado."','".$brevete."','$nac_fecha','".$nac_distrito."','".$e_civil."','".$a_trabajo."','".$cargo."','".$nivel."','$f_ingreso','".$domicilio."','".$distrito."','".$telefono."','".$celular1."','".$celular2."','".$correo."','".$s_laboral."','".$g_sanguineo."','".$r_pension."','".$afp."','".$cond_plaza."','".$casa."','".$t_trabajador."','".$u_ejecutora."','".$condicion."','$f_registro','".$cod_plaza."') RETURNING oid";

$result=pg_query($con,$sql);
$rw=pg_fetch_row($result);
$id=$rw[0];
if (!$result){
	echo "Ocurrió un error.\n";

}else{
	header("Location: ../persona.php?idmovim=$id");
}
pg_close($con);  

?>