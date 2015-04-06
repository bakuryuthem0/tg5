
jQuery(document).ready(function($) {
	if($(window).width()>991)
	{
		$("html").niceScroll();
	}
	$(window).resize(function(event) {
		if($(window).width()>991)
		{
			$("html").niceScroll();
		}
	});
});

$('.send').click(function(event) {
	var name = $('.name').val(),
	email    = $('.email').val(),
	subject  = $('.subject').val(),
	message  = $('.message').val(),
	boton = $(this);
	$('.errorText').remove();
	var dataPost = {
		'name':name,
		'email':email,
		'subject':subject,
		'messagex':message
	}
	function alerta(esto){

		esto.css({
			'box-shadow': '0px 0px 1px 1px red',

		});
		esto.after('<p class="textoPromedio errorText">Debe llenar este campo</p>')
	}
	$('.formInput').each(function(){
		if ($(this).val() == "") {
			alerta($(this))
		}
	})
	$('.formInput').click(function(event) {
		$(this).css({
			'box-shadow': '0px 0px 1px 1px transparent',

		});
		$(this).next('p').remove();
	});
	if ($('.name').val() != "" && $('.email').val() != "" && $('.subject').val() != "" && $('.message').val() != "") {
		$.ajax({
			url: 'enviar-correo',
			type: 'POST',
			dataType: 'json',
			data: dataPost,
			beforeSend:function(){
				boton.addClass('disabled');
				boton.after('<img src="images/loader.gif" class="loading" style="margin-left:2em;">');
			},
			success:function(response){
				if (response.cod == 0) {
					$('.formInput').each(function(){
						alerta($(this))
					})
				}else if(response.cod == 1)
				{
					$('.email').css({
						'box-shadow': '0px 0px 1px 1px red',

					});
					$('.email').after('<p class="textoPromedio errorText">Debe introducir un email valido.</p>')
				}else if(response.cod == 2)
				{
					$('.responseAlert').css({
						'display': 'block'
					}).animate({'opacity':1},500);
					$('.responseAlert').html('<p class="textoPromedio">Mensaje enviado sactisfactoriamente, pronto nos pondremos en contacto con usted.</p>')
					setTimeout(function(){
						$('.responseAlert').animate({
							'opacity': 0},
							500, function() {
							$(this).css({
								'display':'none'
							})
						});
					},5000)
					$('.formInput').each(function(){
						$(this).val('');
					})
				}
				boton.removeClass('disabled');
				boton.next('img').remove();
			}
		})
	}

});

