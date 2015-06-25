@extends('layouts.main')
@section('content')

<div id="collapse-about" class="collapse-navigation btn btn-flat waves-effect" data-toggle="collapse" data-target="#about">
	<div class="col-xs-3 light-green accent-4">
		<i class="fa fa-5x fa-icon-movil my-fa fa-laptop"></i>
	</div>	
	<div class="col-xs-9 ">
		<div class="table-cell">
			<h3>QUIENES SOMOS</h3><h5>Nuestro equipo</h5>
		</div>
		<div class="ripple-wrapper"></div>
	</div>
</div>
<div class="row contenedorGrande">
	<div id="about" class="row contenedorGrande">
		
		<div class="container">
			<div class="row about" style="margin-top:10em;margin-bottom:5em;">
				<div class="col-xs-6 titulos medio">
					<h1>Quienes somos</h1>
					<h3>Nuestro equipo</h3>
				</div>
				<div class="col-xs-12" style="margin-top: 5em;">
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
</div>
<div id="collapse-project" class="collapse-navigation btn btn-flat waves-effect" data-toggle="collapse" data-target="#project">
	<div class="col-xs-3 orange darken-3">
		<i class="fa fa-5x fa-icon-movil my-fa fa-pencil-square-o"></i>
	</div>
	<div class="col-xs-9 " data-color="">
		<div class="table-cell">
			<h3>SERVICIOS</h3><h5>que hacemos</h5>
		</div>
		<div class="ripple-wrapper"></div>
	</div>
</div>
<div class="row contenedorGrande">
	<div id="project" class="row contenedorGrande padding">
		<div class="container">
			<div class="col-xs-12">
				<div class="col-xs-6 titulos medio serviciosText">
					<h1>Servicios</h1>
					<h3>que hacemos</h3>
				</div>
				<div class="col-xs-12" style="margin-bottom:2em;text-align:center;">
					@foreach($servicios as $clave => $servicio)
					<a href="{{ URL::to('servicios/'.$servicio->id) }}">
						<div class="servicio" id="{{ $servicio->image }}" >
							<div class="col-xs-12 tableServ" style="padding:0px;">
								<div class="col-xs-4" style="padding:0px;">
									@if($servicio->id == 1)
										<i class="fa fa-5x my-fa fa-laptop"></i>
									@elseif($servicio->id == 2)
										<i class="fa fa-5x my-fa fa-pencil-square-o"></i>
									@elseif($servicio->id == 3)
										<i class="fa fa-5x my-fa fa-print"></i>
									@elseif($servicio->id == 4)
										<i class="fa fa-5x my-fa fa-file-image-o"></i>
									@elseif($servicio->id == 5)
										<i class="fa fa-5x my-fa fa-camera"></i>
									@elseif($servicio->id == 6)
										<i class="fa fa-5x my-fa fa-sitemap"></i>
									@endif
								</div>
								<div class="col-xs-8" style="padding:0px;">
									<div class="col-xs-12" style="padding:0px;">
										<p class="textoPromedio serviciosText" style="text-align:left;"><strong>{{ $servicio->nombre }}</strong></p>
									</div>
									<div class="col-xs-12" style="padding:0px;float:right;">
										<p class="textoPromedio serviciosText" style="text-align:left;">{{ $servicio->servicios_desc }}</p>
									</div>
								</div>
							</div>
						</div>
					</a>
					@endforeach
				</div>
				
			</div>
		</div>
	</div>
