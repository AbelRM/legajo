<?php

// Cómo subir el archivo
include '../conexion_pg.php';
$fichero = $_FILES["file"];
$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$seccion=$_POST['seccion'];
$ruta = "pdfs/".$dni."-".$nombre."/".$seccion."/".$fichero["name"];

// Cargando el fichero en la carpeta "subidas"
// Pasar $dni, $nombres, $seccion
move_uploaded_file($fichero["tmp_name"], "../".$ruta);

// ----------------ingreso a tabla documentos---------------------
$nom_doc=$_POST['nom_doc'];
$idmovim=$_POST['idmovim'];
$descrip=$_POST['descrip'];
$descrip = nl2br(htmlentities($descrip, ENT_QUOTES, 'UTF-8'));

$sql="INSERT INTO documentos (idmovim, nom_doc, descrip, ruta_doc, seccion) VALUES ( '".$idmovim."', '".$nom_doc."', '".$descrip."', '".$ruta."' , '".$seccion."' )";
$result=pg_query($con,$sql);

// Redirigiendo hacia atrás
// header("Location: " . $_SERVER["HTTP_REFERER"]); //Regresar a la pagina anterior

echo "<script type='text/javascript'>";
echo "window.history.back(-1);";
echo "</script>";
?>