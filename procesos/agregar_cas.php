<?php

include '../conexion_pg.php';
$nombres = strtoupper($_POST['nombres']);
$ape_pat = strtoupper($_POST['ape_pat']);
$ape_mat = strtoupper($_POST['ape_mat']);
$dni = $_POST['dni'];
$cel = $_POST['cel'];
$domic = strtoupper($_POST['domic']);
$correo = $_POST['correo'];
$fech_nac = $_POST['fech_nac'];


$sql1 = pg_query($con, "SELECT id_cas as last from cas_registro order by id_cas desc");
$row = pg_fetch_array($sql1);
$id_cas = $row['last'] + 1;

if ($fech_nac == NULL) {
  $sql = "INSERT INTO cas_registro (nombres, ape_pat, ape_mat, dni, cond, id_cas, cel, domic, correo) 
VALUES ('" . $nombres . "','" . $ape_pat . "','" . $ape_mat . "','" . $dni . "', 'ACTIVO', '" . $id_cas . "', '" . $cel . "', '" . $domic . "', '" . $correo . "')";

  $result = pg_query($con, $sql);
  if (!$result) {
    echo "error";
    // echo '<script> alert("Error al guardar la información");
    // window.history.back(-1); </script>';
  } else {
    echo "Registrado";
    header("Location: ../cas_registro.php?id=$id_cas");
  }
} else {
  $sql = "INSERT INTO cas_registro (nombres, ape_pat, ape_mat, dni, cond, id_cas, cel, domic, correo, fech_nac) 
  VALUES ('" . $nombres . "','" . $ape_pat . "','" . $ape_mat . "','" . $dni . "', 'ACTIVO', '" . $id_cas . "', '" . $cel . "', '" . $domic . "', '" . $correo . "', '" . $fech_nac . "')";

  $result = pg_query($con, $sql);
  if (!$result) {
    echo "error 2";
    // echo '<script> alert("Error al guardar la información");
    // window.history.back(-1); </script>';
  } else {
    echo "Registrado";
    header("Location: ../cas_registro.php?id=$id_cas");
  }
}
