<?php 

include '../conexion_pg.php';
$id_cas=$_POST['id_cas'];
$nro_cas=$_POST['nro_cas'];
$profesion=$_POST['profesion'];
$ubicacion=$_POST['ubicacion'];
$f_inicio=$_POST['f_inicio'];
$f_fin=$_POST['f_fin'];
$remun=$_POST['remun'];
$fuente=$_POST['fuente'];
$id_cargo=$_POST['profesion'];
$meta=$_POST['meta'];
$tip_contrato=$_POST['tip_contrato'];
$nro_convocatoria=$_POST['nro_convocatoria'];

$sql1=pg_query($con,"SELECT id_contrato as last from cas_contratos order by id_contrato desc");
$row=pg_fetch_array($sql1);
$id_contrato=$row['last']+1;


$sql= "INSERT INTO cas_contratos ( idcas, nro_contrato, f_inicio, f_termino, remuner, fuente,nro_convocatoria, cod_ubic, id_cargo, id_contrato, meta, tip_contrato) 
VALUES ('".$id_cas."','".$nro_cas."', '$f_inicio', '$f_fin' ,'".$remun."','".$fuente."','".$nro_convocatoria."','".$ubicacion."','".$id_cargo."','".$id_contrato."','".$meta."','".$tip_contrato."')";

$result=pg_query($con,$sql);
if (!$result){
    echo "Ocurrió un error.\n";
    pg_close($con);  

}else{
    echo '<script> 
    window.history.back(-1);
    location.reload();
    </script>';
    
    // header("Location: ../cas_registro.php);
    pg_close($con);  
}




?>