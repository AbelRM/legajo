<?php
require_once 'phpword/vendor/autoload.php';
include 'conexion_pg.php';

$id_cas = $_POST['id_cas'];
$nro_contrato = $_POST['nro_contrato'];

$cons = "SELECT * FROM cas_registro   where id_cas='" . $id_cas . "' ";
$query = pg_query($con, $cons);
while ($rw = pg_fetch_array($query)) {
  $cas_nombre = $rw['ape_pat'] . ' ' . $rw['ape_mat'] . ' ' . $rw['nombres'];
}

$sql_3 = "SELECT * FROM cas_contratos INNER JOIN cargo_oprof ON cargo_oprof.cod_prof=cas_contratos.id_cargo WHERE idcas='" . $id_cas . "' ";
$cons = pg_query($con, $sql_3);
while ($row = pg_fetch_array($cons)) {
  $cargo = $row['profesion'];
  $tipcontrato = $row['tip_contrato'];  //detmov.catdetalle
}


// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
$section = $phpWord->addSection();
// Adding Text element to the Section having font styled by default...

setlocale(LC_TIME, 'spanish');
$hoy = strftime("%d de %B de %Y");
$year = date("Y");

$section->addText('Tacna, ' . $hoy . '');
$section->addTextBreak(1);
$section->addText('INFORME N°        -' . $year . '-SERL-EARRHH-DEGDRRHH/DRS.T/GOB.REG.TACNA', array('bold' => true, 'underline' => 'single'));
$section->addTextBreak(1);



// ------------tabla---------------
$styleTable = array('borderSize' => 0, 'borderColor' => '888888', 'cellMargin' => 140); // el borde de la tabla de 6px, color de borde = #888 , ...
// $styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
$phpWord->addTableStyle('table1', $styleTable, $styleFirstRow);

$table1 = $section->addTable("table1"); // creamos la tabla
$table1->addRow(); // agregamos una fila a la tabla
$table1->addCell(4500)->addText("ASUNTO", null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0)); // agregamos la columna 1
$table1->addCell(9000)->addText("Vacaciones Truncas Personal CAS", null, array("spaceAfter" => 0)); // agregamos la columna 2

$table1->addRow(); // agregamos otra fila pra los datos
$table1->addCell(4500)->addText("APELLIDOS Y NOMBRES", null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0)); // fila 2, columna 1, debe coincidir con la columna de la fila anterior
$table1->addCell(9000)->addText($cas_nombre, null, array("spaceAfter" => 0)); // fila 2, columna 2, debe coincidir con la columna de la fila anterior

