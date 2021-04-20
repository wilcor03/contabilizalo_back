<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Video Cursos Online - ConTabilizalo.com</title>

    <meta name="description" content="Video cursos certificados ConTabilizalo, aprende Excel, programación en Visual Basic, Macros y mucho más acerca del mundo técnológico"/>
		<meta name="robots" content="noodp"/>
		<link rel="canonical" href="{{ request()->url() }}" />
		<meta property="og:locale" content="es_ES" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Video cursos certificados ConTabilizalo" />
		<meta property="og:description" content="Video cursos certificados ConTabilizalo, aprende Excel, programación en Visual Basic, Macros y mucho más acerca del mundo técnológico" />
		<meta property="og:url" content="{{ request()->url() }}" />
		<meta property="og:site_name" content="Contabilizalo" />
		<meta property="article:author" content="https://www.facebook.com/pages/Contabilizalocom/559714470714981" />
		<meta property="article:section" content="Cursos Online certificados ConTabilizal" />		
		<meta property="article:tag" content="Curso de programación en Visual basic excel, VBA Excel, Visual Basic Excel, vba udemy, macros en excel, curso de macros, codigo vba, vba excel 2019, programación en vba excel, que es vba de excel, como aprender a programar en excel, Curso de Excel Online, curso de programación, aprender a programar, como aprender Visual Basic de Excel" />
		
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">

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
	  		font-family: 'PT Sans Narrow', sans-serif;
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
	        <li>
	        	<a target="_blank" href="https://www.youtube.com/c/Contabilizalo">
	        		Canal Youtube
	        	</a>
	       	</li>
	        <li>
	        	<a target="_blank" href="https://www.youtube.com/c/Contabilizalo">
	        		<i class="material-icons">ondemand_video</i>
	        	</a>
	       	</li>
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
	    <li>
      	<a target="_blank" href="https://www.youtube.com/c/Contabilizalo">
      		Canal Youtube
      	</a>
     	</li>
	  </ul>

	  <main>
	  	@yield('content')
	  </main>
	  
	  <footer class="page-footer orange">
	    <div class="container">
	      <div class="row">
	        <div class="col m5 s12">
	          <div class="fb-page"
		          data-href="https://www.facebook.com/Contabilizalocom-559714470714981/" 
		          data-width="340"
		          data-hide-cover="false"
		          data-show-facepile="true"
		          data-adapt-container-width="true">		          
		         </div>

	        </div>
	        <div class="col m4 s12">

	          <ul
						style="background: white;						
							    height: 70px;
							    border-radius: 6px;
							    padding: 10px;
							    display: -webkit-inline-box;
							    "							    
						>
							<li>
								<a class="red-text" href="https://www.youtube.com/user/ContabilizaloCom" target="_blank" title="canal de YouTube Contabilizalo">
									<i class="material-icons medium">ondemand_video</i>
								</a>					
							</li>
							<li style="margin-left: 20px;">
								<a class="text-info" href="https://www.facebook.com/ConTabilizaloCom" target="_blank" title="Página Facebook Contabilizalo">
									Facebook
								</a>					
							</li>
						</ul>
						<div>
							<!--<h5 style="color:white;">Asociados:</h5>
							<a href="https://hemisferiosur.com.co" target="_blank">
								<img class="img-responsive" src="{{ asset('/images/logo-hemisferio.jpg') }}">	
							</a>-->				
						</div>

	        </div>
	        <div class="col m3 s12">
	          <h5 class="white-text">Explorar</h5>
	          <ul>
	          	<li><a class="white-text" href="https://www.youtube.com/user/ContabilizaloCom"><u>Canal de YouTube</u></a></li>
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

	  {{--@include('partials.modal_promo')--}}

	  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript">
    	document.addEventListener('DOMContentLoaded', function() {
		    var elems = document.querySelectorAll('.sidenav');
		    var instances = M.Sidenav.init(elems);
		  });
    </script>
    @stack('scripts')
  </body>
</html>