jQuery(document).ready(function($) {
	function servClick(esto)
	{
		$('.selected').removeClass('selected');
	    esto.addClass('selected');

		var nombre = esto.attr('id');
		var id = esto.attr('data-option-value');
		dataPost = {'nombre':nombre,'id':id};
		$.ajax({
	                url:'../buscar',
	                type:'POST',
	                data: dataPost,
	                dataType:'json',
	                beforeSend:function()
	                {
	                    $('.contLoading').append('<img src="../images/loader.gif" class="loadingInBlack">');

	                    $('.contLoading').css({
	                    	'display':'block',
	                    	'top':0
	                    }).animate({
	                        'opacity': 1
	                        },
	                        500,function(){
	                        	$("html").niceScroll({preservenativescrolling: false});
	                        	$('loading').css({
	                        		'opacity':1
	                        	});
	                        });
	                },
	                success:function(response)
	                {
	                    $('.contLoading').animate({
	                        'opacity':0
	                        },
	                        500,function(){
	                        	$("html").niceScroll({preservenativescrolling: true});
	                            $(this).css({'display':'none'});
	                            $('.loadingInBlack').remove();
	                            $('.pagAparte').animate({
	                                'opacity': 1
	                            },500);
	                        });
	                    if(response.success)
	                    {
	                        $('.img1').css({'display':'none'});
	                        $('.img2').css({'display':'none'});
	                        $('meta[name=description]').attr('content',response.meta);

	                    	$('.h_titulo').animate({'opacity':0},500,function(){
	                            $(this).html(response.nombre)
	                            $(this).animate({'opacity':1},500)
	                        })
	                    	$('.text_description').animate({'opacity':0},500,function(){
	                    		$('.text_description').html(response.desc)
	                    		$('.text_description').animate({'opacity':1},500);
	                        })                    
	                                  
	                        $('.img1').addClass('nada').addClass('activo');
	                        $('.img1').css({'display':'block','width':'100%'}).attr('src','../images/pc/'+response.img1+'.png');
	                        if (response.img2 != "") {
	                            $('.img2').addClass('nada');
	                            $('.img2').css({'display':'block','width':'50%'}).attr('src', '../images/mobile/'+response.img2+'.png');
	                        }; 
	                        $('.pagAparte').css({
	                            'display': 'block',
	                            'opacity':0
	                        })
	                    }
	                }
	                
	            });
	}
	var servnomb = $('#pagina_aparte').data('servicio-nombre');
	$('#pagina_aparte').appendTo('#'+servnomb)
	$('#pagina_aparte').addClass('in')
	 $('.contLoading').animate({
        'opacity':0
    },
    500,function(){
    	$("html").niceScroll({preservenativescrolling: true});
        $(this).css({'display':'none'});
        $('.loadingInBlack').remove();
        $('.pagAparte').animate({
            'opacity': 1
        },500);
    });

	$('.collapse-navigation-service').click(function(event) {
		var id = $(this).data('esto-id')
		/*fasil*/
		//window.location.href = 'http://localhost/tg5/public/servicios/'+id
		if ($('.in').length > 0) {
			if ($(this).data('esto-id') == $('#pagina_aparte').data('servicio-id'))
			{
				$('.in').css({'overflow':'hidden','min-height':0}).animate({'height':0},500,function(){ $('.in').removeClass('in') })
			}else
			{

				var pos = $(this).data('este-servicio');
				$('.in').css({'overflow':'hidden','min-height':0}).animate({'height':0},500,function(){ 
					$(this).data('servicio-id', id);
					$(this).data('servicio-nombre', pos)
					$('.in').removeClass('in') 
					$.ajax({
						url: 'movil',
						type: 'POST',
						dataType: 'json',
						data: {'id': id},
						beforeSend:function()
						{
							$('.contLoading').append('<img src="../images/loader.gif" class="loadingInBlack">');

		                    $('.contLoading').css({
		                    	'display':'block',
		                    	'top':0
		                    }).animate({
		                        'opacity': 1
		                        },
		                        500,function(){
		                        	$('loading').css({
		                        		'opacity':1
		                        	});

								$('#pagina_aparte').appendTo('#'+pos);	
	                        });
							
						},
						success:function(response)
						{
							 $('.contLoading').animate({
		                        'opacity':0
		                        },
		                        500,function(){
		                        	$("html").niceScroll({preservenativescrolling: true});
		                            $(this).css({'display':'none'});
		                            $('.loadingInBlack').remove();
									
			                    	$('.h_titulo').html(response.serv[0].nombre)
			                            
			                    	$('.text_description').remove()
			                    	$('#text').html('<p class="text_description textoPromedio">'+response.serv[0].servicios_desc+'</p>')
			                                  
			                        $('.img1').attr('src','../images/pc/'+response.serv[0].image+'.png');
			                        $('.ini').attr('href', 'http://localhost/tg5/public/servicios/'+id);
			                        $('.btn-serv').remove();
			                        for(var i = 0; i< response.contserv.length;i++)
			                        {
				                        	$('.ulContact').append('<a class="serv_mini" href="#." id="'+response.contserv[i].title+'" data-option-value="'+response.contserv[i].id+'"><li class="btn clear btn-serv" style="margin-bottom:1em;">'+response.contserv[i].nombre.replace('_',' ')+'</li></a>')
			                        }
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
			if ($(this).data('esto-id') == $('#pagina_aparte').data('servicio-id')) {
				$('#pagina_aparte').animate({'height':500},500,function(){ $(this).addClass('in').css({'min-height':500})});
			}else
			{
				var pos = $(this).data('este-servicio');
				$('#pagina_aparte').data('servicio-id', id);
				$('#pagina_aparte').data('servicio-nombre', pos)
				$.ajax({
					url: 'movil',
					type: 'POST',
					dataType: 'json',
					data: {'id': id},
					beforeSend:function()
					{
						$('.contLoading').append('<img src="../images/loader.gif" class="loadingInBlack">');

	                    $('.contLoading').css({
	                    	'display':'block',
	                    	'top':0
	                    }).animate({
	                        'opacity': 1
	                        },
	                        500,function(){
	                        	$('loading').css({
	                        		'opacity':1
	                        	});

							$('#pagina_aparte').appendTo('#'+pos);	
                        });
						
					},
					success:function(response)
					{
						 $('.contLoading').animate({
	                        'opacity':0
	                        },
	                        500,function(){
	                            $(this).css({'display':'none'});
	                            $('.loadingInBlack').remove();
								
		                    	$('.h_titulo').html(response.serv[0].nombre)
		                            
		                    	$('.text_description').remove()
		                    	$('#text').html('<p class="text_description textoPromedio">'+response.serv[0].servicios_desc+'</p>')
		                                  
		                        $('.img1').attr('src','../images/pc/'+response.serv[0].image+'.png');
		                        $('.ini').attr('href', 'http://localhost/tg5/public/servicios/'+id);
		                        $('.btn-serv').remove();
		                        for(var i = 0; i< response.contserv.length;i++)
		                        {
			                        	$('.ulContact').append('<a class="serv_mini" href="#." id="'+response.contserv[i].title+'" data-option-value="'+response.contserv[i].id+'"><li class="btn clear btn-serv" style="margin-bottom:1em;">'+response.contserv[i].nombre.replace('_',' ')+'</li></a>')
		                        }
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

	var secondaryNav = $('.cd-secondary-nav');
	$('.cd-secondary-nav-trigger').click(function(event){
		event.preventDefault();
		$(this).toggleClass('menu-is-open');
		secondaryNav.find('ul').toggleClass('is-visible');
		if ($('.navicon').hasClass('navicon-in')) {
			$('.navicon-in').removeClass('navicon-in');
		}else
		{
			$('.navicon').addClass('navicon-in');
		}
	});

	$('.serv_mini').click(function(event) {
		servClick($(this))
	});
});
jQuery(document).ready(function($) {
	
	$('.picsGall').click(function(event) {
		
		var src = $(this).attr('src');
		$('.modalImg').attr('src', src);
		
	});
});
jQuery(document).ready(function($) {

	$('.servicio').mouseenter(function() {
		var id = $(this).attr('id');
		$('#project').stop().animate({'opacity':0.3},350,function(){ 
			if (id == 'diseno_web') {
				$(this).css('background-color', '#0DB900');
			}else if(id == 'imagen_corporativa')
			{
				$(this).css('background-color', '#FF8129');
			}else if(id == 'medios_impresos')
			{
				$(this).css('background-color', '#F30000');
			}else if(id == 'pub_exterior'){
				$(this).css('background-color', '#21A4B1');
			}else if(id == 'fotografia')
			{
				$(this).css('background-color', '#B4C203');
			}else if(id == 'sistema_administrativo')
			{
				$(this).css('background-color', '#2200E4');
			}
			$(this).stop().animate({'opacity':1},350)	
		});
	});
});
jQuery(document).ready(function($) {
	if ($(window).width() < 991) {
			$('body').css('padding-top', '70px');
			$('.logo').css('display', 'none');
			$('#cd-intro').addClass('collapse');
			$('#about').addClass('collapse');
			$('#contact').addClass('collapse');
			$('#news').addClass('collapse');
			$('#project').addClass('collapse');
			$('#agency').addClass('collapse');
			$('#redes').addClass('collapse');
	}else
	{
		if (!$('body').hasClass('bodyservice')) {
			$('body').css('padding-top', '0px');
		}
		$('.collapse').css({'height':'auto'}).removeClass('collapse');
		$('.logo').css('display', 'inline-block');
	}
	$(window).resize(function(event) {
		if ($(window).width() < 991) {
			$('body').css('padding-top', '70px');
			$('.logo').css('display', 'none');
			$('#cd-intro').addClass('collapse');
			$('#about').addClass('collapse');
			$('#contact').addClass('collapse');
			$('#news').addClass('collapse');
			$('#project').addClass('collapse');
			$('#agency').addClass('collapse');
			$('#redes').addClass('collapse');
		}else
		{
			if (!$('body').hasClass('bodyservice')) {
				$('body').css('padding-top', '0px');
			}
			$('.collapse').css({'height':'auto'}).removeClass('collapse');
			$('.logo').css('display', 'inline-block');

		}
	});
	
});
jQuery(document).ready(function($) {
	$('.collapse-navigation').click(function(event) {
		var id = $(this).attr('data-target');

		if ($('.in').length > 0) {
			$('.in:not('+id+')').animate({'height':0},500,function(){$('.in:not('+id+')').removeClass('in') })
		}

		$(window).scrollTop($(this).offset().top)
	});
});
	

jQuery(document).ready(function($) {
	$('.collapse-navigation-service').click(function(event) {
		var pos = $(this).data('pos-value');
		var change = function(val,callback)
		{
			var pag = $('#pagina_aparte');
			pag.appendTo(pos);
			callback()
		}
		change(pos,function()
		{
			$('.collapse').stop().animate({'height':300}, 500)
		})
	});
});