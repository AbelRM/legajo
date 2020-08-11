<?php
include '../conexion_pg.php';
$pg="SELECT oid FROM ficha";
$rw=pg_query($conn,$pg);
$idmovim=$rw['oid'];


?>