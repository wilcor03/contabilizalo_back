<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Certificación Webinar</title>
</head>
<body>
<div class="container">
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="https://contabilizalo.com">
        <img src="https://contabilizalo.com/logocontabilizalo-300x82.png">
      </a>
    </div>
  </nav>	
  <main role="main"><br>
    <h3 style="text-align: center;">Este evento ya finalizo...</h3>

    <div class="row">
      <div class="col">
        
      </div>
      <div class="col">        
        <div class="card text-center">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <h5 class="card-title text-success">Descarga de Certificado</h5>
            <p class="card-text">Certificación #soyContabilizer - <i><strong>Nuevas prácticas con Excel</strong></i> Webinar en Vivo 26 de Junio de 2021.</p>

            <hr>

            <h3>Ingresa los siguientes datos:</h3>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="row justify-content-md-center">
              <div class="col-sm-7">
                <br>
                {!! Form::open(['route' => 'exam.store']) !!}

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre completo</label>
                    <input name="name" required type="text" class="form-control" id="" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Nombre que aparecerá en la certificación.</small>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Correo de acceso al Webinar</label>
                    <input name="email" placeholder="tucorreo@gmail.com" required type="email" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Deseo recibir notificaciones</label>
                  </div>
                  <button id="btnsender" type="submit" class="btn btn-primary">Descargar</button>

                  <div style="display:none;" id="loader" class="spinner-border" role="status">
                    <span class="visually-hidden"></span>
                  </div>
                </form>

              </div>
            </div>                    
          </div>
          <div class="card-footer text-muted">
            Este formulario se desactivará a las 23:59 horas del 25 de junio 2021 (h. Colombia)
          </div>
        </div>
      </div>      
    </div>
  </div>

  <!--<div class="card text-center">
    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>

	<section class="jumbotron text-center">
    <div class="container">  




      <h1 class="jumbotron-heading">Descarga Certificación</h1>
      <p class="lead text-muted">Examen para certificación #soyContabilizer - <i><strong>Nuevas prácticas con Excel</strong></i> Webinar en Vivo 18 de mayo de 2021.</p>
     	
     	<div class="alert alert-info">
     		<h2>Ingresa la siguiente información:</h2>	
     	</div>



      <div class="row">
        <div class="col-md-4">

          {!! Form::open() !!}

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre completo</label>
              <input required type="text" class="form-control" id="" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">Nombre que aparecerá en la certificación.</small>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Correo de acceso al Webinar</label>
              <input placeholder="tucorreo@gmail.com" required type="email" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Deseo recibir notificaciones</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>->
      


     	<!--<p>Puedes preinscribirte a nuestras proximas clases gratuitas aquí:</p>
     	<div class="text-center">
     		<a class="btn btn-lg btn-primary" href="{{ route('preins.go') }}">Inscribirme >></a>
     	</div>-->			     	



      {{--@include('examenes.partials.register_form')--}}
      
    <!--</div> end container 
  </section>
  <section>
  	@if(isset($exam) && isset($show_exam))
    	{{--@include('examenes.partials.exam_form')--}}
   @endif
  </section>-->
</main>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(function(){

    /*setTimeout(function(){
      window.location.href="https://certificate.contabilizalo.com/excel-para-contadores-y-financieros/"
    }, 2000);*/

    $('#btnsender').click(function(){

      if($("[name=name]").val() =="" || $("[name=email]").val() ==""){
        return false;
      }

      var _this = $(this);
      _this.hide();

      $('#loader').show();

      setTimeout(function(){
        $(this).show();
        $('#loader').hide();
      }, 2000);

      setTimeout(function(){        
        window.location.href="https://certificate.contabilizalo.com/excel-para-contadores-y-financieros/"
      }, 5000);      
    });

    
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