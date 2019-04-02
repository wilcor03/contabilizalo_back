@extends('layouts.Blog.cerulean_bwacth')

@section('h1')
	<h1 class="text-primary text-center">
		ESTADO DE SU COMPRA EN CONTABILIZALO.COM
	</h1>	
@endsection

@section('content')
	<hr>
	@if (Route::currentRouteName() == "payu.success")

		<div class="panel panel-success">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i> PAGO EXIOSO</h3>
		  </div>
		  <div class="panel-body">
		    <p><i class="fa fa-thumbs-up fa-2x text-success" aria-hidden="true"></i> 
		    	Su pago fue realizado satisfactoriamente. Dentro de las siguientes 24 horas haremos llegar un enlace a su correo eléctronico para que pueda descargar y disfrutar del producto adquirido.		    	
		    </p>
		  </div>
		</div>
	@elseif (Route::currentRouteName() == "payu.no.success")
		<div class="panel panel-danger">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i> PAGO FALLIDO</h3>
		  </div>
		  <div class="panel-body">
		    <p><i class="fa fa-thumbs-up fa-2x text-danger" aria-hidden="true"></i> 
		    	No hemos podido procesar su pago. Por favor verifique los datos ingresados y vuelva a intentarlo.		    	
		    </p>
		  </div>
		</div>
	@elseif (Route::currentRouteName() == "payu.pending")
		<div class="panel panel-warning">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i> PAGO PENDIENTE</h3>
		  </div>
		  <div class="panel-body">
		    <p><i class="fa fa-thumbs-up fa-2x text-warning" aria-hidden="true"></i> 
		    	Hemos recibido su pago. Aún se encuentra pendiente de ser procesado por el sistema, una vez sepamos el estado de su transacción, le haremos llegar una notificación a su correo electronico.		    	
		    </p>
		  </div>
		</div>
	@endif

	<hr>
	<p>
		Gracias por contar nosotros.
	</p>
	<p class="text-success">
		El Equipo de ConTabilizalo.com<br>
		Celular: 312 491 06 27
	</p>
@endsection