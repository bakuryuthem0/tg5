
jQuery(document).ready(function($) {
	if($(window).width()>991)
	{
		$("html").niceScroll();
	}
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
$('.serv_mini').click(function(event) {
    $('.selected').removeClass('selected');
    $(this).addClass('selected');
	var nombre = $(this).attr('id');
	var id = $(this).attr('data-option-value');
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
		$('#project').stop().animate({'opacity':0},500,function(){ 
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
			$(this).stop().animate({'opacity':1},500)	
		});
	});
});
jQuery(document).ready(function($) {
	if ($(window).width() < 991) {
			$('body').css('padding-top', '70px');
			$('.logo').css('width', '0px');
			$('#cd-intro').addClass('collapse');
			$('#about').addClass('collapse');
			$('#contact').addClass('collapse');
			$('#news').addClass('collapse');
			$('#project').addClass('collapse');
			$('#agency').addClass('collapse');
			$('#redes').addClass('collapse');
	}else
	{
		$('body').css('padding-top', '0px');
		$('.collapse').css({'height':'auto'}).removeClass('collapse');
		$('.logo').css('width', 'auto');
	}
	$(window).resize(function(event) {
		if ($(window).width() < 991) {
			$('body').css('padding-top', '70px');
			$('.logo').css('width', '0px');
			$('#cd-intro').addClass('collapse');
			$('#about').addClass('collapse');
			$('#contact').addClass('collapse');
			$('#news').addClass('collapse');
			$('#project').addClass('collapse');
			$('#agency').addClass('collapse');
			$('#redes').addClass('collapse');
		}else
		{
			$('body').css('padding-top', '0px');
			$('.collapse').css({'height':'auto'}).removeClass('collapse');
			$('.logo').css('width', 'auto');

		}
	});
	
});
jQuery(document).ready(function($) {
	$('.collapse-navigation').click(function(event) {
		var id = $(this).attr('data-target');

		if ($('.in').length > 0) {
			$('.in:not('+id+')').animate({'height':0},500,function(){$('.in:not('+id+')').removeClass('in') })
		}
	});
});
	
