$(document).ready(function(){

	$('#agregar_c').on('submit',function(e){
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
 					 'Correcto',
 					 'Se ha agregado los datos correctamente',
 					 'success'
					)
				} else{
					Swal( 'Error',
						  'Verifique los campos',
						  'error'
					)
				}
			}
		});
	});



$('#agregar-admin').on('submit',function(e){
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
 					 'Correcto',
 					 'Se ha creado el administrador correctamente',
 					 'success'
					)
				} else{
					Swal( 'Error',
						  'Puede que el nombre de usuario ya no este disponible',
						  'error'
					)
				}
			}
		});
	});


	$('#editar-admin').on('submit',function(e){
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
 					 'Correcto',
 					 'Se guardó correctamente ',
 					 'success'
					)
				} else{
					Swal( 'Error',
						  'Verifique los campos',
						  'error'
					)
				}
			}
		});
	});

	$('.borrar_registro').on('click',function(e){
		e.preventDefault();

		var id = $(this).attr('data-id');
		var tipo = $(this).attr('data-tipo');
		Swal.fire({
		  title: '¿Está seguro de eliminar?',
		  text: "Una vez eliminado no se podrá recuperar el registro",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#00315b',
		  cancelButtonColor: '#cd6701',
		  confirmButtonText: 'Si, eliminar',
		  cancelButtonText: 'Cancelar'
		}).then((result) => {
		  if (result.value) {
		

			$.ajax({
				type: 'POST',
				data: {
					'id' : id,
					'registro': 'eliminar'

				},
				url: 'modelo-'+tipo+'.php',
				success:function(data){
					var resultado = JSON.parse(data);

					if(resultado.respuesta == 'exito'){
						
						 Swal.fire(
						      'Eliminado',
						      'Registro eliminado',
						      'success'
						    )
						    jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
						  

					} else{
						Swal( 'Error',
						  'No se pudo eliminar',
						  'error'
					)
					}
					
				}
			})
		}
		});
	});


	$('#agregar-trabajo').on('submit',function(e){
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
 					 'Correcto',
 					 'Se ha agregado una nueva vacante correctamente',
 					 'success'
					)
				} else{
					Swal( 'Error',
						  'Verifique los campos ',
						  'error'
					)
				}
			}
		});
	});


	$('#guardar-regist').on('submit',function(e){
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
 					 'Correcto',
 					 'Se ha actualizado la vacante correctamente',
 					 'success'
					)
				} else{
					Swal( 'Error',
						  'Verifique loso campos ',
						  'error'
					)
				}
			}
		});
	});


	$('.borrar_registroT').on('click',function(e){
		e.preventDefault();

		var id = $(this).attr('data-id');
		var tipo = $(this).attr('data-tipo');
		Swal.fire({
		  title: '¿Está seguro de eliminar?',
		  text: "Una vez eliminado no se podrá recuperar el registro",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#00315b',
		  cancelButtonColor: '#cd6701',
		  confirmButtonText: 'Si, eliminar',
		  cancelButtonText: 'Cancelar'
		}).then((result) => {
		  if (result.value) {
		

			$.ajax({
				type: 'POST',
				data: {
					'id' : id,
					'registr': 'eliminar'

				},
				url: 'modelos-'+tipo+'.php',
				success:function(data){
					console.log(data);
					var resultado = JSON.parse(data);

					if(resultado.respuesta == 'exito'){
						
						 Swal.fire(
						      'Eliminado',
						      'Registro eliminado',
						      'success'
						    )
						    jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
						  

					} else{
						Swal( 'Error',
						  'No se pudo eliminar',
						  'error'
					)
					}
					
				}
			})
		}
		});
	});

	$('#agregar_egresado').on('submit',function(e){
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
 					 'Correcto',
 					 'Se ha creado el egresado correctamente',
 					 'success'
					)
				


				} else{
					Swal( 'Error',
						  'Nombre de Usuario o correo electrónico no está disponible o ya se encuentra registrado',
						  'error'
					)
				}
			}
		});
	});


	$('#guardar-regis').on('submit',function(e){
		e.preventDefault();
		var datos =$(this).serializeArray();
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType:'json',
			success: function(data){
				console.log(data);
				
				var resultado = data;
				if (resultado.respuesta == 'exito') {
					Swal.fire(
 					 'Correcto',
 					 'Se ha modificado correctamente',
 					 'success'
					)
				} else{
					Swal( 'Error',
						  'Nombre de Usuario o correo electrónico no está disponible o ya se encuentra registrado',
						  'error'
					)
				}
			}
		});
	});



	$('.borrar_registroE').on('click',function(e){
		e.preventDefault();

		var id = $(this).attr('data-id');
		var tipo = $(this).attr('data-tipo');
		Swal.fire({
		  title: '¿Está seguro de eliminar?',
		  text: "Una vez eliminado no se podrá recuperar el registro",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#00315b',
		  cancelButtonColor: '#cd6701',
		  confirmButtonText: 'Si, eliminar',
		  cancelButtonText: 'Cancelar'
		}).then((result) => {
		  if (result.value) {
		

			$.ajax({
				type: 'POST',
				data: {
					'id' : id,
			
					'regis': 'eliminar'

				},
				url: 'model-'+tipo+'.php',
				success:function(data){
					var resultado = JSON.parse(data);

					if(resultado.respuesta == 'exito'){
						
						 Swal.fire(
						      'Eliminado',
						      'Registro eliminado',
						      'success'
						    )
						    jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
						  

					} else{
						Swal( 'Error',
						  'No se pudo eliminar',
						  'error'
					)
					}
					
				}
			})
		}
		});
	});



});



