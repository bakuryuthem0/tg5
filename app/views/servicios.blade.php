@extends('main')
@section('content')
<div class="contLoading">
</div>
<div id="about"></div>
<div id="pagina_aparte" class="{{ $servicio }} row">
	<div class="container">
		<div class="row contText">
			<!-- filter_block -->
				
			<div class="col-xs-12" data-animated="fadeIn" style="margin-top:2em;">	
				<div class="col-xs-12">
					<h3 class="h_titulo">{{ $serv->nombre }}</h3>
				</div>
			</div>  
			<div class="col-xs-12" style="margin-top:2em;">
				<aside id="desc" class="col-xs-6 contMitad">
					<div id="text" class="col-xs-12">
						<p class="text_description textoPromedio">{{ $serv->servicios_desc }}</p>
					</div>
				</aside>

				<div id="cont_trio" class="col-xs-4 contMitad sliderPrinc">
					
					<aside id="mini_slider" class="mySlide">
						@if($id == 1)
							<div><img src="{{ asset('images/pc/diseno_web.png') }}" class="img1"></div>
							<div><img src="{{ asset('images/pc/diseno_web2.png') }}" class="img2"></div>
						@elseif($id == 2)
						@elseif($id == 3)
							<div><img src="{{ asset('images/pc/medios_impresos.png') }}" class="img1"></div>
							<div><img src="{{ asset('images/pc/medios_impresos.png') }}" class="img2"></div>
						@elseif($id == 4)
							<div><img src="{{ asset('images/pc/pub_exterior.png') }}" class="img1"></div>
							<div><img src="{{ asset('images/pc/pub_exterior.png') }}" class="img2"></div>
						@else
							<div><img src="" class="img1"></div>
							<div><img src="" class="img2"></div>
						@endif
						
					</aside>
				</div>
				
			</div>
		</div>	
		<div class="row contText">
			<div class="col-xs-12">
				<div class="col-xs-6 contCatalogo" style="margin-top:2em;">
					<a href="" class="catalogo"></a><button class="btn btn-primary">Catalogo</button>
				</div>
				<div class="col-xs-12" style="margin-top:2em;">
					<div class="fb-like" data-href="{{ $refer }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
					<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.0";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

				</div>
			</div>
		</div>		
		<div id="options" class="col-xs-12" style="text-align: center;margin-top:2em;">	
			<ul class="ulContact" style="padding-left: 0px;">
				<li class="btn clear" style="margin-bottom:1em;"><a class="selected ini" href="{{ URL::to('servicios/'.$id) }}" style="color:white;text-decoration:none;">Inicio</a></li>
				@foreach($servicios as $clave => $servicio)
					<li class="btn clear" style="margin-bottom:1em;"><a class="serv_mini" href="#." id="{{ $servicio->title }}" data-option-value="{{ $servicio->id }}">{{ ucwords(str_replace('_',' ',$servicio->nombre)) }}</a></li>
				@endforeach
			</ul>
		</div><!-- //filter_block -->	
	</div>
</div>

@stop

@section('postscript')
<script type="text/javascript">
			$(document).ready(function(){
				$('.mySlide').slick({
					adaptiveHeight: false,
					autoplay		: true,
					autoplaySpeed : 5000,
					fade: true,
					cssEase: 'linear',
					dots: true,
					infinite: true,
					speed: 300,
					slidesToShow: 1,
				});
				$('.fade').slick()
				
				/*$('.fade').slick({
				  dots: true,
				  infinite: true,
				  speed: 500,
				  fade: true,
				  cssEase: 'linear',
				  adaptiveHeight: true,
				  autoplay		: true,
				  autoplaySpeed : 5000
				});
				*/
			});
			

			

			
		</script>
@stop