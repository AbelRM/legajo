
<?php

include '../conexion_pg.php';
$id_adenda = $_POST['radenda'];
$nro_resol = $_POST['nro_resol'];
$f_renun = $_POST['f_renun'];

$respuesta = pg_query($con, "UPDATE cas_adenda SET f_renuncia='$f_renun', resol_renuncia='" . $nro_resol . "'  WHERE id_adenda=$id_adenda");

if ($respuesta) {
  $sql = "SELECT * FROM cas_contratos WHERE id_contrato='$id_contrato'";
  $resp = pg_query($con, $sql);
  $row = pg_fetch_array($resp);
  $idcas = $row['idcas'];
  header("Location: ../cas_registro.php?id=$id_cas");
} else {
  echo '<script> alert("Error al guardar la información");
  window.history.back(-1); </script>';
}

?>