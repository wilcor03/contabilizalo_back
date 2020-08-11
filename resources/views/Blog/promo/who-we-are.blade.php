<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Video Curso de Macros y VBA Excel - ConTabilizalo.com</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="https://contabilizalo.com/favicon.png" type="image/x-icon" />
    <style type="text/css">
    	.header{
	    	color: #ee6e73;
	  	}
	  	p, li{
	  		font-size: 1.3rem;
	  		text-align: justify;
	  	}
	  	body{
	  		background: #f1f1f1;
	  	}	 
	  	.logo{
	  		background:white; padding:10px; margin-top: 7px; border-radius: 6px; box-shadow: 1px 3px 9px #000;
	  	} 	
    </style>    
  </head>

  <body>
  	@include('layouts.Blog.partials.facebook-box')
  	<nav class="#ee6e73 lighten-1" role="navigation">
	    <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">
	    	<img src="{{ asset('logocontabilizalo-300x82.png') }}" width="135" class="logo">
	    </a>
	      <ul class="right hide-on-med-and-down">
	      	<li><a href="/conta/quienes-somos">Quienes somos</a></li>
	        <li><a href="/">Blog</a></li>	        
	      </ul>

	      <ul id="nav-mobile" class="sidenav">
	        <li><a href="/">Blog</a></li>	        
	      </ul>
	      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	    </div>
	  </nav>

	  <ul id="slide-out" class="sidenav">
	    <li><div class="user-view">
	      <div class="background">
	        <img src="{{ asset('logocontabilizalo-300x82.png') }}" width="135">
	      </div>
	      <br>
	    </div></li>
	    <li><a href="/">Blog</a></li>
	    <li><a class="subheader">CONTABILIDAD</a></li>
	    <li><a href="/curso-de-contabilidad-gratis">Contabilidad Básica</a></li>
	    <li><a href="/curso-de-contabilidad-gratis-en-colombia">Contabilidad Avanzada</a></li>
	    <li><div class="divider"></div></li>
	    <li><a class="subheader">EXCEL</a></li>
	    <li><a class="waves-effect" href="/curso-de-excel-gratis">Excel Básico</a></li>
	    <li><a class="waves-effect" href="/curso-de-excel-avanzado-gratis">Excel Profesional</a></li>
	    <li><a href="/conta/quienes-somos">Quienes somos</a></li>
	  </ul>

	  <div class="section no-pad-bot" id="index-banner">
	    <div class="container">
      	<h1 class="center #4db6ac teal-text text-lighten-2">¿QUIENES SOMOS?</h1>
	    </div>
	  </div>

	  <div class="container">
	  	<p class="grey-text">En <a href="{{ url('/') }}">ConTabilizalo.com</a> llevamos mas de 8 años impartiendo conocomiento en areas contables, administrativas, laborales y más.</p>
	  	<p class="grey-text">Nuestra premisa es hacer que quines acceden a nuestros contenidos los entiendan y asimilen de manera didáctica y sensilla. Por esta razón, nos apoyamos en nuestro canal de <a href="https://www.youtube.com/c/Contabilizalo" target="_blank" class="red-text red-darken-2">YouTube</a> que ya cuenta con mas de 35.000 suscriptores y nuestro <a href="/">Sitio Web</a>, desde donde podrás acceder a mucho conocimiento gratuito, descarga de formatos, material de apoyo, links, herramientas y mucho mas.</p>

	  	<div class="row">
		    <div class="col s12 m6">
		      <div class="card red darken-1">
		        <div class="card-content white-text">
		          <span class="card-title"><i class="material-icons">ondemand_video</i> VISITA NUESTRO CANAL</span>
		          <p>Encuentra capacitación gratuita en: Excel, Contabilidad, Laboral, y mucho más.</p>
		        </div>
		        <div class="card-action">
		          <a class="white-text" href="https://www.youtube.com/c/Contabilizalo">Visitar Canal >></a>		          
		        </div>
		      </div>
		    </div>

		    <div class="col s12 m6">
		      <div class="card green darken-1">
		        <div class="card-content white-text">
		          <span class="card-title"><i class="material-icons">web</i>VISITA NUESTRO BLOG</span>
		          <p>Encuentra formatos, descarga de formatos, videos explicativos, herramientas y más.</p>
		        </div>
		        <div class="card-action">
		          <a class="white-text" href="/">Visitar Blog >></a>		          
		        </div>
		      </div>
		    </div>

		  </div><!-- end row -->
	  </div>

	   <footer class="page-footer orange">
	    <div class="container">
	      <div class="row">
	        <div class="col l6 s12">
	          <div class="fb-page"
		          data-href="https://www.facebook.com/Contabilizalocom-559714470714981/" 
		          data-width="340"
		          data-hide-cover="false"
		          data-show-facepile="true"
		          data-adapt-container-width="true">		          
		         </div>

	        </div>
	        <div class="col l3 s12">
	          
	        </div>
	        <div class="col l3 s12">
	          <h5 class="white-text">Explorar</h5>
	          <ul>
	            <li><a class="white-text" href="/curso-de-contabilidad-gratis">Contabilidad Básica</a></li>
	            <li><a class="white-text" href="/curso-de-contabilidad-gratis-en-colombia">Contabilidad Avanzada</a></li>
	            <li><a class="white-text" href="/curso-de-excel-gratis">Excel Básico</a></li>
	            <li><a class="white-text" href="/curso-de-excel-avanzado-gratis">Excel Profesional</a></li>
	          </ul>
	        </div>
	      </div>
	    </div>
	    <div class="footer-copyright">
	      <div class="container">
	      Todos los derechos: <a class="orange-text text-lighten-3" href="http://contabilizalo.com">ConTabilizalo.com</a>
	      </div>
	    </div>
	  </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript">
    	document.addEventListener('DOMContentLoaded', function() {
		    var elems = document.querySelectorAll('.sidenav');
		    var instances = M.Sidenav.init(elems);
		  });
    </script>
  </body>
</html>