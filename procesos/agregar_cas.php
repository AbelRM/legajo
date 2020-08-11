<?php 

include '../conexion_pg.php';
$nombres=strtoupper($_POST['nombres']);
$ape_pat=strtoupper($_POST['ape_pat']);
$ape_mat=strtoupper($_POST['ape_mat']);
$dni=$_POST['dni'];
$cel=$_POST['cel'];
$domic=strtoupper($_POST['domic']);
$correo=$_POST['correo'];



$sql1=pg_query($con,"SELECT id_cas as last from cas_registro order by id_cas desc");
$row=pg_fetch_array($sql1);
$id_cas=$row['last']+1;

// $nombres = strtoupper($_POST['nombres']);


$sql= "INSERT INTO cas_registro (  nombres, ape_pat, ape_mat, dni, cond, id_cas, cel, domic, correo) VALUES ('".$nombres."','".$ape_pat."','".$ape_mat."','".$dni."', 'ACTIVO', '".$id_cas."', '".$cel."', '".$domic."', '".$correo."')";

$result=pg_query($con,$sql);


pg_close($con);  

echo "<script type='text/javascript'>";
echo "window.history.back(-1);";
echo "</script>";

?>