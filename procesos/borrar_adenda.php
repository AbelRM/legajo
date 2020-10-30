<?php
// Insert the content of connection.php file
include('../conexion_pg.php');

// Delete data from the database
if (isset($_POST['deleteData'])) {
  $id_adenda = $_POST['id_adenda'];

  $sql = "SELECT * FROM cas_adenda  WHERE id_adenda='$id_adenda'";
  $resp = pg_query($con, $sql);
  $row = pg_fetch_array($resp);
  $id_contrato = $row['id_contrato'];

  $sql2 = "SELECT * FROM cas_contratos  WHERE id_contrato='$id_contrato'";
  $respuesta = pg_query($con, $sql2);
  $rw = pg_fetch_array($respuesta);
  $idcas = $rw['idcas'];

  $consulta = "DELETE FROM cas_adenda WHERE id_adenda='$id_adenda'";
  $resultado = pg_query($con, $consulta);

  if ($resultado) {
    header("Location: ../cas_registro.php?id=$idcas");
  } else {
    echo '<script> alert("No se pudo borrar."); 
    window.history.back(-1);</script>';
  }
}
