<?php

include '../conexion_pg.php';
$nro_cantrato = $_POST['nro_cantrato'];
$profesion_edit = $_POST['profesion_edit'];
$ubicacion_cas_edit = $_POST['ubicacion_cas_edit'];
$f_inicio = $_POST['f_inicio'];
$f_termino = $_POST['f_termino'];
$remuneracion = $_POST['remuneracion'];
$fuente = $_POST['fuente'];
$meta = $_POST['meta'];
$tipo_contrato_edit = $_POST['tipo_contrato_edit'];
$nro_convocatoria = $_POST['nro_convocatoria'];
$f_renuncia = $_POST['f_renuncia'];
$resol_renuncia = $_POST['resol_renuncia'];
// $dni = $_POST['dni'];
$f_registro = $_POST['f_registro'];

// $sql1 = pg_query($con, "SELECT id_contrato as last from cas_contratos order by id_contrato desc");
// $row = pg_fetch_array($sql1);
// $id_contrato = $row['last'] + 1;

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

$sql = "UPDATE cas_contratos SET nro_cantrato='$nro_cantrato',f_inicio='$f_inicio',f_termino='$f_termino',remuner='$remuneracion', 
fuente='$fuente', nro_convocatoria='$nro_convocatoria', cod_ubic = '$ubicacion_cas_edit', id_cargo = '$profesion_edit', 
f_renuncia='$f_renuncia', meta='$meta', resol_renuncia = '$resol_renuncia',
tip_contrato = '$tip_contrato', f_registro = '$f_registro'
WHERE id_cas='$id_cas'";

$result = pg_query($con, $sql);
if ($result) {
  echo '<script> 
    window.history.back(-1);
    location.reload();
    </script>';

  // header("Location: ../cas_registro.php);
  // pg_close($con);
} else {
  echo '<script> alert("Error al guardar la información"); </script>';
  pg_close($con);
}
