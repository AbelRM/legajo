<?php

include 'conexion_pg.php';

$consult="SELECT in_elect, codnresol, no_resol, no_fec_res, no_fec_apa, d1_dni, ficha.idmovim FROM ing_salud, ficha";

// $d_info="SELECT * FROM ficha WHERE cast(idmovim as integer) = $idmovim ";
    $res=pg_query($con,$consult);
    $i=1;
    while($d=pg_fetch_array($res)){
    	$dni_i=$d['in_elect'];
    	$dni_f=$d['d1_dni'];

    	$idmovim=$d['idmovim'];
    	$cod_taccion='14001'; //cod para nombramiento
    	$cod_tdoc=$d['codnresol'];
    	$doc=$d['no_resol'];
    	$f_resol=$d['no_fec_res'];
    	$f_efec=$d['no_fec_apa'];
    	$fecha=date("d/m/Y");
    	// $hora=date("H");

    	// echo $dni_i."/".$dni_f."***";
    	// echo $dni_i;
    	

    	if ($dni_i==$dni_f) {
    		echo $dni_i."-".$i."/";
    		$i=$i+1;
    		// -
    		$sql= "INSERT INTO detmov ( idmovim, codtipacc, codtipdoc, docum, fecdoc, fecefe, fereg) VALUES ('".$idmovim."','".$cod_taccion."','".$cod_tdoc."','".$doc."','$f_resol','$f_efec','$fecha')";

			$result=pg_query($con,$sql);
			$rw=pg_fetch_row($result);
			// $id=$rw[0];
			if (!$result){
				echo "Ocurrió un error.\n";

			}else{
				echo "**".$i."**";
			}
    	} 
    };


?>