<?php
// Insert the content of connection.php file
include('../conexion_pg.php');

// Delete data from the database
if (isset($_POST['deleteData'])) {
  $id_contrato = $_POST['id_contrato'];

  $sql = "SELECT * FROM cas_contratos WHERE id_contrato='$id_contrato'";
  $resp = pg_query($con, $sql);
  $row = pg_fetch_array($resp);
  $idcas = $row['idcas'];

  $consulta = "DELETE FROM cas_contratos WHERE id_contrato='$id_contrato'";
  $resultado = pg_query($con, $consulta);

  if ($resultado) {
    header("Location: ../cas_registro.php?id=$idcas");
  } else {
    echo '<script> alert("No se pudo borrar."); 
    window.history.back(-1);</script>';
  }
}
