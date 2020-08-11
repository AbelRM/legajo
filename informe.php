<?php
require_once 'phpword/vendor/autoload.php';
include 'conexion_pg.php';

$idmovim=$_POST['idmovim'];
$asunto=$_POST['inf_asunto'];
$iniciales=$_POST['inf_emisor'];
$referencia_adj=$_POST['referencia_adj'];
$referencia_adj = str_replace("\r\n", "\t\t\t\t\t\t", $referencia_adj);

// echo $referencia_adj;
$cons="SELECT * FROM ficha, t_cargo, t_nivel, t_ubicas, detmov where ficha.idmovim=detmov.idmovim and cast(ficha.idmovim as integer)=$idmovim  and ficha.d1_codcar=t_cargo.codcar and ficha.d1_codniv=t_nivel.codnivel and ficha.codubic=t_ubicas.codofic ";
$query=pg_query($con,$cons);
while($rw=pg_fetch_array($query)){    
$nombres=$rw['d1_nombres'].' '.$rw['d1_apepat'].' '.$rw['d1_apemat'];
$plaza=$rw['codplaza'];
$cargo=$rw['descar'];
$nivel=$rw['denom'];
$ofic=$rw['oficestr'];
$f_nomb=$rw['d1_fecing'];
$dni=$rw['d1_dni'];
$nombre=$rw['d1_apepat'].' '.$rw['d1_apemat'].' '.$rw['d1_nombres'];

    if ($rw['codtipacc']=='07001') {
        $f_contrato=$rw['fecefe'];
    } else{
        $f_contrato='[No registra]';
    }

    if ($rw['codtipacc']=='14001') {
        $f_nombr=$rw['fecefe'];
    }


}


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
$section -> addText('INFORME N°        -'.$year.'-SERL-EARRHH-DEGDRRHH/DRS.T/GOB.REG.TACNA',array('bold' => true, 'underline' => 'single'));
$section -> addTextBreak(1);
// $section -> addText('ASUNTO'."\t\t\t".':'."\t".$asunto);
// $section -> addText('APELLIDOS Y NOMBRES'."\t".':'."\t".$nombre);
// $section -> addText('CARGO Y NIVEL'."\t\t".':'."\t".$cargo."\t\t".$nivel);
// $section -> addText('CÓDIGO'."\t\t\t".':'."\t".$plaza);
// $section -> addText('FECHA DE INGRESO'."\t\t".':');

// $sql="SELECT * FROM detmov INNER JOIN t_tipacc ON t_tipacc.codtipacc=detmov.codtipacc INNER JOIN t_docum ON t_docum.codtipdoc=detmov.codtipdoc WHERE idmovim='".$idmovim."' ";
// $cons=pg_query($con,$sql);
// while ($row=pg_fetch_array($cons)) {
//     $movim=$row['detalle']; //detmov.catdetalle
//     $f_efec=$row['fecefe'];
//     $f_doc=$row['fecdoc'];
//     $docum=$row['docum'];
//     $t_docum=$row['catdetalle'];

// $section -> addText("\t\t\t\t\t".$movim.'.-', array('bold' => true));
// $section->addText("\t\t\t\t\t".'A partir del '.$f_efec, array("spaceAfter"=>0,"lineHeight"=>1.0));
// $section->addText("\t\t\t\t\t".'Según '.$t_docum.' N° '.$docum.' de fecha '.$f_doc);

// }

// $section->addText('REFERENCIA'."\t\t\t".':');

// $sql2="SELECT * FROM t_ubicas INNER JOIN ficha ON ficha.codubic=t_ubicas.codofic WHERE idmovim='".$idmovim."' ";
// $cons2=pg_query($con,$sql2);
// $row=pg_fetch_array($cons2);
//     $dir_ejec=$row['estruc1'];
//     $equipo=$row['oficestr'];
//     $unid_e=$row['estruc'];
// $section->addText('UBICACIÓN'."\t\t\t".':');
// $section->addText("\t\t\t\t\t".$dir_ejec);
// $section->addText("\t\t\t\t\t".$equipo);
// $section->addText("\t\t\t\t\t".$unid_e);


