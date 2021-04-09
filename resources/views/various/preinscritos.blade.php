<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Examen Soy Contabilizers - Curso Gratuito Nómina + Excel + Macros</title>
</head>
<body>
<div class="container">	
<main role="main">
	<section class="jumbotron text-center">
    <div class="container">    	
      <h1 class="jumbotron-heading">PREINSCRITOS!!</h1>
      <p class="lead text-muted">Preinscribete a las próximas clases GRATUITAS Táblas Dinámicas y POWER BI que se avecinan!</p>   
      <br>
			<h2 class="text-muted">Ingresa tus datos:</h2>

			@if(request()->has('uri'))
					<br>
					<div class="alert alert-warning">
						<p>Copia este enlace y compartelo con tus conocidos <br> entre mas personas se inscriban a través de el mas oportunidades tendrás de ganar acceso Gratuitoo al curso MASTER en EXCEL - MACROS Y POWER BI:</p>
					<div class="alert alert info">
						{{ request()->uri }}
					</div>
				</div>
			@endif


			@if ($errors->any())
			  <div class="alert alert-danger">
			    <ul>
			      @foreach ($errors->all() as $error)
			          <li>{{ $error }}</li>
			      @endforeach
			    </ul>
			  </div>
			@endif

			@if(session('global'))
				<div class="alert alert-success">
						<h3>Excelente Ya estas pre-inscrito!</h3>
				</div>
			@endif

			<div class="mx-auto">				
				@include('various.partials.ins_form')
			</div>
      
    </div><!-- end container -->     
  </section>  
</main>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(function(){
		$('#btnform1').click(function(){
			if($("[name=name]").val() ==""){
				return false;
			}

			var confirm = window.confirm('Una vez que arranques el examen contarás con 40 minutos para resolverlo. Deseas continuar?');
			if(!confirm){
				return false;
			}

		});
	});
</script>
</body>
</html>