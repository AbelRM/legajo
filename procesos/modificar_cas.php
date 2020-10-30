<?php
include '../conexion_pg.php';

$id_cas = $_POST['id'];

//$nombres=$rw['nombres'].' '.$rw['ape_pat'].' '.$rw['ape_mat']; 
//$dni=$rw['dni'];
//$domic=$rw['domic'];
//$cel=$rw['cel'];
//$correo=$rw['correo'];

$nombres = $_POST['nombres'];
$ape_pat = $_POST['ape_pat'];
$ape_mat = $_POST['ape_mat'];
$dni = $_POST['dni'];
$domic = $_POST['domic'];
$cel = $_POST['cel'];
$correo = $_POST['correo'];
$fech_nac = $_POST['fech_nac'];
$nacionalidad = $_POST['nacionalidad'];

$sql = "UPDATE cas_registro SET nombres='$nombres',
                ape_pat='$ape_pat',
                ape_mat='$ape_mat',
                dni='$dni', 
                domic='$domic',
                cel='$cel',
                correo='$correo',
                fech_nac='$fech_nac',
                nacionalidad = '$nacionalidad' WHERE id_cas='$id_cas'";

$result = pg_query($con, $sql);
header("Location: ../cas_registro.php?id=$id_cas");