$table1->addRow();
$table1->addCell(4500)->addText("DESEMPEÑO COMO", null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
$table1->addCell(9000)->addText($cargo, null, array("spaceAfter" => 0));

$table1->addRow();
$table1->addCell(4500)->addText("CONDICIÓN", null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
$table1->addCell(9000)->addText('CONTRATO ADMINISTRATIVO DE SERVICIOS (CAS) D.L. N° 1057 ' . $tipcontrato, null, array("spaceAfter" => 0));

$table1->addRow();
$celda = $table1->addCell(4500)->addText("FECHA DE INGRESO", null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
$celda = $table1->addCell(9000);
// $sql1 = "SELECT id_contrato from cas_contratos where idcas=$id_cas order by f_inicio desc";
// $c = pg_query($con, $sql1);
// $row = pg_fetch_array($c);
// $id_contrato = $row['id_contrato'];

$sql = "SELECT * FROM cas_contratos WHERE id_contrato='" . $nro_contrato . "' ";
$cons = pg_query($con, $sql);
$row = pg_fetch_array($cons);
$nro_contr = $row['nro_contrato']; //detmov.catdetalle
$f_ini = $row['f_inicio'];
$new_f_ini = date("d-m-Y", strtotime($f_ini));
$f_fin = $row['f_termino'];
$new_f_fin = date("d-m-Y", strtotime($f_fin));
$remu = $row['remuner'];
$fuente = $row['fuente'];
$meta = $row['meta'];
$tip_contrato = $row['tip_contrato'];


$celda->addText('CONTRATO.-', array('bold' => true, 'underline' => 'single'), array("spaceAfter" => 0));
$celda->addText('Contrato Administrativo de Servicios N° ' . $nro_contr . ', a partir del ' . $new_f_ini . ' al ' . $new_f_fin . ' ' . $tip_contrato, null, array("spaceAfter" => 0));


$sqla = "SELECT * FROM cas_adenda WHERE id_contrato='" . $nro_contrato . "' ";
$a = pg_query($con, $sqla);
$rw = pg_fetch_array($a);
$nro_adend = $rw['nro_adenda'];

if ($nro_adend == '') {
  # code...
} else {

  $table1->addRow();
  $celda = $table1->addCell(4500)->addText("REFERENCIA", null, array("spaceAfter" => 0));
  $table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
  $celda = $table1->addCell(9000);
  $celda->addText('REGISTRA.-', array('bold' => true, 'underline' => 'single'), array("spaceAfter" => 0));
  $celda->addText('Adendas al Contrato Administrativo de Servicios N° ' . $nro_contr, null, array("spaceAfter" => 0));

  $sqla = "SELECT * FROM cas_adenda WHERE id_contrato='" . $nro_contrato . "' ";
  $a = pg_query($con, $sqla);
  while ($rw = pg_fetch_array($a)) {
    # code...

    $nro_adend = $rw['nro_adenda'];

    $fi_ad = $rw['f_inicio'];
    $new_fi_ad = date("d-m-Y", strtotime($fi_ad));
    $ff_ad = $rw['f_termino'];
    $new_ff_ad = date("d-m-Y", strtotime($ff_ad));


    $celda->addText('  - Adenda N° ' . $nro_adend . ', a partir del ' . $new_fi_ad . ' al ' . $new_ff_ad, null, array('spaceAfter' => 0));
  }
}

// ----------------------renuncia
$cons = pg_query($con, "SELECT * from cas_contratos where id_contrato = '$nro_contrato' ");
// $cons = pg_query($con, "SELECT * from cas_contratos where idcas=$id_cas order by id_contrato desc ");
$res = pg_fetch_array($cons);
$r_renun = $row['resol_renuncia'];
$f_renun = $row['f_renuncia'];
$num_contr = $row['nro_contrato'];
$id_cont = $row['id_contrato'];

if ($r_renun == '') {
  # code...
} else {
  $table1->addRow();
  $table1->addCell(4500)->addText("FECHA TERMINO", null, array("spaceAfter" => 0));
  $table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
  $celda = $table1->addCell(9000);
  $celda->addText('RESOLUCIÓN DE CONTRATO.-', array('bold' => true, 'underline' => 'single'), array("spaceAfter" => 0));
  $celda->addText('A partir del ' . $f_renun, null, array("spaceAfter" => 0));
  $celda->addText('Resolución N° ' . $r_renun . ' al Contrato Administrativo de Servicios N° ' . $num_contr, null, array("spaceAfter" => 0));
}



$sql1 = pg_query($con, "SELECT * from cas_adenda where id_contrato=$id_cont order by id_adenda desc");
$row = pg_fetch_array($sql1);
$id_adenda = $row['id_adenda'];
$r_renun = $row['resol_renuncia'];
$f_renun = $row['f_renuncia'];
$id_contra = $row['id_contrato'];

$sql2 = pg_query($con, "SELECT * from cas_contratos WHERE id_contrato=$nro_contrato ");
$r = pg_fetch_array($sql2);
$num_contr = $r['nro_contrato'];

if ($r_renun == '') {
  # code...
} else {
  $table1->addRow();
  $table1->addCell(4500)->addText("FECHA TERMINO", null, array("spaceAfter" => 0));
  $table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
  $celda = $table1->addCell(9000);
  $celda->addText('RESOLUCIÓN DE CONTRATO.-', array('bold' => true, 'underline' => 'single'), array("spaceAfter" => 0));
  $celda->addText('A partir del ' . $f_renun, null, array("spaceAfter" => 0));
  $celda->addText('Resolución N° ' . $r_renun . ' al Contrato Administrativo de Servicios N° ' . $num_contr, null, array("spaceAfter" => 0));
}



// -------------------------fin renuncia
$table1->addRow();
$table1->addCell(4500)->addText("INASISTENCIAS", null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
$table1->addCell(9000)->addText("No registra", null, array("spaceAfter" => 0));

$table1->addRow();
$table1->addCell(4500)->addText("ASUNTOS PARTICULARES", null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
$table1->addCell(9000)->addText("No registra", null, array("spaceAfter" => 0));

$table1->addRow();
$table1->addCell(4500)->addText("SANCIONES", null, array("spaceAfter" => 0), null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0), null, array("spaceAfter" => 0));
$table1->addCell(9000)->addText("No registra", null, array("spaceAfter" => 0), null, array("spaceAfter" => 0));

$table1->addRow();
$table1->addCell(4500)->addText("REMUNERACIÓN", null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
$table1->addCell(9000)->addText('(S/ ' . $remu . '.00)', null, array("spaceAfter" => 0));

$table1->addRow();
$table1->addCell(4500)->addText(" - FTE. FINANCIAMIENTO", null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
$table1->addCell(9000)->addText($fuente, null, array("spaceAfter" => 0));

$table1->addRow();
$table1->addCell(4500)->addText(" - META", null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
$table1->addCell(9000)->addText($meta, null, array("spaceAfter" => 0));

$table1->addRow();
$celda = $table1->addCell(4500)->addText("UBICACIÓN", null, array("spaceAfter" => 0));
$table1->addCell(1000)->addText(":", null, array("spaceAfter" => 0));
$celda = $table1->addCell(9000);
$sql2 = "SELECT * FROM t_ubicas INNER JOIN cas_contratos ON cas_contratos.cod_ubic=t_ubicas.codofic WHERE id_contrato='" . $nro_contrato . "' ";
$cons2 = pg_query($con, $sql2);
$row = pg_fetch_array($cons2);
$dir_ejec = $row['estruc1'];
$equipo = $row['oficestr'];
$unid_e = $row['estruc'];
$celda->addText($dir_ejec, null, array('spaceAfter' => 0));
$celda->addText($equipo, null, array('spaceAfter' => 0));
$celda->addText($unid_e, null, array('spaceAfter' => 0));

//-------------fin tabla----------
$section->addTextBreak(4);
$section->addText('YNJL.-', array('size' => 9));



// $phpWord->getCompability()->setOoxmlVersion(15);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename="informe_vac_trun_' . $cas_nombre . '.docx"');

// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');



/* Note: we skip RTF, because it's not XML-based and requires a different example. */
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */