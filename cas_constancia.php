<?php
require_once 'phpword/vendor/autoload.php';
include 'conexion_pg.php';

$id_cas = $_POST['id_cas'];
// $nro_contrato = $_POST['nro_contrato'];
$fech_registro_ct = $_POST['fech_registro_ct'];



$cons = "SELECT * FROM cas_registro   where id_cas='" . $id_cas . "' ";
$query = pg_query($con, $cons);
while ($rw = pg_fetch_array($query)) {
  $cas_nombre = $rw['nombres'] . ' ' . $rw['ape_pat'] . ' ' . $rw['ape_mat'];
}

$sql_3 = "SELECT * FROM cas_contratos INNER JOIN cargo_oprof ON cargo_oprof.cod_prof=cas_contratos.id_cargo WHERE idcas='" . $id_cas . "' ";
$cons = pg_query($con, $sql_3);
while ($row = pg_fetch_array($cons)) {
  $cargo = $row['profesion']; //detmov.catdetalle
}

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();


/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
$section = $phpWord->addSection();
$header = $section->addHeader();
$header->addImage(
  'images/logo.jpg',
  array(
    'width'         => 180,
    'height'        => 60,
    'marginTop'     => -1,
    'marginLeft'    => -5,
    'wrappingStyle' => 'behind'
  )
);
// Adding Text element to the Section having font styled by default...
setlocale(LC_TIME, 'spanish'); //Para convertir la fecha local en español :)
$hoy = strftime("%d de %B de %Y");
$year = date("Y");

$section->addText('CONSTANCIA', array('bold' => true, 'size' => 24, 'spacing' => 150, 'name' => 'Arial Black'), array("align" => "center"));
$section->addTextBreak(1);

$section->addText('EL DIRECTOR EJECUTIVO DE GESTIÓN Y DESARROLLO DE RECURSOS HUMANOS DE LA DIRECCIÓN REGIONAL DE SALUD TACNA, QUE SUSCRIBE DE ACUERDO A LO INFORMADO POR EL SISTEMA DE ESCALAFÓN, REGISTRO Y LEGAJO HACE CONSTAR:', array('size' => 12), array("align" => "both"));

$section->addText('Que: ' . $cas_nombre, array('size' => 12));

$section->addText('Ha prestado servicios como contratado bajo el régimen especial de contratación laboral para el sector público, establecido en el Decreto Legislativo N° 1057, que regula el Régimen Especial de Contratación Administrativa de Servicios (C.A.S.), según detalle:', array('size' => 12), array("align" => "both"));

$section->addText('Contrato como: ' . $cargo . ', en mérito al:', array('size' => 12));

