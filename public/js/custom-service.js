jQuery(document).ready(function($) {
	if ($(window).width() < 991) {
		$('#pagina_aparte').appendTo('#'+$('#pagina_aparte').data('target-pos'))
		$('body').css('padding-top', $('.cd-secondary-nav').css('height'));
		$('.logo').css('display', 'none');
		$('#cd-intro').addClass('collapse');
	}else
	{
		if (!$('body').hasClass('bodyservice')) {
			$('body').css('padding-top', '0px');
		}else{
			if ($('.ubicaciondepaginaaparte').children('#pagina_aparte').length<1) {
				$('#pagina_aparte').appendTo('.ubicaciondepaginaaparte');
			};
		}
		
	}
	$(window).resize(function(event) {
		if ($(window).width() < 991) {
			$('#pagina_aparte').appendTo('#'+$('#pagina_aparte').data('target-pos'))
			$('body').css('padding-top', $('.cd-secondary-nav').css('height'));
		}else
		{
			if (!$('body').hasClass('bodyservice')) {
				$('body').css('padding-top', '0px');
			}


		}
	});
	
});
jQuery(document).ready(function($) {
	$('.ulnavbar').on('shown.bs.collapse', function(event) {
		$('.fondo-blanco').css({
			'display':'block'
		});
		$('#slide-out').addClass('button-collapse-rotated')
	});
	$('.ulnavbar').on('hidden.bs.collapse', function(event) {
		$('.fondo-blanco').css({
			'display':'none'
		});
		$('.button-collapse-rotated').removeClass('button-collapse-rotated');
	});
	function servClick(esto)
	{
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
	$('.contLoading').animate({
        'opacity':0
    },
    500,function(){
    	$("html").niceScroll({preservenativescrolling: true});
        $('.loadingInBlack').remove();
        $('.contLoading').css({'display':'none'});
        $('.pagAparte').animate({
            'opacity': 1
        },500);
    });

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

								$('#pagina_aparte').appendTo('.'+pos);	
	                        });
							
						},
						success:function(response)
						{
							$('#pagina_aparte').data('id-set',id).data('target-pos',pos);
							$('#pagina_aparte').appendTo('#'+pos);
							$("html").niceScroll({preservenativescrolling: true});
									
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
							 $('.contLoading').animate({
		                        'opacity':0
		                        },
		                        500,function(){
		                        	
		                            $(this).css({'display':'none'});
		                            $('.loadingInBlack').remove();
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

							$('#pagibna_aparte').appendTo('.'+pos);	
                        });
						
					},
					success:function(response)
					{
						$('#pagina_aparte').data('id-set',id).data('target-pos',pos);
						$('#pagina_aparte').appendTo('#'+pos);
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
						 $('.contLoading').animate({
	                        'opacity':0
	                        },
	                        500,function(){
	                            $(this).css({'display':'none'});
	                            $('.loadingInBlack').remove();
								
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