@extends('main')
@section('content')
<div class="caricatura"></div>
<div class="row contenedorGrande banner">
	<img src="{{ URL::to('images/banner.gif') }}">
</div>
<div id="about" class="row contenedorGrande">
	
	<div class="container">
		<div class="row about" style="margin-top:5em;">
			<div class="col-xs-6 medio">
				<h1>Quienes somos</h1>
				<h3>Nuestro equipo</h3>
			</div>
			<div class="col-xs-12">
				<div class="col-xs-6 contAbout1">
					<div class="about1 ab2">
						<h3><strong class="tgvnzla">Tecnographic Venezuela</strong></h3>
						<p class="textoPromedio">Somos una Agencia publicitaria y consultora responsable dedicada a la publicidad digital,  diseño de páginas web, tiendas virtuales, campañas de email, redes sociales y  desarrollo  de sistemas administrativos. </p>
						<p class="textoPromedio">
							Nos enfocamos en brindar a nuestros clientes  un servicio  de alto grado de funcionalidad,  interactividad, de manera que el sitio web se convierta en una verdadera herramienta para hacer negocios online, y que se adapte a su  necesidad.
						</p>
						<p class="textoPromedio">En<strong>Tecnography</strong>
							de Venezuela desarrollamos e integramos soluciones tecnológicas basadas en la sistematización y en las nuevas tecnologías, utilizando las últimas aplicaciones existentes en el mercado. Construimos el futuro, dotando a nuestros clientes de las herramientas para competir en la nueva era.</p>
					</div>
				</div>
				<div class="col-xs-6 contAbout1">
					<div class="about1 textoPromedio">
						<h3 style="font-size:2.5em;">Nuestra Meta</h3>
						<p>Nuestra meta es lograr consolidar la empresa en el mercado de la tecnología web, brindando servicio  a la mayor cantidad de clientes en el menor tiempo posible. Dar soporte técnico y actualización de páginas desarrolladas. Ser reconocidos local, nacional e internacionalmente.</p>
						<h3 style="font-size:2.5em;">Nuestro Equipo</h3>
						<p>Nuestro equipo de profesionales está formado por especialistas en distintas áreas como Diseño Grafico, Ingeniería en sistemas, Programación, Comunicación Social, y Community Manager.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<div class="row contenedorGrande">
	<div id="project" class="row contenedorGrande">
		<div class="container">
			<div class="col-xs-12">
				<div class="col-xs-6 cont_titulo_serv">
					<img src="{{ asset('images/img_serv/nuestros servicios-01.png') }}">
				</div>
				<div class="col-xs-12" style="margin-bottom:2em;text-align:center;">
					@foreach($servicios as $clave => $servicio)
					<a href="{{ URL::to('servicios/'.$servicio->id) }}">
						<div class="servicio" id="{{ $servicio->image }}" >
							<img src="{{ URL::to('images/'.$servicio->image.'.png') }}">
						</div>
					</a>
					@endforeach
				</div>
				
			</div>
		</div>
	</div>
	<div id="about" class="row contenedorGrande">
		<div class="container">
			<div class="col-xs-12">
				<h1 style="text-align:left;">AGENCIA DE DISEÑO GRÁFICO PUBLICITARIO Y SISTEMAS ADMINISTRATIVOS</h1>
				<p class="textoPromedio"><strong>Tecnographic de Venezuela, C.A.</strong>, es su agencia de Diseño Grafico y de Sistemas Administrativos, en Maracay, Venezuela; contamos con personal altamente calificado en el ramo de la publicidad digital, diseño gráfico y diseño de herramientas online como páginas web, tiendas virtuales, campañas de email, redes sociales y sistemas administrativos. Estamos ubicados en la Ciudad de Maracay, además prestamos todos nuestros servicios de diseño gráfico en el resto de Venezuela.</p>
				<p class="textoPromedio">
				Entre nuestros servicios como agencia publicitaria y consultora podemos citar: Asesoría en estrategias de mercadeo, Diseño de Imagen Corporativa, Diseño Gráfico, Diseño de Logotipos en Maracay, Diseño de Páginas Web  en Maracay, Diseño de Afiches en Maracay, Diseño de Banners, Diseño de Perfiles para redes sociales, Diseño  de Empaques de Productos,  Diseño de Tarjetas de Presentación, Diseño de Señalética, Fotografía de Productos, Fotografía de Modelos, Fotografía de Espacio</p>
			</div>
			<div class="col-xs-6 contSlider sliderPrinc">
				<div class="mySlide">
					<div><img src="{{URL::to('images/slides/slider1-01.png')}}"></div>
					<div><img src="{{URL::to('images/slides/slider2-01.png')}}"></div>
					<div><img src="{{URL::to('images/slides/slider3-01.png')}}"></div>
				</div>
			</div>
			<div class="col-xs-12 contenedorBot textoServicios">
				<p class="textoPromedio"><strong>Tecnographic de Venezuela, C.A.</strong>, es su agencia de Diseño Grafico y de Sistemas Administrativos, en Maracay, Venezuela; contamos con personal altamente calificado en el ramo de la publicidad digital, diseño gráfico y diseño de herramientas online como páginas web, tiendas virtuales, campañas de email, redes sociales y sistemas administrativos. Estamos ubicados en la Ciudad de Maracay, además prestamos todos nuestros servicios de diseño gráfico en el resto de Venezuela.</p>
				<p class="textoPromedio">
				Entre nuestros servicios como agencia publicitaria y consultora podemos citar: Asesoría en estrategias de mercadeo, Diseño de Imagen Corporativa, Diseño Gráfico, Diseño de Logotipos en Maracay, Diseño de Páginas Web  en Maracay, Diseño de Afiches en Maracay, Diseño de Banners, Diseño de Perfiles para redes sociales, Diseño  de Empaques de Productos,  Diseño de Tarjetas de Presentación, Diseño de Señalética, Fotografía de Productos, Fotografía de Modelos, Fotografía de Espacio</p>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="showImg" tabindex="-1" role="dialog" aria-labelledby="showImg" aria-hidden="true">
		<div class="modal-dialog imgLiderUp">
			<div class="modal-content">
				<div class="modal-header">
					<a type="button" class="close page-scroll" href="#news" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></a>
					<img src="" class="modalImg">
				</div>
					
			</div>
		</div>
	</div>
