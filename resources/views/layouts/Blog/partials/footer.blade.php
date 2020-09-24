<footer style="background: #1254a5; color:white; padding: 10px;">
	<div class="row">
		<div class="col-sm-6">
			@include('partials.mailchimp_form')
		</div>
		<div class="col-sm-2">
			<ul class="list-inline" 
			style="background: white;						
				    height: 70px;
				    border-radius: 6px;
				    padding: 10px"
			>
				<li>
					<a class="text-danger" href="https://www.youtube.com/user/ContabilizaloCom" target="_blank" title="canal de YouTube Contabilizalo">
						<i class="fa fa-4x fa-youtube"></i>	
					</a>					
				</li>
				<li>
					<a class="text-info" href="https://www.facebook.com/ConTabilizaloCom" target="_blank" title="Página Facebook Contabilizalo">
						<i class="fa fa-4x fa-facebook"></i>
					</a>					
				</li>
			</ul>
			<div>
				<h5 style="color:white;">Asociados:</h5>
				<a href="https://hemisferiosur.com.co" target="_blank">
					<img class="img-responsive" src="{{ asset('/images/logo-hemisferio.jpg') }}">	
				</a>				
			</div>
		</div>
		<div class="col-md-3">
			<ul style="display:grid;
			    line-height: 0.9rem;
			    margin-top: 10px;"
			    >
				<li>
					<a href="/promo/curso-excel-macros-vba" title="curso macros y vba Excel">Curso de Macros y VBA Excel</a>
				</li>
				<li>
					<a href="/cursos/tecnicos" title="Como ser tecnico laboral con contabilizalo">Programas Técnicos laborales</a>
				</li>
				<li>
					<a href="/curso-de-excel-gratis" title="Excel Básico">Excel Básico</a>
				</li>
				<li>
					<a href="/curso-de-excel-avanzado-gratis" title="Excel intermedio - profesional">Excel intermedio</a>
				</li>
				<li>
					<a href="/curso-de-contabilidad-gratis" title="contabilidad básica contabilizalo">Contabilidad Básica</a>
				</li>
				<li>
					<a href="/curso-de-contabilidad-gratis-en-colombia" title="Principios de contabilidad colombia">Contabilidad Intermedia</a>
				</li>
				<li>
					<a href="/publicaciones-contabilizalo" title="Publicaciones contabilizalo">Otras Publicaciones</a>
				</li>
			</ul>
		</div>	
	</div>
  <div class="row">
    <div class="col-sm-12">
    	<hr>
      <ul class="list-unstyled">
        <li class="pull-right"><a href="#top">Ir arriba</a></li>
        <li><a href="#">Sitio Elaborado por Wilmer C.</a></li>
        <li><span><a href="http://www.contabilizalo.com/" title="ConTabilizalo.com Comunidad de Aprendizaje Gratuito">Contabilizalo</a> Copyright © {{ date('Y') }}</span></li>
      </ul>
    </div>
  </div>
  <div class="row footer navbar-fixed-bottom" style="background: #3db53d; box-shadow: 0px -2px 5px #000;">
		<div class="col-md-7 text-center">						
			<!--<p style="padding:2%; font-size: 2.3rem; text-shadow: 1px 1px 1px #000;">			
	  		Curso Macros + VBA Excel
	  		<br><small style="color:yellow;">Videos + Formatos + Asesoría</small>
  		</p>  --> 	

  		<div class="media" style="padding:2%; font-size: 2.3rem; text-shadow: 1px 1px 1px #000;">
			  <div class="media-left">
			    <a href="{{ route('promo.excel-vba') }}">
			      <img class="media-object" src="{{ asset('images/logoexcel.png') }}" alt="curso macros y vba excel ConTabilizalo.com">
			    </a>
			  </div>
			  <div class="media-body">
			    <p class="media-heading">
			    	<a href="{{ route('promo.excel-vba') }}" style="color:#fff; text-decoration: underline;">Curso Macros + VBA Excel</a>
	  				<br><small style="color:yellow;">Videos + Formatos + Asesoría</small>
			    </p>			    
			  </div>
			</div>

		</div>  
		<div class="col-md-3 text-center">			
			<p style="margin-top: 20px;">
				<a href="{{ route('promo.excel-vba') }}" class="btn btn-danger">Mas información>></a> 
			</p>
		</div>	
  </div>
</footer>