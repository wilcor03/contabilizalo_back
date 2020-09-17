@extends('layouts.promos')

@section('content')
	<div id="startpage" class="row"  style="background: url('{{ asset('images/student-849822_1920.jpg') }}'); background-position: right; box-shadow: 1px 1px 5px #000;">
		
		<div class="col m6">

			<div style="background: rgba(117, 16, 16, 0.8); border-radius: 14px;box-shadow: 3px 3px 5px #fff;">
				<h1 style="padding: 10px; text-shadow: 1px 1px 5px #000;" class="center #4db6ac white-text text-lighten-2">Conviertete en técnico laboral. <small style="font-size: 1.4rem;">(Certificado)</small></h1>
				<hr>
				<h2 class="center #4db6ac white-text text-lighten-2" style="padding: 20px; font-size: 1.56rem;"><i>Certificate como <strong>Auxiliar administrativo</strong>, Auxiliar contable, Técnico en primera infancia</strong> y múcho más.</i></h2>
			</div>

		</div>
		<div class="col m3 offset-m1" style="background: rgba(255, 255, 255, 0.9); border-radius: 14px; box-shadow: 1px 1px 5px #000;">
			
			<div class="container">
				
				<div class="row" id="contact-form">
					<h5 class="center">¿Quieres mas información?</h5>
					<br>
			    <form method="post" class="col s12" id="question-form">
			    	@csrf
			      <div class="row">
			        <div class="input-field col m12">
			        	<i class="material-icons prefix">account_circle</i>
			          <input name="name" id="name" type="text" class="validate" required>
			          <label for="name">Nombre Completo</label>
			        </div>
			        <div class="input-field col m12">
			        	<i class="material-icons prefix">phone</i>
			          <input name="cel" min="1111111" max="9999999999" id="cel" type="text" class="validate" required>
			          <label for="cel">Número Celular</label>
			        </div>
			        <div class="input-field col m12">
			        	<i class="material-icons prefix">email</i>
			          <input name="email" id="email" type="email" class="validate">
			          <label for="email">Correo Electrónico</label>
			        </div>
			        <div class="input-field col m12">
			        	<i class="material-icons prefix">format_list_bulleted</i>
			          <select name="program" id="programs" required class="validate">
						      <option value="" disabled selected>Elije uno...</option>
						      @foreach($courses as $course)
						      	<option value="{{ $course->title }}">{{ $course['title'] }}</option>
						      @endforeach
						    </select>
						    <label for="programs">Programa</label>
			        </div>
			        <div class="input-field col m12 center">
			        	<button type="submit" id="btn-submit" class="waves-effect waves-light btn-small">Solicitar información</button>
			        </div>

			        <div class="row center" id="loading" style="display: none;">       	
			        	<div class="col m12">
				        	<div class="preloader-wrapper small active">
								    <div class="spinner-layer spinner-green-only">
								      <div class="circle-clipper left">
								        <div class="circle"></div>
								      </div><div class="gap-patch">
								        <div class="circle"></div>
								      </div><div class="circle-clipper right">
								        <div class="circle"></div>
								      </div>
								    </div>
								  </div>
								</div>
						  </div>

			      </div>			      
			    </form>
			  </div>


	    </div><!-- div container -->

		</div><!-- end col -->
		
	</div><!--end row-->

  <div>
  	<h3 class="center #4db6ac teal-text text-lighten-2">
  		PROGRAMAS TÉCNICO - LABORALES
  	</h3>

  	<div class="row">

  		@foreach($courses as $course)
	    <div class="col s12 m4">
	      <div style="border-radius: 10px;" class="card #f8bbd0 @if(in_array($course->id, [2,5,8])) pink lighten-4 @endif">
	        <div class="card-content dark-text">
	          <span class="card-title center @if(in_array($course->id, [2,5,8])) dark-text @else pink-text text-darken-3 @endif"><strong>{{ $course->title }}</strong></span>
	          <ul>
	          	<li class="center"><h5>Incluye:</h5></li>
	          	@foreach($course->short_description['options'] as $opt)
	          	<li @if($loop->first) data-position="top" data-tooltip="Reuniones virtuales grupales de soporte" class="tooltipped" @endif><i class="material-icons green-text text-darken-2">check_circle</i> {{ $opt }}</li>
	          	@endforeach
	          </ul>	      
	          <p>
	          	<b>Duración:</b> {{ $course->short_description['duration'] }}<!--<br>
	          	<b>Valor Matricula:</b> $-->{{-- number_format($course->enrollment_price, null, ',', '.') --}}<br>
	          	<b>Modalidad:</b> {{  $course->short_description['modality'] }}
	          </p>    
	        </div>
	        <div class="card-action center">
	          <a data-pdf="{{ $course->short_description['pdf'] }}" data-title="{{ $course->title }}"  data-description="{!! nl2br($course->description['description']) !!}" class="btn white-text #e91e63 pink modal-trigger dispacher" href="#modaldetails" target="_blank">Mas detalles</a>
	          <a data-title="{{ $course->title }}" class="btn white-text info-btn" href="#startpage">Solicitar información</a>
	        </div>
	      </div>
	    </div>
		  @endforeach
		        
    </div> <!-- end row -->
  </div>

  <!-- Modal Structure -->
  <div id="modaldetails" class="modal modal-info modal-fixed-footer">
    <div class="modal-content">
      <h4 class="teal-text text-lighten-2 center" id="modatitle"></h4>
      <div class="row">
      	<div class="col m8">
      		<p id="modaldescription"></p>		
      	</div>
      	<div class="col m4">
      		<h5 class="red-text text-darken-4">Plan de estudio</h5>
      		<br>
      		<a id="pdf" target="_blank" class="waves-effect waves-light btn"><i class="material-icons left">cloud_download</i> Descargar PDF</a>
      	</div>
      </div>
      
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
    </div>
  </div>

  <!-- Modal Structure -->
  <div id="modalalert" class="modal modal-alert modal-fixed-footer center" style="max-width: 450px; max-height: 350px;">
    <div class="modal-content">
      <h4>Gracias por contactarnos!</h4>
      <i class="large material-icons green-text">check_circle</i>
      <p class="center grey-text">Pronto uno de nuestro asesores se comunicará contigo.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