<div id="news">
	<div class="container">
		<div class="col-xs-12">
			<div class="col-xs-4 cont_titulo_news">
				<img src="{{ URL::to('images/img_serv/portafolio.png') }}">
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row news" style="margin-bottom: 5em;">
			<div class="col-xs-6  text-left contNewsPics">
				<div class="col-xs-12 newsPics">
					<img class="img-responsive picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/pagina web benedettococina-01.jpg"/>
				</div>
				<div class="col-xs-12">
					<h3 class="titPort"><a href="#">Benedetto Cocina</a></h3>
					<p class="cont textoBlanco textoPromedio">Diseño de logotipo, diseño de página web con catálogo de servicios realizados para empresa pionera en convertir la cocina en ambiente estético y funcional.</p>
					<hr class="hrNews">
				</div>
			</div>
			<div class="col-xs-6 text-right contNewsPics">
				<div class="col-xs-12 newsPics">
					<img class="img-responsive picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/pagina web carlota marquez-01.jpg"/>
				</div>
				<div class="col-xs-12">
					<h3 class="titPort"><a href="#">Carlota Marques</a></h3>
					<p class="cont textoBlanco textoPromedio">Diseño de página web para diseñadora de moda, plataforma multi-idiomas, auto gestionable para la comercialización de sus colecciones.</p>
					<hr class="hrNews">
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row news2 news">
			<div class="col-xs-6 text-left contNewsPics">
				<div class="col-xs-12 newsPics">
					<img class="img-responsive picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/pagina web motopanama-01.jpg"/>
				</div>
				<div class="col-xs-12">
					<h3 class="titPort"><a href="#">Moto Panana</a></h3>
					<p class="cont textoBlanco textoPromedio">Diseño de página web, portal de comercialización de motos en Panamá.</p>
				</div>
				<hr class="hrNews">
			</div>
			<div class="col-xs-6 text-right contNewsPics">
				<div class="col-xs-12 newsPics">
					<img class="img-responsive picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/pagina web rancho burguer-01-01.jpg"/>
				</div>
				<div class="col-xs-12">
					<h3 class="titPort"><a href="#">Rancho Burguer</a></h3>
					<p class="cont textoBlanco textoPromedio">Diseño de página web para restaurant de hamburguesas en Maracaibo.</p>
					<hr class="hrNews">
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row news2 news">
			<div class="col-xs-6 text-left contNewsPics">
				<div class="col-xs-12 newsPics">
					<img class="img-responsive picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/pagina web solodeportes-01.jpg"/>
				</div>
				<div class="col-xs-12">
					<h3 class="titPort"><a href="#">Solodeportes.net</a></h3>
					<p class="cont textoBlanco textoPromedio">Diseño de imagen corporativa, diseño web para portal informativo de deportes.</p>
					<hr class="hrNews">
				</div>
			</div>
			<div class="col-xs-6 text-right contNewsPics">
				<div class="col-xs-12 newsPics">
					<img class="img-responsive picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/paqina web peluqueria-01.jpg"/>
				</div>
				<div class="col-xs-12">
					<h3 class="titPort"><a href="#">Fashion Gils</a></h3>
					<p class="cont textoBlanco textoPromedio">Diseño de página web, auto gestionable para la comercialización de nuevos servicios y promociones  para salón de belleza y spa.</p>
					<hr class="hrNews">
				</div>
			</div>
		</div>
	</div>
