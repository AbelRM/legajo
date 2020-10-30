
<?php

include '../conexion_pg.php';
$id_contrato = $_POST['rcontrato'];
$nro_resol = $_POST['nro_resol'];
$f_renun = $_POST['f_renun'];

$respuesta = pg_query($con, "UPDATE cas_contratos SET f_renuncia='$f_renun', resol_renuncia='" . $nro_resol . "'  WHERE id_contrato=$id_contrato");
if ($respuesta) {
  $sql = "SELECT * FROM cas_contratos WHERE id_contrato='$id_contrato'";
  $resp = pg_query($con, $sql);
  $row = pg_fetch_array($resp);
  $idcas = $row['idcas'];
  header("Location: ../cas_registro.php?id=$idcas");
} else {
  echo '<script> alert("Error al guardar la información");
  window.history.back(-1); </script>';
}

?>