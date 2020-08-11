<?php
//$hostname="localhost";
$hostname="192.160.0.75";
// $port="5232"; NO FUNCIONA
$username="postgres";
$password="123";
$dbname="LEGAJO_LAP";

$con=pg_connect("host=$hostname user=$username password=$password dbname=$dbname");

if(!$con)
	echo "<p>Error de conexion</p>";
else
	echo "Conexión exitosa";

// pg_close($con);  

?>