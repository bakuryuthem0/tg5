jQuery(document).ready(function($) {
	if($(window).width()>991)
	{
		$("html").niceScroll();
	}
});
$('.letra').hover(function()
{
	var id = $(this).prop('id').toLowerCase();
	var esto = $('#'+id);
	esto.animate({
		opacity: '1'
	},500)
},
function()
{
	var id = $(this).prop('id').toLowerCase();
	var esto = $('#'+id);
	esto.animate({
		opacity: '0'
	},500)
})
jQuery(document).ready(function($) {
	$(window).scroll(function(){
		var pos = $('#about').position();

		if (pos.top >= (parseInt($(window).scrollTop())+parseInt(95))) {
			$('.caricatura').stop().animate({
				'opacity': 0,
				},
				250);
			
		}else
		{
			$('.caricatura').stop().animate({
				'opacity': 1,
				},
				250);
		}
	})
});
jQuery(document).ready(function($) {
	$('.servicio').hover(function() {
		$(this).children('img').stop().animate({
			'opacity': 0},
			250);
	}, function() {
		$(this).children('img').stop().animate({
			'opacity': 1},
			250);
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
$(document).ready(function(){
    
	$('.serv_mini').click(function()
	{
		$(this).unbind('click')
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
                        $('meta[name=description]').attr('content',response.meta)
						$('#pagina_aparte').animate({'opacity':0.5},100,function(){
								$(this).css('background-image',"url('../images/"+response.fondo+"')")
							}).animate({'opacity':1},500,function(){
								$(this).css('background-image',"url('../images/"+response.fondo+"')")
							});
						
                    	$('.h_titulo').animate({'opacity':0},500,function(){
                            $(this).html(response.nombre)
                            $(this).animate({'opacity':1},500)
                        })
                    	$('.text_description').animate({'opacity':0},500,function(){
                    		$('.text_description').html(response.desc)
                    		$('.text_description').animate({'opacity':1},500);
                        })                    
                        /*$('#img_titulo').animate({'opacity':0},500,function(){
                        	$(this).remove();
                        	$('#titulo_servicio').append('<h3 class="h_titulo">'+response.nombre+'</h3>');
                        })*/             
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
                    }else{
						alert('llego mal')
                    }
                },
                error:function()
                {
                    alert('error feo')
                }

            });
	})
})

jQuery(document).ready(function($) {
	
	$('.picsGall').click(function(event) {
		
		var src = $(this).attr('src');
		$('.modalImg').attr('src', src);
		
	});
});
/*
*/