</div>
<div id="agency" class="row contenedorGrande">
	<div class="container padding">
		<div class="contAboutUs">
			<div class="col-xs-8 titulos">
				<h1 style="text-align:left;">AGENCIA DE DISEÑO GRÁFICO PUBLICITARIO Y SISTEMAS ADMINISTRATIVOS</h1>
			</div>
			<div class="col-xs-12">
				<p class="textoPromedio"><strong>Tecnographic de Venezuela, C.A.</strong>, es su agencia de Diseño Grafico y de Sistemas Administrativos, en Maracay, Venezuela; contamos con personal altamente calificado en el ramo de la publicidad digital, diseño gráfico y diseño de herramientas online como páginas web, tiendas virtuales, campañas de email, redes sociales y sistemas administrativos. Estamos ubicados en la Ciudad de Maracay, además prestamos todos nuestros servicios de diseño gráfico en el resto de Venezuela.</p>
				<p class="textoPromedio">
				Entre nuestros servicios como agencia publicitaria y consultora podemos citar: Asesoría en estrategias de mercadeo, Diseño de Imagen Corporativa, Diseño Gráfico, Diseño de Logotipos en Maracay, Diseño de Páginas Web  en Maracay, Diseño de Afiches en Maracay, Diseño de Banners, Diseño de Perfiles para redes sociales, Diseño  de Empaques de Productos,  Diseño de Tarjetas de Presentación, Diseño de Señalética, Fotografía de Productos, Fotografía de Modelos, Fotografía de Espacio</p>
			</div>
			<div class="col-xs-12" style="padding-top: 5em;">
				
				<div class="col-xs-8 contenedorTextoAgencia textoServicios">
					<p class="textoPromedio"><strong>Tecnographic de Venezuela, C.A.</strong>, es su agencia de Diseño Grafico y de Sistemas Administrativos, en Maracay, Venezuela; contamos con personal altamente calificado en el ramo de la publicidad digital, diseño gráfico y diseño de herramientas online como páginas web, tiendas virtuales, campañas de email, redes sociales y sistemas administrativos. Estamos ubicados en la Ciudad de Maracay, además prestamos todos nuestros servicios de diseño gráfico en el resto de Venezuela.</p>
					<p class="textoPromedio">
					Entre nuestros servicios como agencia publicitaria y consultora podemos citar: Asesoría en estrategias de mercadeo, Diseño de Imagen Corporativa, Diseño Gráfico, Diseño de Logotipos en Maracay, Diseño de Páginas Web  en Maracay, Diseño de Afiches en Maracay, Diseño de Banners, Diseño de Perfiles para redes sociales, Diseño  de Empaques de Productos,  Diseño de Tarjetas de Presentación, Diseño de Señalética, Fotografía de Productos, Fotografía de Modelos, Fotografía de Espacio</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="collapse-news" class="collapse-navigation btn btn-flat waves-effect" data-toggle="collapse" data-target="#news">
	<div class="col-xs-3 deep-orange accent-3">
		<i class="fa fa-5x fa-icon-movil my-fa fa-print"></i>
	</div>
	<div class="col-xs-9 " data-color="">
		<div class="table-cell">
			<h3>PORTAFOLIO</h3><h5>Nuestros clientes</h5>
		</div>
		<div class="ripple-wrapper"></div>
	</div>
</div>
<div class="row contenedorGrande">
	<div id="news">
		<div class="row padding">
			<div class="col-xs-6 titulos medio textoBlanco">
				<h1>Portafolio</h1>
				<h3>Nuestro clientes</h3>
			</div>
			<div class="container">
				<div class="row news" style="margin-bottom: 5em;">
					<div class="col-xs-6  text-left contNewsPics">
						<div class="col-xs-12 newsPics image-left">
							<img class="img-responsive materialboxed picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/pagina web benedettococina-01.jpg"/>
						</div>
						<div class="col-xs-12">
							<h3 class="titPort"><a href="#">Benedetto Cocina</a></h3>
							<p class="cont textoBlanco textoPromedio">Diseño de logotipo, diseño de página web con catálogo de servicios realizados para empresa pionera en convertir la cocina en ambiente estético y funcional.</p>
							<hr class="hrNews">
						</div>
					</div>
					<div class="col-xs-6 text-right contNewsPics">
						<div class="col-xs-12 newsPics image-right">
							<img class="img-responsive materialboxed picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/pagina web carlota marquez-01.jpg"/>
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
						<div class="col-xs-12 newsPics image-left">
							<img class="img-responsive materialboxed picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/pagina web motopanama-01.jpg"/>
						</div>
						<div class="col-xs-12">
							<h3 class="titPort"><a href="#">Moto Panana</a></h3>
							<p class="cont textoBlanco textoPromedio">Diseño de página web, portal de comercialización de motos en Panamá.</p>
							<hr class="hrNews">
						</div>
					</div>
					<div class="col-xs-6 text-right contNewsPics">
						<div class="col-xs-12 newsPics image-right">
							<img class="img-responsive materialboxed picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/pagina web rancho burguer-01-01.jpg"/>
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
						<div class="col-xs-12 newsPics image-left">
							<img class="img-responsive materialboxed picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/pagina web solodeportes-01.jpg"/>
						</div>
						<div class="col-xs-12">
							<h3 class="titPort"><a href="#">Solodeportes.net</a></h3>
							<p class="cont textoBlanco textoPromedio">Diseño de imagen corporativa, diseño web para portal informativo de deportes.</p>
							<hr class="hrNews">
						</div>
					</div>
					
					<div class="col-xs-6 text-right contNewsPics">
						<div class="col-xs-12 newsPics image-right">
							<img class="img-responsive materialboxed picsGall" data-toggle="modal" data-target="#showImg" src="images/picNews/paqina web peluqueria-01.jpg"/>
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

	</div>
</div>
<div id="redes" class="row contenedorGrande">
	<div class="carousel">
		@foreach($slidesInf as $s)
		<div class="front">
			<img src="{{ asset('images/slides-top/'.$s->image) }}">
		</div>
		@endforeach
	</div>
	<div class="col-xs-12" style="padding:0px;">
		<img src="{{ asset('images/redes.png') }}">
		<div class="container-redes">
			<h2>Tecnographic, agencia de diseño & desarrollo de paginas web en maracay, Venezuela.</h2>
			<ul class="ulRedes">
				<li><h2>+58 (0424) 355.71.53</h2></li>
				<li><h2>+58 (0423) 431.26.99</h2></li>
			</ul>
			<div class="redMarco">
				<i class="fa fa-facebook-official redIcon"></i>
			</div>
			<div class="redMarco">
				<i class="fa fa-twitter redIcon"></i>
			</div>
			<div class="redMarco">
				<i class="fa fa-google-plus redIcon"></i>
			</div>
			<div class="redMarco">
				<i class="fa fa-instagram redIcon"></i>
			</div>
		</div>
	</div>
</div>
<div id="collapse-contact" class="collapse-navigation btn btn-flat waves-effect" data-toggle="collapse" data-target="#contact">
	<div class="col-xs-3 light-blue accent-3">
		<i class="fa fa-5x fa-icon-movil my-fa fa-file-image-o"></i>
	</div>
	<div class="col-xs-9 " data-color="">
		<div class="table-cell">
			<h3>CONTACTO</h3><h5>Solicite presupuesto</h5>
		</div>
		<div class="ripple-wrapper"></div>
	</div>
</div>
<div class="row contenedorGrande">
	<div id="contact" class="padding">
		<div class="row padding">
			<div class="col-xs-6 titulos medio">
				<h1>Contactenos</h1>
				<h3>Solicite presupuesto</h3>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12" style="margin-bottom:5em;">
							<h3 class="textoGrande textMid">
								Agradecemos nos contacte para facilitarle un presupuesto 
		relacionado con su proyecto o para cualquier otro comentario.
							</h3>
					</div>
					<div class="col-xs-6 cont contactusBot" style="margin-bottom:5em;">
						<div class="col-xs-12">
							<ul class="ulContact textoPromedio " style="padding-left: 0px;">
								<li><i class="fa fa-envelope"></i> tecnographicvenezuela@gmail.com</li>
								<li><i class="fa fa-skype"></i> Tecnographic Venezuela</li>
								<li><i class="fa fa-comments"></i> Tambien puede contactar con nosotros mediante <br> nuestro chat en el horario comprendido entre <br> 8:15 am y 5:00 pm de lunes a viernes</li>
							</ul>
						</div>
						<div class="col-xs-12">
						    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125629.77593697135!2d-67.60541045!3d10.26718390000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e803c989377fe87%3A0xb5ff524dadae5b74!2sMaracay!5e0!3m2!1ses-419!2sve!4v1434394978178" width="500" height="275" frameborder="1" style="border:1"></iframe>
 
						</div>
					</div>

					<div class="col-xs-6 forma contactusBot">
						<h3 class="textoGrande">Por favor llene el siguiente formulario si desea que nuestros agentes se pongan en contacto con usted.</h3>
							<div class="alert alert-success responseAlert">
								
							</div>
							<div class="input-field">
								 <i class="prefix fa fa-user"></i>
								<input id="name" type="text" class="validate formInput name" name="name" required>
          						<label for="name" data-error="Debe llenar el campo" data-success="">Nombre*</label>
							</div>
							<div class="input-field">
								<i class="prefix fa fa-envelope"></i>

								<input id="email" type="email" class="validate formInput email" name="email">
          						<label for="email">Email*</label>
							</div>
							<div class="input-field">
								<i class="prefix fa fa-pencil-square-o"></i>
								<input id="subject" type="text" class="validate formInput subject" name="subject">
          						<label for="subject">Asunto*</label>
							</div>
							<div class="input-field">
								<i class="prefix fa fa-comments"></i>
								<textarea type="text" class="materialize-textarea formInput message" name="message" rows="7"></textarea>
								<label for="message">Mensaje*</label>
							</div>
							<div class="cBtn col-xs-12" style="padding-left: 0px;">
								<ul class="ulContact" style="padding-left: 0px;">
									<li class="btn waves-effect clear btn-material-blue-grey-50"><i class="fa fa-eraser"></i>
 <span>Borrar Campos</span></li>
									<li class="btn waves-effect send btn-material-blue-grey-50"><i class="fa fa-paper-plane"></i>
 <span>Enviar Mensaje</span></li>
								</ul>
							</div>
					</div>
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
					dots: false,
					infinite: true,
					speed: 300,
					slidesToShow: 1,
				});
				
			
			});

			
		</script>

@stop