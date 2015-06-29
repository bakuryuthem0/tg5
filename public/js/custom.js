
jQuery(document).ready(function($) {
	if($(window).width()>991)
	{
		$("html").niceScroll({horizrailenabled:false});
	}
	$(window).resize(function(event) {
		if($(window).width()>991)
		{
			$("html").niceScroll({horizrailenabled:false});
		}
	});
	$('.newsPics').click(function(event) {
		if ($(this).hasClass('newsPics-activo')) {
			$(this).removeClass('newsPics-activo');
		}else{
			
			$(this).addClass('newsPics-activo');
		}
	});
});

$(document).ready(function() {
	function cambiarNav() {
		var offset = $('.cd-secondary-nav').offset();
		if ($('.cd-secondary-nav').hasClass('nav-active')) {
			if($('#about').offset().top >= $(window).scrollTop()){
				$('.nav-active').removeClass('nav-active');
				$('.logo-active').removeClass('logo-active');
				$('.subtitulo-active').removeClass('subtitulo-active');
			}
		}else
		{
			if (offset.top <= $(window).scrollTop()) {
				$('.cd-secondary-nav').addClass('nav-active');
				$('.logo').addClass('logo-active');
				$('.subtitulo').addClass('subtitulo-active');
			}
			
		}
	}	
	cambiarNav();
	$(window).scroll(function(event) {
		cambiarNav();
	});
});
$('.clear').click(function(event) {
	$('.formInput').val('');
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
			$('body').css('padding-top', $('.cd-secondary-nav').css('height'));
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
			$('body').css('padding-top', $('.cd-secondary-nav').css('height'));
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
	$('.collapse-navigation').on('click',function(event) {

		var id = $(this).attr('data-target');

		if ($('.in').length > 0) {
			$('.in:not('+id+')').animate({'height':0},500,function(){$('.in:not('+id+')').removeClass('in') })
		}

		
	});
});
	
$(document).ready(function() {
	function cambiarFondo()
	{
		var origin = ['0% 0% 0px','0% 100% 0px','100% 0% 0px','100% 100% 0px'];
		var option = [4,1,3,0,4,3,2,1,2,0]; 
		var rand   = Math.ceil(Math.random()*10);

		if ($('.front').next().length > 0) 
		{
			$('.front').removeClass('front').addClass('back').next('div').removeClass('back').addClass('front');
		} 
		else
		{
			$('.front').removeClass('front').addClass('back')
			$('.carousel').children('div:first-child').addClass('front').removeClass('back');
		}
		$('.front').css({
			'transform-origin' : origin[option[rand]]
		});
	}
	setInterval(cambiarFondo,10000);
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



$(document).ready(function(){
    $('.slider').slick({
        dots: true,
 	 	infinite: true,
  	 	speed: 500,
  	 	fade: true,
  	 	cssEase: 'linear',
    });
});