$sql = "SELECT * FROM cas_contratos INNER JOIN t_ubicas ON t_ubicas.codofic=cas_contratos.cod_ubic INNER JOIN cargo_oprof ON cargo_oprof.cod_prof=cas_contratos.id_cargo WHERE idcas='" . $id_cas . "' ORDER BY f_inicio asc ";
$cons = pg_query($con, $sql);
while ($row = pg_fetch_array($cons)) {
  $num_cont = $row['nro_contrato']; //detmov.catdetalle
  $f_ini = $row['f_inicio'];
  $new_f_ini = date("d-m-Y", strtotime($f_ini));
  $f_fin = $row['f_termino'];
  $new_f_fin = date("d-m-Y", strtotime($f_fin));
  $ofic = $row['oficestr'];
  $ofic_ = $row['estruc1'];
  $id_contr = $row['id_contrato'];
  $r_renun = $row['resol_renuncia'];
  $fe_renun = $row['f_renuncia'];
  $new_fe_renun = date("d-m-Y", strtotime($fe_renun));
  $id_contrato = $row['id_contrato'];

  $estado_rc = 'REGISTRADO';

  $update = "UPDATE cas_contratos SET estado_ct='$estado_rc',fecha_registro_ct='$fech_registro_ct' WHERE id_contrato = '$id_contrato'";
  $actualizar = pg_query($con, $update);

  $section->addText('- Contrato Administrativo de Servicios N° ' . $num_cont . ', a partir del ' . $new_f_ini . ' al ' . $new_f_fin . ' - ' . $ofic_ . ', ubicado en la ' . $ofic . ' de la Dirección Regional de Salud Tacna.', array('size' => 12), array("align" => "both"));

  $sql1 = "SELECT * FROM cas_adenda WHERE id_contrato='" . $id_contr . "' ";
  $result = pg_query($con, $sql1);


  $sql1 = "SELECT * FROM cas_adenda INNER JOIN cas_tadenda ON cas_adenda.id_tadenda=cas_tadenda.id_tadenda WHERE id_contrato='" . $id_contr . "' ORDER BY id_adenda ";
  $result = pg_query($con, $sql1);
  while ($r = pg_fetch_array($result)) {
    # code...
    $num_aden = $r['nro_adenda'];
    $t_aden = $r['tipo_adenda'];
    $fi_a = $r['f_inicio'];
    $new_fi_a = date("d-m-Y", strtotime($fi_a));
    $ff_a = $r['f_termino'];
    $new_ff_a = date("d-m-Y", strtotime($ff_a));
    $resol_ren = $r['resol_renuncia'];
    $f_ren = $r['f_renuncia'];
    $new_f_ren = date("d-m-Y", strtotime($f_ren));

    $section->addText('- Contrato Administrativo de Servicios N° ' . $num_cont . ', Addenda N° ' . $num_aden . ' ' . $t_aden . ' a partir del ' . $new_fi_a . ' al ' . $new_ff_a . ' - ' . $ofic_ . ', ubicado en la ' . $ofic . ' de la Dirección Regional de Salud Tacna.', array('size' => 12), array("align" => "both"));

    if ($resol_ren == '') {
      # code...
    } else {
      $section->addText('- Resolución N° ' . $resol_ren . ' al Contrato Administrativo de Servicios N°' . $num_cont . ', Addenda N° ' . $num_aden . ' Extinguir el Contrato Administrativo de Renovación de Contrato por renuncia irrevocable a partir del ' . $new_f_ren . ' - ' . $ofic_ . ', ubicado en la ' . $ofic . ' de la Dirección Regional de Salud Tacna.', array('size' => 12), array("align" => "both"));
    }
  }

  if ($r_renun == '') {
    # code...
  } else {
    $section->addText('- Resolución N° ' . $r_renun . ' al Contrato Administrativo de Servicios N°' . $num_cont . ' Extinguir el Contrato Administrativo de Renovación de Contrato por renuncia irrevocable a partir del ' . $new_fe_renun . ' de la ' . $ofic . ' - ' . $ofic_ . ' de la Dirección Regional de Salud Tacna.', array('size' => 12), array("align" => "both"));
  }
}

$section->addText('SE EXPIDE LA PRESENTE CONSTANCIA, EN MÉRITO A LO SEÑALADO EN LA CLÁUSULA DÉCIMO OCTAVA DEL RESPECTIVO CONTRATO Y DE ACUERDO A LAS FACULTADES DELEGADAS MEDIANTE RESOLUCIÓN DIRECTORAL N°0808-2008-DEGDRRHH-DG/GOB.REG.TACNA, Y A SOLICITUD DEL INTERESADO, NO TENIENDO VALOR OFICIAL PARA ACCIÓN JUDICIAL CONTRA EL ESTADO.', array('size' => 12), array("align" => "both"));

$section->addTextBreak(1);
$section->addText('Tacna, ' . $hoy, array('size' => 11), array("align" => "end"));

$section->addTextBreak(4);
$section->addText('HJVC/GSOB/YNJL.-', array('size' => 9));

// -----------Pie de pagina


$textrun = $section->addFooter();
$textrun->addText('________________________________________________________________________________');
$textrun->addText('Calle Los Nardos N° 33 Pescaserolli', array('size' => 9), array("align" => "center", "spaceAfter" => 0));
$textrun->addText('Teléfono Fax: (052) 423872 - 245798 Tacna - Perú', array('size' => 9), array("align" => "center", "spaceAfter" => 0));
$textrun->addText('Correo electrónico: dg@diresatacna.gob.pe', array('size' => 9), array("align" => "center", "spaceAfter" => 0));



// $phpWord->getCompability()->setOoxmlVersion(15);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename="constancia_' . $cas_nombre . '.docx"');

// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');



/* Note: we skip RTF, because it's not XML-based and requires a different example. */ 
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */