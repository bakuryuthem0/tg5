@extends('layouts.service')
@section('content')
<div class="contLoading valign-wrapper">
	<img src="{{ asset('images/loader.png')}}" class="loadingInBlack loading">
</div>
<div class="ubicaciondepaginaaparte"></div>
<div id="pagina_aparte" class="{{ str_replace('_','-',$serv->image) }} row" data-target-pos="{{ str_replace('_','-',$serv->image) }}" data-id-set="{{ $serv->id }}">
	<div class="container">
		<div class="row">
			<!-- filter_block -->
				
			<div class="col s12" data-animated="fadeIn" style="margin-top:2em;">	
				<div class="col s12">
					<h3 class="h_titulo">{{ $serv->nombre }}</h3>
				</div>
			</div>  
			<div class="col s12" style="margin-top:2em;">
				<aside id="desc" class="col s12 m6 contMitad">
					<div id="text" class="col s12">
						<p class="text_description textoPromedio">{{ $serv->servicios_desc }}</p>
					</div>
				</aside>

				<div id="cont_trio" class="col s12 m6 contMitad">
					
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
			<div class="col s12">
				<div class="col s12 m6 contCatalogo" style="margin-top:2em;">
					<a href="#." class="catalogo btn btn-primary btn-catalogo waves-effect">Catalogo</a>
				</div>
				<div class="col s12" style="margin-top:2em;">
				</div>
			</div>
		</div>		
		<div class="row">
			<div class="col s12">
					<ul class="ulContact" style="padding-left: 0px;">
						<li class="btn clear btn-ini">
							<a class="selected ini" href="{{ URL::to('servicios/'.$id) }}" style="text-decoration:none;">Inicio</a>
						</li>
						@foreach($servicios as $clave => $servicio)
							<a class="serv_mini" href="#." id="{{ $servicio->title }}" data-option-value="{{ $servicio->id }}">
								<li class="btn clear btn-serv waves-effect" style="margin-bottom:1em;">
									{{ ucwords(str_replace('_',' ',$servicio->nombre)) }}
								</li>
							</a>
						@endforeach
					</ul>
			</div>
		</div>
	</div>
</div>
<div class="contenedorsote">
@foreach($all as $a)
			@if($a->id == 1)
			<div id="collapse-{{ str_replace('_','-',$a->image) }}" class="collapse-navigation-service row btn btn-flat waves-effect light-green accent-4" data-toggle="collapse" data-target="#{{ str_replace('_','-',$a->image) }}" data-servicio-id="{{ $a->id }}">
				<div class="col s3 valign-wrapper">
					<i class="fa fa-5x fa-icon-movil-service my-fa fa-laptop"></i>
			@elseif($a->id == 2)
			<div id="collapse-{{ str_replace('_','-',$a->image) }}" class="deep-orange accent-3 collapse-navigation-service row btn btn-flat waves-effect" data-toggle="collapse" data-target="#{{ str_replace('_','-',$a->image) }}" data-servicio-id="{{ $a->id }}">
				<div class="col s3 valign-wrapper">
					<i class="fa fa-5x fa-icon-movil-service my-fa fa-pencil-square-o"></i>
			@elseif($a->id == 3)
			<div id="collapse-{{ str_replace('_','-',$a->image) }}" class="orange darken-3 collapse-navigation-service row btn btn-flat waves-effect" data-toggle="collapse" data-target="#{{ str_replace('_','-',$a->image) }}" data-servicio-id="{{ $a->id }}">
				<div class="col s3 valign-wrapper ">
					<i class="fa fa-5x fa-icon-movil-service my-fa fa-print"></i>
			@elseif($a->id == 4)
			<div id="collapse-{{ str_replace('_','-',$a->image) }}" class="light-blue accent-3 collapse-navigation-service row btn btn-flat waves-effect" data-toggle="collapse" data-target="#{{ str_replace('_','-',$a->image) }}" data-servicio-id="{{ $a->id }}">
				<div class="col s3 valign-wrapper ">
					<i class="fa fa-5x fa-icon-movil-service my-fa fa-file-image-o"></i>
			@elseif($a->id == 5)
			<div id="collapse-{{ str_replace('_','-',$a->image) }}" class="light-green accent-3 collapse-navigation-service row btn btn-flat waves-effect" data-toggle="collapse" data-target="#{{ str_replace('_','-',$a->image) }}" data-servicio-id="{{ $a->id }}">
				<div class="col s3 valign-wrapper  ">
					<i class="fa fa-5x fa-icon-movil-service my-fa fa-camera"></i>
			@elseif($a->id == 6)
			<div id="collapse-{{ str_replace('_','-',$a->image) }}" class="light-blue darken-4 collapse-navigation-service row btn btn-flat waves-effect" data-toggle="collapse" data-target="#{{ str_replace('_','-',$a->image) }}" data-servicio-id="{{ $a->id }}">
				<div class="col s3 valign-wrapper">
					<i class="fa fa-5x fa-icon-movil-service my-fa fa-sitemap"></i>
			@endif
		</div>	
		<div class="col s9 valign-wrapper">
			<h4>{{ strtoupper($a->nombre) }}</h4>
		</div>
		<div class="ripple-wrapper"></div>
	</div>
	<div id="{{str_replace('_','-',$a->image)}}" class="collapse"></div>
@endforeach
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