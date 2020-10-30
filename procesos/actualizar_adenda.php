<?php

include '../conexion_pg.php';
$id_contrato = $_POST['id_contrato'];
echo $id_contrato;
$id_adenda = $_POST['id_adenda'];
$nro_adenda = $_POST['nro_adenda'];
$tipo_dadenda_editar = $_POST['tipo_dadenda_editar'];
$f_inicio = $_POST['f_inicio'];
$f_termino = $_POST['f_termino'];
$fuente = $_POST['fuente'];
$meta = $_POST['meta'];
$tipo_adenda_edit = $_POST['tipo_adenda_edit'];
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
if ($resol_renuncia == null) {
  $sql = "UPDATE cas_adenda SET nro_adenda='$nro_adenda',f_inicio='$f_inicio',f_termino='$f_termino',id_tadenda='$tipo_dadenda_editar',
  fuente='$fuente', meta='$meta', 
  tip_adenda = '$tipo_adenda_edit', f_registro = '$f_registro'
  WHERE id_adenda='$id_adenda'";

  $result = pg_query($con, $sql);

  if ($result) {
    $consulta = "SELECT * FROM cas_contratos WHERE id_contrato='$id_contrato'";
    $resp = pg_query($con, $consulta);
    $row = pg_fetch_array($resp);
    $idcas = $row['idcas'];
    header("Location: ../cas_registro.php?id=$idcas");
  } else {
    echo '<script> alert("Error al guardar la información 1");
    window.history.back(-1); </script>';
    // pg_close($con);
  }
} else {
  $sql = "UPDATE cas_adenda SET nro_adenda='$nro_adenda',f_inicio='$f_inicio',f_termino='$f_termino',id_tadenda='$tipo_dadenda_editar', f_renuncia = '$f_renuncia'
  fuente='$fuente', resol_renuncia = '$resol_renuncia', meta='$meta', 
  tip_adenda = '$tipo_adenda_edit', f_registro = '$f_registro'
  WHERE id_adenda='$id_adenda'";

  $result = pg_query($con, $sql);

  if ($result) {
    $consulta = "SELECT * FROM cas_contratos WHERE id_contrato='$id_contrato'";
    $resp = pg_query($con, $consulta);
    $row = pg_fetch_array($resp);
    $idcas = $row['idcas'];
    header("Location: ../cas_registro.php?id=$idcas");
  } else {
    echo '<script> alert("Error al guardar la información 2");
    window.history.back(-1); </script>';
    // pg_close($con);
  }
}
