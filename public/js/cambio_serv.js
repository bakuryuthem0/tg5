$(document).ready(function(){
    $('.ini').click(function(event) {
        $('.selected').removeClass('selected');
        $(this).addClass('selected');
        $('#pagina_aparte').before('<div class="loading"><img src="../images/prettyPhoto/dark_rounded/loader.gif" class="loadIma"></div>');
        $('.loading').animate({
            'opacity': 1
            },
            500,function(){
                $('.loading').animate({
                'opacity':0
                },
                500,function(){
                    $(this).remove();
                    $('.h_titulo').remove();
                    $('#titulo_servicio').append('<h3 class="h_titulo">'+$('.ini').attr('data-title-value')+'</h3>')
                    $('.text_description').remove();
                    $('#text').append('<p class="text_description">'+$('.ini').attr('data-desc-value')+'</p>');
                });
            });
    });
	$('.serv_mini').click(function()
	{
        function cambiaya()
        {
             var img = $('.activo');
            if (img.next().length>0) {
                img.animate({'opacity':0},1500,function(){
                    $(this).removeClass('activo');
                    $(this).css({'display':'none'})
                    img = $(this).next();
                    img.addClass('activo');
                    img.animate({'opacity':0},1);
                    img.animate({'opacity':1},1500);
                });
            }else
            {
                img.removeClass('activo')
                img = $('.nada:first-child');
                img.addClass('activo');
                img.animate({'opacity':0},1);
                img.animate({'opacity':1},1500);
            }
        }
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
                    $('#pagina_aparte').before('<div class="loading"><img src="../images/prettyPhoto/dark_rounded/loader.gif" class="loadIma"></div>');
                    $('.loading').animate({
                        'opacity': 1
                        },
                        500);
                },
                success:function(response)
                {
                    $('.loading').animate({
                        'opacity':0
                        },
                        500,function(){
                            $(this).remove();
                            $('.pagAparte').animate({
                                'opacity': 1
                            },500);
                        });
                    if(response.success)
                    {
                        $('.img1').remove();
                        $('.img2').remove();
                        $('meta[name=description]').attr('content',response.meta)
						$('#pagina_aparte').animate({'opacity':0.5},100,function(){
							$(this).css('background-image',"url('../images/"+response.fondo+"')")
						}).animate({'opacity':1},500,function(){
							$(this).css('background-image',"url('../images/"+response.fondo+"')")
						});
						
                    	$('.h_titulo').animate({'opacity':0},500,function(){
                            $(this).remove();
                            $('#titulo_servicio').append('<h3 class="h_titulo">'+response.nombre+'</h3>')
                        })
                    	$('.text_description').animate({'opacity':0},500,function(){
                    		$('.text_description').remove();
                    		$('#text').append(response.desc)
                        })                    
                        $('#img_titulo').animate({'opacity':0},500,function(){
                        	$(this).remove();
                        	$('#titulo_servicio').append('<h3 class="h_titulo">'+response.nombre+'</h3>');
                        })             
                        $('#mini_slider').append('<img class="img1 nada activo">');
                        $('.img1').css({'display':'block','width':'100%'}).attr('src','../images/pc/'+response.img1+'.png');
                        if (response.img2 != "") {
                            $('#mini_slider').append('<img class="img2 nada">');
                            $('.img2').css({'width':'100%'}).attr('src', '../images/mobile/'+response.img2+'.png');
                            var timeOut = setTimeout(cambiaya,5000);
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