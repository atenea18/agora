var urls = "http://agora.net.co/form_jack";


$(function()
{

console.log('hol');

	var url = $('#url').val();
	var arreglo = url.split('/');
	

	var numRegistro = parseInt($('#numRegistro').val());
	var numInputs = parseInt($('#numInputs').val());
	var posicionInput = parseInt(numInputs / numRegistro)+1;

	var numMinimo = parseInt($('#minimo').val());
	var numMaximo = parseInt($('#maximo').val());
	

	var databaseDB = $('#databaseDB').val();
	var grupoDB = $('#grupoDB').val();
	var gradoDB = $('#gradoDB').val();
	var asignaturaDB = $('#asignaturaDB').val();


	var porcentajeCog = (parseInt($('#porcentaje_grupo1').val()) / 100).toFixed(2);
	var porcentajePer = (parseInt($('#porcentaje_grupo2').val()) / 100).toFixed(2);
	var porcentajeSol =(parseInt($('#porcentaje_grupo3').val()) / 100).toFixed(2);
	var porcentajeAe =(parseInt($('#porcentaje_autoeva').val()) / 100).toFixed(2);
	var porcentajePro =(parseInt($('#porcentaje_proyect').val()) / 100).toFixed(2);


	var cantidadDC = (parseInt($('#cantidadDC').val()));
	var numPeriodo = (parseInt($('#periodoDB').val()));

	if(databaseDB == 'agoranet_liceo'){
		$('.tagAuto').each(function(i, element){
			$(element).remove();
		});
	}




	$('#content-formulario-registro').hide();
	$('#content-div-dc').hide();

	$('#text-desempeno').keyup(function(){

		var tAlto = $('#t-alto').val();
		var tBasico = $('#t-basico').val();
		var tBajo = $('#t-bajo').val();

		var textoSuperior = $('#text-desempeno').val();
		if(textoSuperior==''){
			tAlto = '';
			tBasico = '';
			tBajo = '';
		}
		$('#text-alto').val((tAlto + textoSuperior));
		$('#text-basico').val((tBasico + textoSuperior));
		$('#text-bajo').val((tBajo + textoSuperior));

		
	});

	$('#btn-guardar-desemp').click(function(ev){

		ev.preventDefault();



		var gradoInsertar =  $('#gradoInsertar').val();
		var areaInsertar = $('#AreaInsertar').val();
		var asignaturaInsertar = $('#AsigInsertar').val();
		var periodoInsertar =  $('#periodoInsertar').val();
		var categoriaInsertar =  $('#categoriaInsertar').val();
		var textSuperior = $('#text-desempeno').val();

		var textRefuerzo = $('#text-refuerzo').val();
		
		var textAlto = $('#text-alto').val();
		var textBajo = $('#text-bajo').val();
		var textBasico = $('#text-basico').val();
		var textRecomendacion = $('#text-recomendacion').val();


		if(areaInsertar=='0') 
			{ $('#AreaInsertar').addClass('error');}
		else
			{ $('#AreaInsertar').removeClass('error');}

		if(asignaturaInsertar=='0') 
			{$('#AsigInsertar').addClass('error');} 
		else 
			{$('#AsigInsertar').removeClass('error');}

		if(textSuperior=='') 
			{$('#text-desempeno').addClass('error');} 
		else 
			{$('#text-desempeno').removeClass('error')}

		if(areaInsertar!='0' && asignaturaInsertar !='0' && textSuperior !='' )
		{


			var dataString = 'area='+ areaInsertar + '&grado='+ gradoInsertar + '&asignatura='+ asignaturaInsertar + '&periodo='+ periodoInsertar + '&categoria='+ categoriaInsertar+ '&superior='+ textSuperior + '&alto='+ textAlto + '&basico='+ textBasico + '&refuerzo='+ textRefuerzo +'&bajo='+ textBajo + '&recomendacion='+ textRecomendacion;
			
			
			$.ajax({
				method: "POST",
				url: urls+"/Desempeno/nuevoRegistro/"+databaseDB,
				data: dataString
			})
			.done(function(datos) {
				
			});

			$('#form-select').show(170);
			$('#content-formulario-registro').hide(100);
			


			$('#text-desempeno').val('');
			$('#text-refuerzo').val('');
			$('#text-alto').val('');
			$('#text-basico').val('');
			$('#text-bajo').val('');
			$('#text-recomendacion').val('');
			
		}


		




	});

	

	$('#btn-cancelar').click(function(){
		$('#form-select').show(170);
		$('#content-formulario-registro').hide(100);

		$('#text-desempeno').val('');
		$('#text-refuerzo').val('');
		$('#text-alto').val('');
		$('#text-basico').val('');
		$('#text-bajo').val('');
		$('#text-recomendacion').val('');
	});
	

	$('#gradoInsertar').change(function(){

		
		var gradoIns = $(this).val();
				

		$.ajax({
			method: "POST",
			url: urls+"/Desempeno/getAreasGrados/"+gradoIns+'/'+databaseDB,
			data: ''
		})
		.done(function( datos ) {
			$('#AreaInsertar').empty().append(datos);
		});


		$('#AreaInsertar').change(function(){
			var AreaIns = $('#AreaInsertar').val();

			$.ajax({
				method: "POST",
				url: urls+"/Desempeno/getAsignaturaGrados/"+AreaIns+"/"+gradoIns+'/'+databaseDB,
				data: ''
			})
			.done(function(datos) {
				$('#AsigInsertar').empty().append(datos);

			});
		});

		

		

		

	});



	/**
	* Subtitles
	*/
	

	$('#btn-crear-desemp').click(function(){
		$('#tabla-contentt').empty();
		$('#form-select').hide(100);
		$('#content-formulario-registro').show(200);

		$('#text-desempeno').val('');
		$('#text-refuerzo').val();
		$('#text-alto').val('');
		$('#text-basico').val('');
		$('#text-bajo').val('');
		$('#text-recomendacion').val('');

	});

	

	$('#btn-finalizar').click(function(){
		$('#form-select').show(170);
		$('#content-formulario-registro').hide(100);

		$('#text-desempeno').val('');
		$('#text-refuerzo').val();
		$('#text-alto').val('');
		$('#text-basico').val('');
		$('#text-bajo').val('');
		$('#text-recomendacion').val('');
	});




	
	

	$('[data-toggle="tooltip"]').tooltip()

	$.ajax({
		method: "POST",
		url: urls+"/Indicadores/getIndicadoresJson/"+gradoDB+"/"+asignaturaDB+"/"+1+"/"+1+"/"+arreglo[4],
		data: ''
	})
	.done(function( datos ) {
		
		$('#tabla-contentt').empty().append(datos);

		$('#table_id').DataTable({

			paging: false,
			"autoWidth": false,
			"bFilter": false,

			"oLanguage": {
				"sProcessing":     "Procesando...",
				"sLengthMenu": 'Mostrar <select>'+
				'<option value="10">10</option>'+
				'<option value="20">20</option>'+
				'<option value="30">30</option>'+
				'<option value="40">40</option>'+
				'<option value="50">50</option>'+
				'<option value="-1">All</option>'+
				'</select> registros',    
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Filtrar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Por favor espere - cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			}
		});

		$('#table_id').find('a.ntf').hide();
		setSeleccionarDesemp(gradoDB, grupoDB, asignaturaDB, numPeriodo, databaseDB);

		
		

		$('#form-select').find('select').change(function(event) {


			
			var asignaturaIndicadores = $('#form-select').find('select[name=asignaturaSelect]').val();
			var gradosIndicadores = $('#form-select').find('select[name=gradoSelect]').val();
			var periodoIndicadores = $('#form-select').find('select[name=periodoSelect]').val();
			var categoriaIndicadores = $('#form-select').find('select[name=categoriaSelect]').val();

			$.ajax({
				method: "POST",
				url: urls+"/Indicadores/getIndicadoresJson/"+gradosIndicadores+"/"+asignaturaIndicadores+"/"+categoriaIndicadores+"/"+periodoIndicadores+"/"+databaseDB,
				data: ''
			})
			.done(function(datos) {
				
				$('#tabla-contentt').empty().append(datos);			
				$('#table_id').DataTable({

					paging: false,
					"autoWidth": false,
					"bFilter": false,

					"oLanguage": {
						"sProcessing":     "Procesando...",
						"sLengthMenu": 'Mostrar <select>'+
						'<option value="10">10</option>'+
						'<option value="20">20</option>'+
						'<option value="30">30</option>'+
						'<option value="40">40</option>'+
						'<option value="50">50</option>'+
						'<option value="-1">All</option>'+
						'</select> registros',    
						"sZeroRecords":    "No se encontraron resultados",
						"sEmptyTable":     "Ningún dato disponible en esta tabla",
						"sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
						"sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
						"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
						"sInfoPostFix":    "",
						"sSearch":         "Filtrar:",
						"sUrl":            "",
						"sInfoThousands":  ",",
						"sLoadingRecords": "Por favor espere - cargando...",
						"oPaginate": {
							"sFirst":    "Primero",
							"sLast":     "Último",
							"sNext":     "Siguiente",
							"sPrevious": "Anterior"
						},
						"oAria": {
							"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
						}
					}
				});







				setSeleccionarDesemp(gradoDB, grupoDB, asignaturaDB, numPeriodo, databaseDB);
				

			});

		});
		


	});


	

	$(document).on('ready',function(){       
	
		$('tr').find('input').blur(function(ev){

			var idEstudiante = ev.currentTarget.dataset.id;
			var desempeno = ev.currentTarget.dataset.desemp;
			var inputsDesem = getInputsDesempeno(idEstudiante, desempeno)
			


	 	})
		.focus(function(){
			$('#content-control').removeClass('control-desp');
			$('#content-control').addClass('aparecer');
		})
		.focusout(function(){
			$('#content-control').removeClass('aparecer');
			$('#content-control').addClass('control-desp');
		})
		.keyup(function(ev){	 		

			var idEstudiante = ev.currentTarget.dataset.id;
			var desempeno = ev.currentTarget.dataset.desemp;
			var inputsDesem = getInputsDesempeno(idEstudiante, desempeno);

			if( desempeno == 'dc'){
				
				var desempenoGrupo = 'grupodc';
				var inputPorcentajeDC = getInputsDesempeno(idEstudiante, desempenoGrupo )[0];
				console.log(inputPorcentajeDC);
				var prom = promedio(inputsDesem, numMinimo, numMaximo);
				inputPorcentajeDC.value = (porcentajeCog * prom).toFixed(2);
				$(inputPorcentajeDC).attr('data-m', 'true');
			}

			if( desempeno == 'dp'){
				var desempenoGrupo = 'grupodp';
				var inputPorcentajeDP = getInputsDesempeno(idEstudiante, desempenoGrupo )[0];
				var prom = promedio(inputsDesem, numMinimo, numMaximo);
				inputPorcentajeDP.value = (porcentajePer * prom).toFixed(2);
				$(inputPorcentajeDP).attr('data-m', 'true');

			}

			if( desempeno == 'dt'){
				var desempenoGrupo = 'grupodt';
				var inputPorcentajePr = getInputsDesempeno(idEstudiante, desempenoGrupo )[0];
				var prom = promedio(inputsDesem, numMinimo, numMaximo);
				inputPorcentajePr.value = (porcentajePro * prom).toFixed(2);
				$(inputPorcentajePr).attr('data-m', 'true');
			}

			if( desempeno == 'ds'){
				var desempenoGrupo = 'grupods';
				
				var inputPorcentajeDS = getInputsDesempeno(idEstudiante, desempenoGrupo )[0];
				console.log(inputPorcentajeDS);
				var prom = promedio(inputsDesem, numMinimo, numMaximo);
				inputPorcentajeDS.value = (porcentajeSol * prom).toFixed(2);
				$(inputPorcentajeDS).attr('data-m', 'true');

			}

			if( desempeno == 'da'){
				var desempenoGrupo = 'grupoda';
				var inputPorcentajeDA = getInputsDesempeno(idEstudiante, desempenoGrupo )[0];
				var prom = promedio(inputsDesem, numMinimo, numMaximo);
				inputPorcentajeDA.value = (porcentajeAe * prom).toFixed(2);
				$(inputPorcentajeDA).attr('data-m', 'true');
				
			}


			var inputListas = getInputsLista(idEstudiante,'lista')
			var sumaValores=0;

			inputListas.each(function(i, element){
				if(element.value !=''){
					sumaValores += parseFloat(element.value);
				}
			});
			

			var periodo = sumaValores.toFixed(2);	 		
			var desempenoPeriodo = 'periodo';
			var inputPeriodo = getInputsDesempeno(idEstudiante, desempenoPeriodo)[0];
			inputPeriodo.value = periodo;

			var inputsAModificar = $('tr[id='+idEstudiante+']').find('input');

			var stringCadena='';

			inputsAModificar.each(function(i,element){
				stringCadena += element.name+":'"+element.value+"',";
			});



			stringCadena = "{"+stringCadena+"}";

		
			var json = JSON.stringify(eval("(" + stringCadena + ")"));
			var obj = JSON.parse(json);


			$.ajax({
				method: "POST",
				url: urls+"/Evaluacion/setUpdate/"+idEstudiante+"/"+grupoDB+"/"+asignaturaDB+"/"+databaseDB,
				data: obj
			})
			.done(function( msg ) {

			});



		})
		.keydown(function(ev){
			
			var aba = 40;
			var arri = 38;
			var izq = 37;
			var der= 39;

			if((ev.keyCode==aba || ev.which==aba))
			{		  	
				var cont = ev.currentTarget.dataset.cont;			
				cont = parseInt(cont)
				var de = $('input[data-cont='+(cont+posicionInput)+']');
				if(de){de.focus();}
				ev.preventDefault();
			}

			if((ev.keyCode==arri || ev.which==arri))
			{		  	
				var cont = ev.currentTarget.dataset.cont;			
				cont = parseInt(cont)
				var de = $('input[data-cont='+(cont-posicionInput)+']');
				if(de){de.focus();}
				ev.preventDefault();
			}

			if((ev.keyCode==izq || ev.which==izq))
			{		  	
				var cont = ev.currentTarget.dataset.cont;			
				cont = parseInt(cont)
				var de = $('input[data-cont='+(cont-1)+']');
				if(de){de.focus();}
				ev.preventDefault();
			}

			if((ev.keyCode==der || ev.which==der))
			{		  	
				var cont = ev.currentTarget.dataset.cont;			
				cont = parseInt(cont)
				var de = $('input[data-cont='+(cont+1)+']');
				if(de){de.focus();}
				ev.preventDefault();
			}


		});

	});	

});