@endsection

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			setTimeout(function(){
				$("#name").focus();	
			}, 300);
			
	    $('select').formSelect();
	    $('.tooltipped').tooltip();
	    
	    var elems = document.querySelectorAll('.modal-info');
    	var instances = M.Modal.init(elems);

	    $('.dispacher').click(function(){	    	
    		var desc = $(this).data('description');
    		var title = $(this).data('title');
    		var pdf = $(this).data('pdf');;
    		
    		$('#modatitle').text(title);
    		$('#pdf').attr('href', pdf);
    		$('#modaldescription').html(desc);
	    });

	    $('.info-btn').click(function(){
	    	var title = $(this).data('title');  	

	    	setTimeout(function(){
	    		$('#name').focus();
	    		$('#programs').val(title);
	    		$('#programs').formSelect();
	    	}, 300);	    	
	    });

	    /*FORM*/
	    $('#question-form').on('submit', function(e){
	    	e.preventDefault();
	    	var _form = $(this);
	    	$('#loading').show();
	    	$('#btn-submit').attr('disabled', true);
	    	$('#btn-submit').html('Enviando...');
	    	$.post('/cursos/contact', _form.serialize(), function(resp){
	    		$('#loading').hide();
	    		$('#btn-submit').attr('disabled', false);
	    		$('#btn-submit').html('Solicitar Información');
	    		var modal = document.getElementById('modalalert');	    			    		
	    		var options = {
	    			preventScrolling: false
	    		};
	    		var instance = M.Modal.init(modal, options);	    		
	    		setTimeout(function(){
  					instance.close();		
  				}, 5000);
    			
    			instance.open();

    			_form.trigger("reset");
	    	});
	    });

	  });
	</script>
@endpush