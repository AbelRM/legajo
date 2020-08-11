<?php 

include '../conexion.php';
$nombres = $_POST['nombres'];
$apellidos =$_POST['apellidos'];
$dni=$_POST['dni'];
$cargo=$_POST['cargo'];
$profesion=$_POST['profesion'];

$sql= "INSERT INTO personal_cas (nombres,apellidos,dni,cargo,profesion) VALUES ('".$nombres."','".$apellidos."','".$dni."','".$cargo."','".$profesion."')";

if ($conn->query($sql) == TRUE) {
	header('Location: ../cas.php');
} else {
	echo "Error: ".$sql. "<br>".$conn->error;
}

$conn->close();

?>