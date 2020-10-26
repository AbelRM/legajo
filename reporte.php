<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=reporte.xls');

include 'conexion_pg.php';

$query = "SELECT * FROM contratos_sin_adenda LEFT JOIN cas_adenda ON contratos_sin_adenda.id_contrato = cas_adenda.id_contrato 
ORDER BY dni, contratos_sin_adenda.f_inicio, cas_adenda.f_inicio asc ";
"SELECT * FROM contratos_sin_adenda LEFT JOIN cas_adenda ON contratos_sin_adenda.id_contrato = cas_adenda.id_contrato 
ORDER BY dni, contratos_sin_adenda.f_inicio, cas_adenda.f_inicio asc";

$result = pg_query($con, $query);

$style = 'mso-number-format:"@";'
?>

<style type="text/css">
  .cero {
    mso-style-parent: style0;
    mso-number-format: "@";
  }
</style>

<table border="1">
  <tr style="background-color:yellow;">
    <th>Nombres</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    <th>DNI</th>
    <th>Condicion</th>
    <th>Domicilio</th>
    <th>Celular</th>
    <th>Correo</th>
    <th>Nro Contrato</th>
    <th>Fecha Inicio</th>
    <th>Fecha Termino</th>
    <th>Remuneracion</th>
    <th>Fuente</th>
    <th>N° Convocatoria</th>
    <th>Meta</th>
    <th>Tipo Contrato</th>
    <th>Oficina</th>
    <th>Oficina2</th>
    <th>Ubicacion</th>
    <th>Ubicacion2</th>
    <th>Profesion</th>
    <th style="background-color:#007bff; color:#fff;">Nro Adenda</th>
    <th style="background-color:#007bff; color:#fff;">Fecha Inicio</th>
    <th style="background-color:#007bff; color:#fff;">Fecha Termino</th>
    <th style="background-color:#007bff; color:#fff;">Resolucion de Renuncia</th>
    <th style="background-color:#007bff; color:#fff;">Meta</th>
    <th style="background-color:#007bff; color:#fff;">Tipo de Adenda</th>
  </tr>
  <?php
  while ($row = pg_fetch_array($result)) {

  ?>
    <tr>
      <td><?php echo $row['nombres']; ?></td>
      <td><?php echo $row['ape_pat']; ?></td>
      <td><?php echo $row['ape_mat']; ?></td>
      <td class="cero"><?php echo $row['dni']; ?></td>
      <td><?php echo $row['cond']; ?></td>
      <td><?php echo $row['domic']; ?></td>
      <td><?php echo $row['cel']; ?></td>
      <td><?php echo $row['correo']; ?></td>
      <td><?php echo $row['nro_contrato']; ?></td>
      <td><?php echo $row['f_inicio']; ?></td>
      <td><?php echo $row['f_termino']; ?></td>
      <td><?php echo $row['remuner']; ?></td>
      <td><?php echo $row['fuente']; ?></td>
      <td><?php echo $row['nro_convocatoria']; ?></td>
      <td><?php echo $row['meta']; ?></td>
      <td><?php echo $row['tip_contrato']; ?></td>
      <td><?php echo $row['oficestr']; ?></td>
      <td><?php echo $row['estruc']; ?></td>
      <td><?php echo $row['estruc1']; ?></td>
      <td><?php echo $row['estruc2']; ?></td>
      <td><?php echo $row['profesion']; ?></td>
      <td><?php echo $row['nro_adenda']; ?></td>
      <td><?php echo $row['f_inicio']; ?></td>
      <td><?php echo $row['f_termino']; ?></td>
      <td><?php echo $row['resol_renuncia']; ?></td>
      <td><?php echo $row['meta']; ?></td>
      <td><?php echo $row['tip_adenda']; ?></td>

    </tr>
  <?php
  }

  ?>
</table>