function getDT(idEstudiante){	
	console.log('Hola');
}



function setSeleccionarDesemp(idGrado, idGrupo, idAsig, periodo, $database){
	$('#table_id').find('button[data-fun=seleccionar]').each(function(i,element){
			element.addEventListener('click', function(ev){
				
				var categoriaIndicadores = $('#form-select').find('select[name=categoriaSelect]').val();
				
				var array = Array();
				let elth;
				$('#item-posicion').find('.posiciones[data-tipo='+categoriaIndicadores+'] ').each(function(i,element){
					array[i] = $(element).data('update');
					if(i==0){elth = element;}
				});
				
				if(array.length > 0)
				{
					var pos = array[0];
					var desem = ev.currentTarget.dataset.id;
					
					var dataString = 'grado='+ idGrado + '&grupo='+ idGrupo + '&asignatura='+ idAsig + '&periodo='+ periodo + '&posicion='+ pos+ '&cod_desemp='+ desem;
					$.ajax({
               			method: "POST",
               			url: urls+"/Indicadores/insertarCodigosDesemp/"+$database, 
               			data: dataString
               		})
               		.done(function(datos) {
               			
               			$('#table_id').find('.ntf[data-id="desem" ]').show(100);
               			$(elth).append(desem);
               			$(elth).removeClass('posiciones');
               				
               			
               			

               		});
				}
			});
		});

		$("body").on( "click", function() {
		$("body").css('padding-right','10px');
	});
}

