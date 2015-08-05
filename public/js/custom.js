$(document).ready(function() {
	function cambiarNav() {
		var offset = $('nav').offset();
		if (offset.top+2 <= $(window).scrollTop()) {
			$('nav').addClass('nav-active');
			$('.logo').addClass('logo-active');
			$('.subtitulo').addClass('subtitulo-active');
			$('#nav-mobile').addClass('ul-active');
		}
		if($('.about').offset().top >= $(window).scrollTop()){

			$('.logo-active').removeClass('logo-active');
			$('.subtitulo-active').removeClass('subtitulo-active');
			$('.ul-active').removeClass('ul-active');
			$('.nav-active').removeClass('nav-active')
		}
	}	
	cambiarNav();
	$(window).scroll(function(event) {
		cambiarNav();
	});
	$('.servicio').mouseenter(function() {
		var clase = $(this).data('clase');
		$('.project').stop().animate({'opacity':0.3},350,function(){ 
			if (clase == 'diseno_web') {
				$('.project').css('background-color', '#0DB900');
			}else if(clase == 'imagen_corporativa')
			{
				$('.project').css('background-color', '#FF8129');
			}else if(clase == 'medios_impresos')
			{
				$('.project').css('background-color', '#F30000');
			}else if(clase == 'pub_exterior'){
				$('.project').css('background-color', '#21A4B1');
			}else if(clase == 'fotografia')
			{
				$('.project').css('background-color', '#B4C203');
			}else if(clase == 'sistema_administrativo')
			{
				$('.project').css('background-color', '#2200E4');
			}
			$('.project').stop().animate({'opacity':1},350)	
		});
	});
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
	function changePag () {
		if ($(window).width() < 991) {
			$('body').css('padding-top', '70px');
			$('.about').addClass('collapse');
			$('.project').addClass('collapse');
			$('.news').addClass('collapse');
			$('.contact').addClass('collapse');
		}else
		{
			if (!$('body').hasClass('bodyservice')) {
				$('body').css('padding-top', '0px');
			}
			$('.collapse').css({'height':'auto'}).removeClass('collapse');
			$('.logo').css('display', 'inline-block');
		}}
	changePag();
	$(window).resize(function(event) {
		changePag();
	});
	$('.collapse').on('show.bs.collapse', function(event) {
		$('.in').collapse('hide')
	});
	$('.send').click(function(event) {
		var name = $('.name').val(),
		email    = $('.email').val(),
		subject  = $('.subject').val(),
		pais  	 = $('.pais').val(),
		proy  	 = $('.proy').val(),
		message  = $('.message').val(),
		boton = $(this);
		$('.errorText').remove();
		var dataPost = {
			'name'	  :name,
			'email'	  :email,
			'pais' 	  :pais,
			'proy' 	  :proy,
			'subject' :subject,
			'messagex':message
		}
		$('.formInput').each(function(index, el){
			if ($(this).val() == "") {
				$(el).addClass('invalid');
			}
		})
		$('.formInput').click(function(event) {
			$(this).removeClass('invalid')
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
					boton.after('<img src="images/loader.png" class="loading" style="margin-left:2em;">');
					$('.loading').show('fast');
					setTimeout(function() {
						// Materialize.toast(message, displayLength, className, completeCallback);
  						Materialize.toast('La operación esta tradando', 5000) // 4000 is the duration of the toast
  						Materialize.toast('Por favor espere un momento', 5000) // 4000 is the duration of the toast
					},5000)
        
				},
				success:function(response){
					if (response.cod == 0) {
						$('.formInput').each(function(index, el){
							$(el).addClass('invalid')
						})
					}else if(response.cod == 1)
					{
						$('.email').addClass('invalid');
					}else if(response.cod == 2)
					{
						$('.responseAlert').css({
							'display': 'block'
						}).animate({'opacity':1},500);
						$('label.active').removeClass('active');
						$('.prefix.active').removeClass('active');
						$('.validate').removeClass('valid')
						Materialize.toast('Mensaje enviado sactisfactoriamente, pronto nos pondremos en contacto con usted.', 5000) // 4000 is the duration of the toast
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
});
