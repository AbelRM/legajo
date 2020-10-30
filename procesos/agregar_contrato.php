<?php

include '../conexion_pg.php';
$id_cas = $_POST['id_cas'];
$nro_cas = $_POST['nro_cas'];
$profesion = $_POST['profesion'];
$ubicacion = $_POST['ubicacion'];
$f_inicio = $_POST['f_inicio'];
$f_fin = $_POST['f_fin'];
$remun = $_POST['remun'];
$fuente = $_POST['fuente'];
$id_cargo = $_POST['profesion'];
$meta = $_POST['meta'];
$tip_contrato = $_POST['tip_contrato'];
$nro_convocatoria = $_POST['nro_convocatoria'];
$dni = $_POST['dni'];
$f_registro = $_POST['f_reg'];

$sql1 = pg_query($con, "SELECT id_contrato as last from cas_contratos order by id_contrato desc");
$row = pg_fetch_array($sql1);
$id_contrato = $row['last'] + 1;

//crear carpeta
// $micarpeta = $_SERVER['DOCUMENT_ROOT'] . '/legajo/archivos_cas/' . $dni . '/' . $nro_cas . '/';
// if (!file_exists($micarpeta)) {
//   mkdir($micarpeta, 0777, true);
// }
//datos del arhivo
// $nombre_archivo = $_FILES['archivo']['name'];
// $tipo_archivo = $_FILES['archivo']['type'];
// $tamano_archivo = $_FILES['archivo']['size'];

// $query = pg_query($con, "SELECT * FROM cas_contratos WHERE formacion_idpostulante = $idpostulante");
// $result = pg_num_rows($query);
// if ($result <= 0) {
//   $i = 1;
//   $new_nombre = "formacion_" . $i . ".pdf";
// } else {
//   $row = pg_fetch_array($query);
//   $idformacion = $row['id_formacion'];
//   $i = $idformacion;
//   $new_nombre = "formacion_" . $i . ".pdf";
// }
//compruebo si las características del archivo son las que deseo
// if (!(strpos($tipo_archivo, "pdf") && ($tamano_archivo <= 3000000))) {
//   echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Solo se permiten archivos .pdf<br><li>se permiten archivos de 3 Mb máximo.</td></tr></table>";
// } else {
// if (move_uploaded_file($_FILES['archivo']['tmp_name'], $micarpeta . $nombre_archivo)) {
$sql = "INSERT INTO cas_contratos ( idcas, nro_contrato, f_inicio, f_termino, remuner, fuente,nro_convocatoria, cod_ubic, id_cargo, id_contrato, meta, tip_contrato, f_registro, estado_vt, estado_rc, estado_ct) 
  
  VALUES ('" . $id_cas . "','" . $nro_cas . "', '$f_inicio', '$f_fin' ,'" . $remun . "','" . $fuente . "','" . $nro_convocatoria . "','" . $ubicacion . "','" . $id_cargo . "','" . $id_contrato . "','" . $meta . "','" . $tip_contrato . "','" . $f_registro . "','NO REGISTRADO', 'NO REGISTRADO', 'NO REGISTRADO')";

$result = pg_query($con, $sql);
if ($result) {


  header("Location: ../cas_registro.php?id=$id_cas");
} else {
  echo '<script> alert("Error al guardar la información");
  window.history.back(-1); </script>';
}
// } else {
//   echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
//   pg_close($con);
// }
// }