function getValuesGrupos(idEstudiante, desempenoGrupo){

	var inputPorcentajes = getInputsDesempeno(idEstudiante, desempenoGrupo )[0];
	return parseFloat(inputPorcentajes.value);
}

function getInputsDesempeno(idEstudiante, desempeno){
	var inputsDesem = $('tr[id='+idEstudiante+']').find('input[data-desemp='+desempeno+']');	 	
	return inputsDesem;
}

function getInputsLista(idEstudiante, lista){
	var inputsDesem = $('tr[id='+idEstudiante+']').find('input[data-grupo='+lista+']');	 	
	return inputsDesem;
}

function promedio(objetosInputs, valorMinimo, valorMaximo){
	var contador = 0;
	var suma = 0;
	objetosInputs.each(function(i,element){
		if(element.value.length > 0){

			if(parseFloat(element.value)>= valorMinimo && element.value <= valorMaximo){
				contador++;
				suma += parseFloat(element.value.replace(',','.').replace(' ',''));
				$(element).attr('data-m', 'true');
				$(element).removeClass('error');
			}else{
				$(element).attr('data-m', 'false');
				$(element).addClass('error');
				$(element).val('');
			}		
		}
		if(element.value.length == 0){
			$(element).removeClass('error');
			$(element).val('');
		}
	});
	return contador>0?(suma/contador).toFixed(2):0;	
}







