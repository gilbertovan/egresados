 
$(document).ready(function(){

		$('#agregarPerfil').on('submit',function(e){
		e.preventDefault();
		var datos =$(this).serializeArray();
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType:'json',
			success: function(data){
				
						
				var resultado = data;
				if (resultado.respuesta == 'exito') {
			  document.location.href = "CuestionarioB.php";
					
				} else{
					Swal(
					'Error',
					'Verifique los campos ',
					'error'
					)
				}
			} 
		});
	});



  	$('#agregar').on('submit',function(e){
		e.preventDefault();
		var datos =$(this).serializeArray();
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType:'json',
			success: function(data){
			
				
				var resultado = data;
				if (resultado.respuesta == 'exito') {
			  document.location.href = "CuestionarioU.php";
					
				} else{
					Swal( 'Error',
						  'Verifique los campos ',
						  'error'
					)
				}
			}
		});
	});
	$('#agregar_ul').on('submit',function(e){
		e.preventDefault();
		var datos =$(this).serializeArray();
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType:'json',
			success: function(data){
			
				
				var resultado = data;
				if (resultado.respuesta == 'exito') {
			  document.location.href = "CuestionarioD.php";
					
				} else{
					Swal( 'Error',
						  'Verifique los campos ',
						  'error'
					)
				}
			}
		});
	});


  	$('#desProf').on('submit',function(e){
		e.preventDefault();
		var datos =$(this).serializeArray();
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType:'json',
			success: function(data){
			
				
				var resultado = data;
				if (resultado.respuesta == 'exito') {
				document.location.href = "CuestionarioExp.php";
			  	 
					
				} else{
					Swal( 'Error',
						  'Verifique los campos',
						  'error'
					)
				}
			}
		});
	});
  
  	$('#expectativa').on('submit',function(e){
		e.preventDefault();
		var datos =$(this).serializeArray();
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType:'json',
			success: function(data){
			
				
				var resultado = data;
				if (resultado.respuesta == 'exito') {
			  	 document.location.href = "CuestionarioPar.php";
					
				} else{
					Swal( 'Error',
						  'Verifique los campos',
						  'error'
					)
				}
			}
		});
	});

	$('#participacion').on('submit',function(e){
		e.preventDefault();
		var datos =$(this).serializeArray();
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType:'json',
			success: function(data){
			
				
				var resultado = data;
				if (resultado.respuesta == 'exito') {
				
			  	  document.location.href = "CuestionarioCo.php";
					
				} else{
					Swal( 'Error',
						  'Verifique los campos',
						  'error'
					)
				}
			}
		});
	});


  	$('#Comentarios').on('submit',function(e){
		e.preventDefault();
		var datos =$(this).serializeArray();
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType:'json',
			success: function(data){
			
				
				var resultado = data;
				if (resultado.respuesta == 'exito') {
			  	Swal.fire(
 					'¡Muchas gracias por su gentil colaboración!',
 					'Los datos han sido guardados con éxito',
 					'success'
					)
			  	setTimeout(function(){
					document.location.href = 'index.php';
					window.open('fpdf/acuse.php', '_blank');
					 }, 2000);
			  	
					
				} else{
					Swal( 'Error',
						  'Verifique los campos ',
						  'error'
					)
				}
			}
		});
	});

});
