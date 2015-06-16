@extends('layouts.service')
@section('content')
<div class="contLoading">
	<img src="{{ asset('images/loader.gif')}}" class="loadingInBlack">
</div>
@foreach($all as $a)
	<div id="collapse-{{ str_replace('_','-',$a->image) }}" class="collapse-navigation-service btn btn-flat" data-este-servicio="{{ str_replace('_','-',$a->image) }}" data-esto-id="{{ $a->id }}">
		<div class="col-xs-3">
			<img src="{{ asset('images/'.$a->image.'.png') }}">
		</div>	
		<div class="col-xs-9 ">
			<div class="table-cell">
				<h3>{{ strtoupper($a->nombre) }}</h3><i class="fa fa-caret-down caretfa"></i>
			</div>
		</div>
		<div class="ripple-wrapper"></div>
	</div>
	<div id="{{str_replace('_','-',$a->image)}}"></div>
@endforeach

<div id="pagina_aparte" class="{{ $servicio }} row" data-servicio-id="{{ $id }}" data-servicio-nombre="{{ str_replace('_','-',$serv->image) }}">
	<div class="container">
		<div class="row">
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

				<div id="cont_trio" class="col-xs-6 contMitad">
					
					<aside id="mini_slider" class="mySlide">
						@if($id == 1)
							<div><img src="{{ asset('images/pc/diseno_web.png') }}" class="img1"></div>
							<div><img src="{{ asset('images/pc/diseno_web2.png') }}" class="img2"></div>
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
		<div class="row">
			<div class="col-xs-12">
				<div class="col-xs-6 contCatalogo" style="margin-top:2em;">
					<a href="" class="catalogo"></a><button class="btn btn-primary btn-catalogo">Catalogo</button>
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
		<div class="row">
			<div class="col-xs-12">
				<div id="options" class="col-xs-12" style="text-align: center;margin-top:2em;">	
					<ul class="ulContact" style="padding-left: 0px;">
						<li class="btn clear btn-ini" style="margin-bottom:1em;"><a class="selected ini" href="{{ URL::to('servicios/'.$id) }}" style="color:white;text-decoration:none;">Inicio</a></li>
						@foreach($servicios as $clave => $servicio)
							<a class="serv_mini" href="#." id="{{ $servicio->title }}" data-option-value="{{ $servicio->id }}">
								<li class="btn clear btn-serv" style="margin-bottom:1em;">
									{{ ucwords(str_replace('_',' ',$servicio->nombre)) }}
								</li>
							</a>
						@endforeach
					</ul>
				</div><!-- //filter_block -->	
			</div>
		</div>
	</div>
</div>

@stop

@section('postscript')

<script type="text/javascript">
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
			

			

			
		</script>
@stop