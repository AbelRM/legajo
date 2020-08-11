<?php
require_once 'vendor/autoload.php';

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
$section = $phpWord->addSection();
// Adding Text element to the Section having font styled by default...
setlocale(LC_TIME, 'es_ES.UTF-8'); //Para convertir la fecha local en español :)
$hoy=strftime("%d de %B de %Y");
$year=date("Y");

$section -> addText('Tacna, '.$hoy.'');
$section -> addTextBreak(1);
$section -> addText('INFORME N°      -'.$year.'-SERL-EARRHH-DEGDRRHH/DRS.T/GOB.REG.TACNA',array('bold' => true, 'underline' => 'single'));
$section -> addTextBreak(1);
$section -> addText('ASUNTO'."\t\t\t".':'."\t".'Informe Escalafonario');
$section -> addText('APELLIDOS Y NOMBRES'."\t".':'."\t".'CHANGLLIO ROJAS JUAN JOSÉ EVARISTO');
$section -> addText('CARGO Y NIVEL'."\t\t".':'."\t".'QUÍMICO FARMACÉUTICO I       NIVEL IV');
$section -> addText('CÓDIGO'."\t\t\t".':'."\t".'560921');
$section -> addText('FECHA DE INGRESO'."\t".':'."\t".'Contrato.-');
$section -> addText('INASISTENCIAS'."\t".':'."\t".'Registro de inasistencias');
$section -> addText('LIC. PARTICULARES'."\t".':'."\t".'Registros de licencias');
$section -> addText('AMONESTACIONES'."\t".':'."\t".'Registro de amonestaciones');
$section -> addText('SANCION SGH'."\t".':'."\t".'Registro de amonestaciones');
$section -> addText('BONIF. PERSONAL'."\t".':'."\t".'Registro de amonestaciones');
$section -> addText('TIEMPO DE SERVICIO'."\t".':'."\t".'Registro de amonestaciones');
$section -> addText('UBICACIÓN'."\t".':'."\t".'D.E.G. / Equipo de RRHH / Sistemas / DIRECCION REGIONAL DE SALUD');


// Adding Text element with font customized inline...
$section->addText(
    '"Great achievement is usually born of great sacrifice, '
        . 'and is never the result of selfishness." '
        . '(Napoleon Hill)',
    array('name' => 'Tahoma', 'size' => 11)
);

// Adding Text element with font customized using named font style...
$fontStyleName = 'oneUserDefinedStyle';
$phpWord->addFontStyle(
    $fontStyleName,
    array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
);
$section->addText(
    '"The greatest accomplishment is not in never falling, '
        . 'but in rising again after you fall." '
        . '(Vince Lombardi)',
    $fontStyleName
);

// Adding Text element with font customized using explicitly created font style object...
$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(true);
$fontStyle->setName('Tahoma');
$fontStyle->setSize(13);
$myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
$myTextElement->setFontStyle($fontStyle);

// $phpWord->getCompability()->setOoxmlVersion(15);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename="informe_escalafonario.docx"');

// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');



/* Note: we skip RTF, because it's not XML-based and requires a different example. */
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */