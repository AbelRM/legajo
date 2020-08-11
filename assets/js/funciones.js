jQuery(document).ready(function($){
			load(1);
		});  

function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscador.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./images/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				},
				error:function(error){
					console.log(error);
				}
			})
		}



function abrir(seccion){
	$('.secciones').hide();
	$('.regresar').show();
	$('.'+seccion).show();
}

function regresar(){
	$('.regresar').hide();
	$('.secciones').show();
	$('.seccion_i').hide();
	$('.seccion_ii').hide();
	$('.seccion_iii').hide();
	$('.seccion_iv').hide();
	$('.seccion_v').hide();
	$('.seccion_vi').hide();
	$('.seccion_vii').hide();
	$('.seccion_viii').hide();
	$('.seccion_ix').hide();
	$('.seccion_x').hide();
	$('.seccion_xi').hide();
	$('.seccion_xii').hide();
	$('.seccion_xiii').hide();
	$('.seccion_informe').hide();
}

function subir(x){
	$('.subir_'+x).show();
	$('.subir').hide();
}