</div>
<div id="contact" style="padding-bottom: 5em;">
	<div class="container">
		<div class="col-xs-12">
			<div class="col-xs-6 cont_titulo_contact">
				<img src="{{ URL::to('images/img_serv/contacto-01.png') }}">
			</div>
		</div>
	</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12" style="margin-bottom:5em;">
						<legend class="textoBlanco textoGrande textMid">
							Agradecemos nos contacte para facilitarle un presupuesto 
	relacionado con su proyecto o para cualquier otro comentario.
						</legend>
				</div>
				<div class="col-xs-6 cont contactusBot" style="margin-bottom:5em;">
					<div class="col-xs-12">
						<ul class="textMid ulContact textoPromedio textoBlanco" style="padding-left: 0px;">
							<li><i class="fa fa-envelope"></i><strong> tecnographicvenezuela@gmail.com</strong></li>
							<li><i class="fa fa-skype"></i><strong> Tecnographic Venezuela</strong></li>
							<li><i class="fa fa-comments"></i><strong> Tambien puede contactar con nosotros mediante nuestro chat en el horario comprendido entre 8:15 am y 5:00 pm de lunes a viernes</strong></li>
						</ul>
					</div>
					<div class="col-xs-12">
					                        <a class="twitter-timeline"  href="https://twitter.com/tecnographicVE" data-widget-id="557266883888836608">Tweets por el @tecnographicVE.</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
          
					</div>
				</div>

				<div class="col-xs-6 forma contactusBot">
					<legend class="textoBlanco">Por favor llene el siguiente formulario si desea que nuestros agentes se pongan en contacto con usted.</legend>
						<div class="alert alert-success responseAlert">
							
						</div>
						<input type="text" class="form-control formInput name " name="name" placeholder='Nombre *'/>
						<input type="text" class="form-control formInput email" name="email" placeholder='Email *'/>
						<input type="text" class="form-control formInput subject" name="subject" placeholder='Asunto'/>
						<textarea type="text" class="form-control formInput message" name="message" placeholder='Mensaje *' rows="7"></textarea>
						<div class="cBtn col-xs-12" style="padding-left: 0px;">
							<ul class="ulContact" style="padding-left: 0px;">
								<li class="btn clear"><span>Borrar Campos</span></li>
								<li class="btn send"><span>Enviar Mensaje</span></li>
							</ul>
						</div>
				</div>
			</div>
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