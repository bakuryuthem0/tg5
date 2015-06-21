jQuery(document).ready(function($) {
	$('.refresh').click(function(event) {
		var id = $(this).val(),status = $(this).data('status');
		var boton = $(this);
		$.ajax({
			url: 'editar-slides/actualizar',
			type: 'POST',
			dataType: 'json',
			data: {'id': id,'status':status},
			beforeSend:function () {
				boton.after('<img src="http://localhost/prueba/dyv-an/public/images/loading.gif" class="loading">');
				boton.animate({
						'opacity': 0},
						250,function(){
							$(this).css({
								'display':'none'
							});
							$('.loading').css({
								'display': 'inline-block'
							}).animate({
								'opacity': 1},
								250);
						}
				);
			},success:function(response) {
				$('.loading').animate({
					'opacity': 0},
					250,function(){
						$(this).remove();
						boton.css({
							'display': 'inline-block'
						}).animate({
							'opacity': 1},
							250);
					});
				if (boton.hasClass('active')) {
					boton.removeClass('active')
					boton.html('Activar')
				}else
				{
					boton.addClass('active')
					boton.html('Desactivar')
				}
				
				$('.responseDanger').removeClass('alert-danger');
					$('.responseDanger').removeClass('alert-success');
					$('.responseDanger').stop().css({'display':'block'}).addClass('alert-'+response.type).html('<p class="textoPromedio">'+response.msg+'</p>').animate({
						'opacity': 1},
						500);
				setTimeout(function(){ 
					$('.responseDanger').animate({
						'opacity':0},
						400, function() {
						$(this).css({
							
							'display':'none'
						});
					});
				}, 3000);
			}
		})
		
	});
	$('.deleteSlide').click(function(event) {
		$('.envElim').removeClass('disabled');
		var id = $(this).val();
		var fila = $(this);
		$('.envElim').val(id);
		$('.envElim').click(function(event) {
		event.stopImmediatePropagation();
			
			var boton = $(this);
			$.ajax({
				url: 'editar-slides/eliminar',
				type: 'POST',
				dataType: 'json',
				data: {'id': id},
				beforeSend:function() {
					boton.after('<img src="../images/loading.gif" class="loading">');
					boton.animate({
						'opacity': 0},
						250,function(){
							$(this).css({
								'display':'none'
							});
							$('.loading').css({
								'display': 'inline-block'
							}).animate({
								'opacity': 1},
								250);
						}
				);
				},success:function(response) {
					$('.loading').animate({
						'opacity': 0},
						250,function(){
							$(this).remove();
							boton.css({
								'display': 'inline-block'
							}).animate({
								'opacity': 1},
								250);
						});
					fila.parent().parent().remove();
					$('.responseDanger').removeClass('alert-danger');
						$('.responseDanger').removeClass('alert-success');
						$('.responseDanger').stop().css({'display':'block'}).addClass('alert-'+response.type).html('<p class="textoPromedio">'+response.msg+'</p>').animate({
							'opacity': 1},
							500);
					$('#elimModal').modal('hide')
					$('.envElim').addClass('disabled')
					setTimeout(function(){ 
						$('.responseDanger').animate({
							'opacity':0},
							400, function() {
							$(this).css({
								
								'display':'none'
							});
						});
					}, 3000);
				}
			})
			
		});
	});
	$('#formSlides').submit(function(event) {
		return false;
	});
});