jQuery(document).ready(function($) {
	if ($(window).width() < 991) {
		var ub 	 = $('#pagina_aparte').data('id-set');
		var targ = $('div [data-servicio-id = '+ub+']').data('target');
		$(targ).addClass('in')
		$('#pagina_aparte').appendTo('#'+$('#pagina_aparte').data('target-pos'))
		$('body').css('padding-top', $('.nav-movil').css('height'));

		$('.collapse-navigation-service').click(function(event) {

			var id = $(this).data('servicio-id')
			/*facil*/
			//window.location.href = 'http://localhost/tg5/public/servicios/'+id
			if ($('.in').length > 0) {
				if (id == $('#pagina_aparte').data('id-set'))
				{
					$('.in').css({'overflow':'hidden','min-height':0}).animate({'height':0},500,function(){ $('.in').removeClass('in') })
				}else
				{

					var pos 	= $(this).data('target');
					$('.in').css({'overflow':'hidden','min-height':0}).animate({'height':0},500,function(){ 
						$('.in').removeClass('in') 
						$.ajax({
							url: 'movil',
							type: 'POST',
							dataType: 'json',
							data: {'id': id},
							beforeSend:function()
							{
			                    $('.contLoading').show('slow',function(){
			                        	$('loading').css({
			                        		'opacity':1
			                        	});

									$('#pagina_aparte').appendTo(pos);	
		                        });
								
							},
							success:function(response)
							{
								$('#pagina_aparte').data('id-set',id).data('target-pos',pos);
								$('#pagina_aparte').appendTo(pos);
								$("html").niceScroll({preservenativescrolling: true});
										
			                    	$('.h_titulo').html(response.serv.nombre)
				                            
			                    	$('.text_description').remove()
			                    	$('#text').html('<p class="text_description textoPromedio">'+response.serv.servicios_desc+'</p>')
				                                  
			                        $('.img1').attr('src','../images/pc/'+response.serv.image+'.png');
			                        $('.ini').attr('href', 'http://localhost/tg5/public/servicios/'+id);
			                        $('.btn-serv').remove();
			                        for(var i = 0; i< response.contserv.length;i++)
			                        {
				                        	$('.ulContact').append('<a class="serv_mini" href="#." id="'+response.contserv[i].title+'" data-option-value="'+response.contserv[i].id+'"><li class="btn clear btn-serv" style="margin-bottom:1em;">'+response.contserv[i].nombre.replace('_',' ')+'</li></a>')
			                        }
								 $('.contLoading').hide('slow'
			                        ,function(){
				                        $('.serv_mini').click(function(event) {
											servClick($(this))
										});
										$('#pagina_aparte').animate({'height':500},500,function(){ $(this).addClass('in').css({'min-height':500,'height':'auto'})});

			                        });
							}
							
						})
					})
					
					
					
				}
			}else
			{
				if (id == $('#pagina_aparte').data('id-set')) {
					$('#pagina_aparte').animate({'height':500},500,function(){ $(this).addClass('in').css({'height':'auto'})});
				}else
				{
					var pos 	= $(this).data('target');
					
					$.ajax({
						url: 'movil',
						type: 'POST',
						dataType: 'json',
						data: {'id': id},
						beforeSend:function()
						{
		                    $('.contLoading').show('slow',function(){
								$('#pagibna_aparte').appendTo(pos);	
	                        });
							
						},
						success:function(response)
						{
							$('#pagina_aparte').data('id-set',id).data('target-pos',pos);
							$('#pagina_aparte').appendTo(pos);
	                    	$('.h_titulo').html(response.serv.nombre)
	                            
	                    	$('.text_description').remove()
	                    	$('#text').html('<p class="text_description textoPromedio">'+response.serv.servicios_desc+'</p>')
	                                  
	                        $('.img1').attr('src','../images/pc/'+response.serv.image+'.png');
	                        $('.ini').attr('href', 'http://localhost/tg5/public/servicios/'+id);
	                        $('.btn-serv').remove();
	                        for(var i = 0; i< response.contserv.length;i++)
	                        {
		                        	$('.ulContact').append('<a class="serv_mini" href="#." id="'+response.contserv[i].title+'" data-option-value="'+response.contserv[i].id+'"><li class="btn clear btn-serv" style="margin-bottom:1em;">'+response.contserv[i].nombre.replace('_',' ')+'</li></a>')
	                        }
							 $('.contLoading').hide('slow',function(){
			                        $('.serv_mini').click(function(event) {
										servClick($(this))
									});
			                        $('#pagina_aparte').animate({'height':500},500,function(){ $(this).addClass('in').css({'min-height':500,'height':'auto'})});
		                        });
						}
						
					})
				}
			}

		});
	/*end*/

	}

	$('.contLoading').hide('slow',function() {
		$('.drag-target').after('<i class="fa fa-chevron-right faShow"></i>')
	});

});