// ------------tabla---------------
$styleTable = array('borderSize' => 0, 'borderColor' => '888888', 'cellMargin' => 140); // el borde de la tabla de 6px, color de borde = #888 , ...
// $styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
$phpWord->addTableStyle('table1', $styleTable,$styleFirstRow);

$table1 = $section->addTable("table1"); // creamos la tabla
$table1->addRow(); // agregamos una fila a la tabla
$table1->addCell(4500)->addText("ASUNTO");
$table1->addCell(1000)->addText(":"); // agregamos la columna 1
$table1->addCell(9000)->addText($asunto); // agregamos la columna 2

$table1->addRow(); // agregamos otra fila pra los datos
$table1->addCell(4500)->addText("APELLIDOS Y NOMBRES");
$table1->addCell(1000)->addText(":"); // fila 2, columna 1, debe coincidir con la columna de la fila anterior
$table1->addCell(9000)->addText($nombre); // fila 2, columna 2, debe coincidir con la columna de la fila anterior

$table1->addRow();
$table1->addCell(4500)->addText("CARGO Y NIVEL");
$table1->addCell(1000)->addText(":");
$table1->addCell(9000)->addText($cargo."\t\t".$nivel);

$table1->addRow();
$table1->addCell(4500)->addText("CÓDIGO");
$table1->addCell(1000)->addText(":");
$table1->addCell(9000)->addText($plaza);

$table1->addRow();
$celda=$table1->addCell(4500)->addText("FECHA DE INGRESO");
$table1->addCell(1000)->addText(":");
$celda =$table1->addCell(9000);
$sql="SELECT * FROM detmov INNER JOIN t_tipacc ON t_tipacc.codtipacc=detmov.codtipacc INNER JOIN t_docum ON t_docum.codtipdoc=detmov.codtipdoc WHERE idmovim='".$idmovim."' ";
$cons=pg_query($con,$sql);
while ($row=pg_fetch_array($cons)) {
    $movim=$row['detalle']; //detmov.catdetalle
    $f_efec=$row['fecefe'];
    $f_doc=$row['fecdoc'];
    $docum=$row['docum'];
    $t_docum=$row['catdetalle'];


$celda->addText($movim.'.-', array('bold' => true, 'underline' => 'single'));
$celda->addText('A partir del '.$f_efec,null, array("spaceAfter"=>0));
$celda->addText('Según '.$t_docum.' N° '.$docum.' de fecha '.$f_doc,null, array("spaceAfter"=>0));

}

$table1->addRow();
$celda=$table1->addCell(4500)->addText("REFERENCIA");
$table1->addCell(1000)->addText(":");
$celda=$table1->addCell(9000);
$celda -> addText('Adjunta.-', array('bold' => true, 'underline' => 'single'));
$celda -> addText($referencia_adj);


$table1->addRow();
$celda=$table1->addCell(4500)->addText("UBICACIÓN");
$table1->addCell(1000)->addText(":");
$celda=$table1->addCell(9000);
$sql2="SELECT * FROM t_ubicas INNER JOIN ficha ON ficha.codubic=t_ubicas.codofic WHERE idmovim='".$idmovim."' ";
$cons2=pg_query($con,$sql2);
$row=pg_fetch_array($cons2);
    $dir_ejec=$row['estruc1'];
    $equipo=$row['oficestr'];
    $unid_e=$row['estruc'];
$celda -> addText($dir_ejec,null, array("spaceAfter"=>0));
$celda -> addText($equipo,null, array("spaceAfter"=>0));
$celda -> addText($unid_e,null, array("spaceAfter"=>0));

//-------------fin tabla----------
$section -> addTextBreak(4);
$section -> addText($iniciales.'.-', array('size'=> 9));



// $phpWord->getCompability()->setOoxmlVersion(15);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename="informe_escalafonario.docx"');

// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');



/* Note: we skip RTF, because it's not XML-based and requires a different example. */
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */