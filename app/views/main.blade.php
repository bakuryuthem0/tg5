<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">
	<head>
		
		<meta charset="utf-8" />
		<title>{{ $title }}</title>
		<meta keywords="tecnographic,paginas web,creacion de paginas web,diseño de paginas web,creacion de paginas web maracay, diseño de paginas web maracay,paginas web maracay">
		<meta name="description" content="{{$meta}}">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Tecnographic Venezuela">
		<link rel="icon" type="image/png" href="{{URL::to('images/favicon-01.png')}}" />
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/bootstrap-theme.min.css')}}
		{{ HTML::style('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}
		{{ HTML::style('css/slicknav.css') }}
		{{ HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,700,300') }}
		{{ HTML::style('js/slick-master/slick/slick.css') }}
		{{ HTML::style('css/custom.css') }}
		 <!-- Bootstrap Core CSS -->

	    <!-- Custom CSS -->
	    {{ HTML::style("css/scrolling-nav.css") }}

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-57229555-1', 'auto');
		ga('send', 'pageview');
		</script>
		<!--Start of Zopim Live Chat Script-->
		<script type="text/javascript">
		window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
		d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
		_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
		$.src='//v2.zopim.com/?2dAD65m63ms3iRvakHIbz8R4RU5hDlE4';z.t=+new Date;$.
		type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
		</script>
		<!--End of Zopim Live Chat Script-->
	</head>
	<body>
		<div class="row header">
			<div class="container" style="width: 90%;">
				<header>
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="col-xs-3">
								<a href="{{ URL::to('/') }}"><img src="{{ asset('images/logo-01.png') }}" class="logo"></a>
							</div>
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								</button>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="col-xs-9" style="padding:0px;">
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding:0px;">
									<ul class="nav navbar-nav">
										<li class="active"><a href="{{ $href[0] }}" class="page-scroll"><h4><strong>INICIO</strong></h4><h5><i>todo comienza aqui</i></h5></a></li>
										<li><a href="{{ $href[1] }}" class="page-scroll"><h4><strong>SERVICIOS</strong></h4><h5><i>que hacemos</i></h5></a></li>
										<li><a href="{{ $href[2] }}" class="page-scroll"><h4><strong>QUIENES SOMOS</strong></h4><h5><i>nuestro equipo</i></h5></a></li>
										<li><a href="{{ $href[3] }}" class="page-scroll"><h4><strong>PORTAFOLIO</strong></h4><h5><i>nuestros clientes</i></h5></a></li>
										<li><a href="{{ $href[4] }}" class="page-scroll"><h4><strong>CONTACTO</strong></h4><h5><i>solicte presupuesto</i></h5></a></li>
									</ul>
								</div><!-- /.navbar-collapse -->
							</div>
						</div><!-- /.container-fluid -->
					</nav>
				</header>
			</div>
		</div>
		<div class="bloque"></div>
		@yield('content')
		<div class="row footer">
			<footer id="contactenos">
		    <div class="line" id="container">
				<div class="container">
					<div class="container" >
						<div id="col-xs-12">
							<div id="cont_contacto" class="col-xs-4 contenedorBot">
								<h2 class="info_titulo"><a href="contacto.php" class="link_inf">Contacto</a></h2>
								<p class="contac textoPromedio">
								<i class="fa fa-crosshairs"></i> <strong> tecnographic</strong>, agencia de 
								diseño & sistemas en maracay, 
								venezuela.
								</p>
								<p class="contac textoPromedio">
								<i class="fa fa-mobile"></i> +58 (0424) 355.71.53<br>
								<i class="fa fa-phone"></i> +58 (0243) 431.26.99 <br></p>

								<p class="contac textoPromedio"><i class="fa fa-thumb-tack"></i> maracay edo-aragua, venezuela</p>

								<p class="contac textoPromedio"><i class="fa fa-envelope"></i> tecnographicvenezuela@gmail.com</p>
							
							</div>
							<div id="cont_servicios"  class="col-xs-5 contenedorBot">
								<h2 class="info_titulo"><a href="sev.php" class="link_inf">Servicios</a></h2>
								<ul class="info" id="serv_info">
									<li class="textoPromedio"><p><a href="{{ URL::to('servicios/1') }}"><strong>Diseño web</strong></a></p></li>

									<li class="textoPromedio"><p><a href="{{ URL::to('servicios/2') }}"><strong>Imagen corporativa</strong></a></p></li>

									<li class="textoPromedio"><p><a href="{{ URL::to('servicios/3') }}"><strong>Medios impresos</strong></a></p></li>

									<li class="textoPromedio"><p><a href="{{ URL::to('servicios/4') }}"><strong>Publicidad exterior</strong></a></p></li>

									<li class="textoPromedio"><p><a href="{{ URL::to('servicios/5') }}"><strong>Fotografía</strong></a></p></li>

									<li class="textoPromedio"><p><a href="{{ URL::to('servicios/6') }}"><strong>Desarrollo de sistemas 
									   adminitrativo</strong></a></p></li>
									<li class="textoPromedio"><p><a href="{{ asset('documents/catalogo.pdf') }}"><strong>Descargue nuestro catalogo</strong></a></p></li>
								</ul>
							</div>
							<div id="cont_nosotros"  class="col-xs-3 contenedorBot">
								<h2 class="info_titulo"><a href="quien.php" class="link_inf">Nosotros</a></h2>
								<ul class="info" id="nosotros">
									<li class="textoPromedio"><a href="{{ $href[1] }}" class="page-scroll" style="vertical-align:top;display:block;"><p>Servicios</p></a></li>
									<li class="textoPromedio"><a href="{{ $href[2] }}" class="page-scroll" style="vertical-align:top;display:block;"><p>Quienes somos</p></a></li>
									<li class="textoPromedio"><a href="{{ $href[3] }}" class="page-scroll" style="vertical-align:top;display:block;"><p>Portafolio</p></a></li>

									<li class="textoPromedio"><a href="{{ $href[4] }}" class="page-scroll" style="vertical-align:top;display:block;"><p>Contacto</p></a></li>
								</ul>
							</div>
						</div>						
					</div>
					<div id="redes" class="col-xs-6">
						<a target="_blank" href="https://www.facebook.com/pages/Tecnographic-Venezuela/1610712109156293?ref=hl">
							<div id="face" class="redes_sociales">
							</div>
						</a>
						<a target="_blank" href="https://twitter.com/tecnographicVE">
							<div id="twit" class="redes_sociales">
							</div>
						</a>
						<a target="_blank" href="https://plus.google.com/109211038019318006025/posts">
							<div id="gplu" class="redes_sociales">
							</div>
						</a>
					</div>
					<div class="textoPromedio cpy col-xs-12">
						<p>Copyright &copy 2014 Tecnographic Venezuela. All Rights Reserved.</p>
						<p>Rif: J-40488576-5</p>
					</div>
				</div>
			</div>	
		</footer>
	</div>
	</body>
	{{ HTML::script('js/jquery.min.js')}}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/scroll/jquery.nicescroll.min.js') }}
	{{ HTML::script('js/custom.js') }}
	<!--{{ HTML::script('js/cambio_let.js') }}
	{{ HTML::script('js/cambio_img.js') }}
	{{ HTML::script('js/custom.js') }}-->
	{{ HTML::script('js/slick-master/slick/slick.min.js') }}
	{{ HTML::script("js/jquery.easing.min.js") }}
    {{ HTML::script("js/scrolling-nav.js") }}

    @yield('postscript')

  
	
</html>