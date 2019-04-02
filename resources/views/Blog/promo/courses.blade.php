@extends('layouts.Blog.cerulean_bwacth')

@section('title_page')
	<title>Descarga Curso de ... con Videos y Formatos</title>
@endsection

@section('h1')

	<h2 class="text-primary text-center">Descarga Curso de <u><em><strong class="text-danger">
	@if(request()->has('course'))
		@if(isset($soldCategories[request()->get('course')]))
			{{ strtoupper($soldCategories[request()->get('course')]['title']) }}
		@else
			{{ strtoupper($soldCategories[2]['title']) }}
		@endif
	@else
		{{ strtoupper($soldCategories[2]['title']) }}
	@endif
	</strong></em></u> Ahora!</h2>	
@endsection

@section('content')

	<div class="panel panel-danger">	  
	  <div class="panel-body text-justify">

	  	<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">QUE OBTIENES</h3>
			  </div>
			  <div class="panel-body">
			    <ul class="list-unstyled">
			    <p>
			    	<b>Descargas en tu Computador:</b>
			    </p>

			    	<li><i class="fa fa-check-circle text-success" aria-hidden="true"></i> Videos explicativos</li>
			    	<li><i class="fa fa-check-circle text-success" aria-hidden="true"></i> Ejemplos resueltos</li>
			    	<li><i class="fa fa-check-circle text-success" aria-hidden="true"></i> Formatos en Excel</li>
			    	<li><i class="fa fa-check-circle text-success" aria-hidden="true"></i> Enlaces a páginas de interés</li>
			    </ul>
			  </div>
			</div>

			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">COMO LO OBTENGO</h3>
			  </div>
			  <div class="panel-body">
			    <ul class="list-unstyled">
			    	<li><i class="fa fa-check-circle text-danger" aria-hidden="true"></i> Realizas el pago</li>
			    	<li><i class="fa fa-check-circle text-danger" aria-hidden="true"></i> Obtienes los enlaces de descarga en tu correo</li>
			    	<li><i class="fa fa-check-circle text-danger" aria-hidden="true"></i> Descomprimes y Listo!</li><hr>
			    	<li>
			    		<strong>PRECIO:</strong> 
			    		<strong class="text-danger" style="text-decoration: underline;">$@if(request()->has('course'))
					    	@if(isset($soldCategories[request()->get('course')]))
					    		{{ number_format($soldCategories[request()->get('course')]['price'], 0, '.', ',') }}
					    	@else
					    		{{ number_format($soldCategories[2]['price'], 0, '.', ',') }}	
					    	@endif	
					    @else
					    	{{ number_format($soldCategories[2]['price']), 0, '.', ','}}
					    @endif</strong>
					    (Pesos Colombianos)
			    	</li>
			    	<br>
			    	<li><i class="fa fa-check-circle text-warning" aria-hidden="true"></i> Paga con <b class="text-info">TARJETA DÉBITO</b>, <b class="text-info">TARJETA CRÉDITO</b>, <b class="text-info">BALOTO</b>, <b class="text-info">EFECTY</b> O <b class="text-info">PSE</b>, haciendo click en el boton <b class="text-danger">"COMPRAR AHORA"</b></li>
			    </ul>
			    <hr>
			    @if(request()->has('course'))
			    	@if(isset($soldCategories[request()->get('course')]))
			    		{!! $soldCategories[request()->get('course')]['button'] !!}
			    	@else
			    		{!! $soldCategories[2]['button'] !!}	
			    	@endif	
			    @else
			    	{!! $soldCategories[2]['button'] !!}
			    @endif			    

			  </div>
			</div>

			<br>
			<br>

			<div class="panel panel-danger">
			  <div class="panel-heading">
			    <h3 class="panel-title">OTROS CURSOS QUE PODRÍAN INTERESARTE</h3>
			  </div>
			  <div class="panel-body">

			    @foreach($soldCategories as $key => $course)
			    	@if($key != request()->get('course'))
			    	<div class="panel panel-default">
	  					<div class="panel-body">
								<strong class="text-muted">{{ strtoupper($course['title']) }}</strong> <span class="pull-right" style="opacity:0.4;">{!! $course['button'] !!}</span>
							</div>
						</div>
			    	@endif 
			    @endforeach

			  </div>
			</div>

		</div>
	</div>
@endsection



