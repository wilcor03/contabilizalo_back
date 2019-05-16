@extends('layouts.Blog.cerulean_bwacth')

@section('title_page')
	<title>Aplicativo en Excel para Renta personas Jurídicas 2019</title>
@endsection

@section('h1')
	
@endsection

@section('head')
	<!-- Smartsupp Live Chat script -->
	<script type="text/javascript">
	var _smartsupp = _smartsupp || {};
	_smartsupp.key = '755358b85c94aeec34db116590ffd7017b1b4e49';
	window.smartsupp||(function(d) {
	  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
	  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
	  c.type='text/javascript';c.charset='utf-8';c.async=true;
	  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
	})(document);
	</script>

	@include('layouts.Blog.partials.analytics')
@endsection

@section('content')	
<br>
	<picture class="text-center">
	   {!! Html::image('images/banner-cabecera-renta-personas-naturales.jpg', 'renta personas Naturales en Excel', ['height' => '220px','class' => 'img-responsive']) !!}
	</picture>

	<hr>

	<h1 class="text-center" style="color:#004b80;">Aplicativo Para Elaboración Renta Personas NATURALES 2019 - Colombia</h1>	

	<div class="panel panel-danger text-muted">	  
	  <div class="panel-body text-justify">
	  	<p><strong><a href="https://contabilizalo.com" style="color:orange;">CONTABILIZALO.COM</a></strong> en sus mas de 7 años en el mundo online presenta <strong class="text-primary">PEOPLE TAX:</strong> es un aplicativo diseñado bajo Excel  que le ayudará a la elaboración de la declaración de renta de personas naturales residentes no obligadas a llevar contabilidad por el año gravable 2018 actualizado con la última normatividad aplicable.</p>
 
			<p>Al aplicativo se deben ingresar una serie de información y al final el aplicativo le arrojará la declaración:  Formato 210.</p>


			<p><strong class="text-primary">PEOPLE TAX</strong>
				Contempla las diferentes cédulas, (Rentas laborales, de pensiones, de capital no laboral y de dividendos y participaciones) liquidará automáticamente anticipos, renta presuntiva, renta exenta con las limitaciones respectivas, verificará su justificación patrimonial y al final podrá obtener un borrador de su declaración. 
			</p>
      <p>Cuenta con un anexo de auditoria donde le arrojará información importante de la declaración y le alertará sobre inconsistencias al digitar los datos.</p>

      <p>Con este aplicativo podrá hacer todas las declaraciones que requiera y no tiene restricción de instalación. lo podrá usar en cualquier computador.</p>

      <p><strong class="text-primary">PEOPLE TAX</strong> fue diseñado por el contador  público William Dussán Salazar, especialista en Derecho Tributario, Fundador de www.consultorcontable.com; cuenta con un diseño intuitivo, un PANEL PRINCIPAL en donde podrá controlar todo el aplicativo mediante botones con hipervínculos y macros para acceder muy fácil a los diferentes anexos y plantillas.</p>

      <p>Además al terminar de elaborar su renta podrá imprimir un resumen de los anexos diligenciados que será el soporte de su declaración de renta. </p>

      <p>No genera el formato 2517</p>

			<div class="alert alert-info text-center">
				<h4>Tiene preguntas?</h4>
				<p>Utilice nuestro chat en vivo en la parte inferior derecha de su pantalla.</p>
			</div>

			<hr>

				<!-- Button trigger modal -->
			<div class="text text-center">
				<a type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
				  <img alt="comprar people tax contabilizalo.com" class="img-responsive" src="{{ asset('images/comprar-people-tax.png') }}">
				</a>
			</div>

			<hr>

			<div class="alert alert-info">
				<h4 class="text-center">¿Cuanto cuesta?</h4>
				<p>El costo es de $290.000</p>
				<p>Puede usarse para elaborar declaraciones de renta ilimitadas.
					<br>
					<strong>Le garantizamos que no perderá su inversión!</strong>
				</p>
			</div>
			<hr>

			<div class="panel panel-danger">
			  <div class="panel-heading">
			    <h3 class="panel-title">MAS DETALLES DEL APLICATIVO</h3>
			  </div>
			  <div class="panel-body">
			    <div class="embed-responsive embed-responsive-16by9">
  					<iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/Ss4gLXUryQA?wmode=transparent&vq=hd1080"></iframe>
					</div>
			    <hr>

			    <div class="media">
					  <div class="media-left">
					    <a href="{{ url('public_downloads/Presentación general del  Aplicativo-renta-p-natural.pdf') }}" title="Descarga Gratis Presentación Aplicativo Renta P naturales PEOPLE TAX" target="_blank">
					      <span class="text text-danger"><i class="fa fa-file-pdf-o fa-4x" aria-hidden="true"></i></span>
					    </a>
					  </div>
					  <div class="media-body">
					    <h4 class="media-heading">Presentación General del aplicativo</h4>
					    <p>Presentación Aplicativo.pdf <br>
					    	Documento Adobe Acrobat 439.4 KB <br>
					    	<a class="text text-danger" href="{{ url('public_downloads/Presentación general del  Aplicativo-renta-p-natural.pdf') }}" title="Descarga Gratis Presentación Aplicativo Renta P NATURALES PEOPLE TAX" target="_blank">
					    	Descargar <i class="fa fa-cloud-download" aria-hidden="true"></i></a>
					    </p>					    					    
					  </div>
					</div>


					<!--<div class="media">
					  <div class="media-left">
					    <a href="{{ url('public_downloads/Presentación Aplicativo.pdf') }}" title="Descarga Gratis Presentación Aplicativo Renta P Jurídicas BUSINESS TAX" target="_blank">
					      <span class="text text-danger"><i class="fa fa-file-pdf-o fa-4x" aria-hidden="true"></i></span>
					    </a>
					  </div>
					  <div class="media-body">
					    <h4 class="media-heading">Condiciones de uso de licencia y de compra</h4>
					    <p>Condiciones de compra.pdf <br>
					    	Documento Adobe Acrobat 190.9 KB <br>
					    	<a class="text text-danger" href="{{ url('public_downloads/Condiciones de compra.pdf') }}" title="Descarga Gratis Condiciones de uso de licencia BUSINESS TAX" target="_blank">
					    	Descargar <i class="fa fa-cloud-download" aria-hidden="true"></i></a>
					    </p>					    					    
					  </div>
					</div>-->
			    
			 	</div>
			</div>


		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">SEGUIR CON LA COMPRA</h4>
	      </div>
	      <div class="modal-body text-justify">
	      	
	      	<div class="text text-center">
		        <img src="{{ asset('images/comprar-people-tax.png') }}">
		      </div>

		      <hr>

		      <p><strong class="text text-primary">PEOPLE TAX</strong>  incluye el aplicativo para el año gravable 2018, sus respectivos manuales y el soporte de su funcionamiento vía mail o teléfono durante la época de las declaraciones.</p>

		      <p><i class="fa fa-long-arrow-right text-danger" aria-hidden="true"></i> Podrá hacer todas las rentas sin ninguna limitante, y podrá usar el aplicativo en cualquier computador que tenga Excel.</p>

		      <p><i class="fa fa-long-arrow-right text-danger" aria-hidden="true"></i> Agradecemos a todos nuestros usuarios contabilizalo.com / consultorcontable.com por su compra y garantizamos su satisfacción costo - beneficio.</p>

		      <hr>

		      <div class="panel panel-success">
							  <div class="panel-heading">
							    <h3 class="panel-title"><i class="fa fa-circle" aria-hidden="true"></i> PAGO SEGURO CON PAYU</h3>
							  </div>
							  <div class="panel-body">
							    <p>
										<i class="fa fa-hand-o-right text-danger fa-2x" aria-hidden="true"></i> <strong class="text-danger">PAGO SEGURO CON PAYU:</strong> Payu es una plataforma 100% Segura por medio de la cual podemos hacer pagos con <strong class="text-primary">TARJETA CRÉDITO, PAGO PSE, TARJETA DÉBITO, EFECTY Y BALOTO.</strong>
									</p>
									<p>
										Solo Haga Clic en el Boton "<strong class="text-success">COMPRAR AHORA</strong>" y siga las instrucciones.	
									</p>

									<div class="alert alert-info">
										<h4 class="text-center">¿Cuanto cuesta?</h4>
										<p>El costo es de $290.000</p>
										<p>Puede usarse para elaborar declaraciones de renta ilimitadas.
											<br>
											<strong>Le garantizamos que no perderá su inversión!</strong>
										</p>
									</div>


									<hr>
										<div class="text text-center">
											<a href="https://biz.payulatam.com/L07ad0920A592D4"><img src="https://contabilizalo.com/images/btn_comprar_contabilizalo.png"></a>
										</div>
									<hr>

									<div class="text text-center">
						        <img src="{{ asset('images/payu_presentacion.jpg') }}">
						      </div>
							 	</div>
							</div>		      

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="panel panel-danger">
	  <div class="panel-heading">
	    <h3 class="panel-title">
	    	<i class="fa fa-comments-o fa-2x" aria-hidden="true"></i>
	    	Comentarios</h3>
	  </div>
	  <div class="panel-body">  
	  	@include('layouts.Blog.partials.comments_facebook')
		</div>
	</div>
@endsection



