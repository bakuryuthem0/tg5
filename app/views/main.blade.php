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
		{{ HTML::style('http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}
		{{ HTML::style('css/slicknav.css') }}
		{{ HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,700,300') }}
		{{ HTML::style('js/slick-master/slick/slick.css') }}
		{{ HTML::style('css/material.min.css') }}
		{{ HTML::style('css/ripples.min.css') }}
		{{ HTML::style('css/roboto.min.css') }}
		{{ HTML::style('css/custom.css') }}
		{{ HTML::style('css/reset.css') }}
		{{ HTML::style('css/style.css') }}
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
		
		<section id="cd-intro">
			<div id="cd-intro-tagline">
				
			</div> 
		</section>
		 
		<div class="cd-secondary-nav">
			<h2 class="tgvnzlaTitulo">Tecnographic Venezuela</h2>
			<a href="#0" class="cd-secondary-nav-trigger">Menu<span></span></a> <!-- button visible on small devices -->
			<nav>
				<ul>
					<li><img src="{{ asset('images/logo-01.png') }}" class="logo"></li>
					<li class="active"><a href="{{ $href[0] }}" class="page-scroll"><h4><strong>INICIO</strong></h4><h5 class="subtitulo"><i>todo comienza aqui</i></h5></a></li>
					<li><a href="{{ $href[1] }}" class="page-scroll"><h4><strong>SERVICIOS</strong></h4><h5 class="subtitulo"><i>que hacemos</i></h5></a></li>
					<li><a href="{{ $href[2] }}" class="page-scroll"><h4><strong>QUIENES SOMOS</strong></h4><h5 class="subtitulo"><i>nuestro equipo</i></h5></a></li>
					<li><a href="{{ $href[3] }}" class="page-scroll"><h4><strong>PORTAFOLIO</strong></h4><h5 class="subtitulo"><i>nuestros clientes</i></h5></a></li>
					<li><a href="{{ $href[4] }}" class="page-scroll"><h4><strong>CONTACTO</strong></h4><h5 class="subtitulo"><i>solicte presupuesto</i></h5></a></li>
					<!-- other items here -->
				</ul>
			</nav>
		</div> <!-- .cd-secondary-nav -->
		
		@yield('content')
		<div class="row">
			<footer class="col-xs-12 footer">
		    	<div class="col-xs-6 cien">
		    		<p class="textoBlanco textoPromedio">Rif: J-40488576-5</p>
		    	</div>
		    	<div class="col-xs-6 cien">
		    		<p class="textoBlanco textoPromedio">Copyright <i class="fa fa-copyright"></i> 2014. Tecnographic Venezuela. Todos los derechos reservados</p>
		    	</div>
			</footer>
		</div>
	</body>
	{{ HTML::script('js/jquery.min.js')}}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/scroll/jquery.nicescroll.min.js') }}
	{{ HTML::script('js/slick-master/slick/slick.min.js') }}
	{{ HTML::script("js/jquery.easing.min.js") }}
    {{ HTML::script("js/scrolling-nav.js") }}
	{{ HTML::script('js/material.min.js') }}
	{{ HTML::script('js/ripples.min.js') }}
	{{ HTML::script('js/custom.js') }}	
    <script>
    	jQuery(document).ready(function($) {
    	$.material.init();
    	});
    </script>
    @yield('postscript')
  
	
</html>