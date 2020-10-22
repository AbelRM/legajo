<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver PDF agregado - DIRESA TACNA</title>
  <!-- <link rel="icon" type="image/png" href="img/icono_diresa.png" /> -->
</head>

<body>
  <?php
  include 'conexion_pg.php';
  $dato_desencriptado = $_GET['dni'];
  $dni = $desencriptar($dato_desencriptado);
  $sql = "SELECT * FROM cas_contratos WHERE id_1puntos=" . $_GET['id'];
  $query = pg_query($con, $sql);
  if ($datos = pg_fetch_array($query)) {
    if ($datos['archivos'] == "") { ?>
      <p>No hay archivos agregados</p>
    <?php } else { ?>
      <iframe src="archivos_cas/<?php echo $dni ?>/expe1_laboral/<?php echo $datos['archivos']; ?>" width="800px" height="600px"></iframe>

  <?php }
  } ?>

</body>

</html>