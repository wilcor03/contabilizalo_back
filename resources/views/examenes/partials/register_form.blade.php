@if(isset($err))
<div class="alert alert-danger">
	{{ $err }}
</div>
@endif


<p>Para iniciar, confirma los siguientes datos:</p>
<br>

@if(count(request()->all())==0 || isset($err))
<span>Correo Electrónico:</span>
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
	
<div class="row justify-content-md-center">  		

  

@if(count(request()->all())==0 || isset($err))
	<form method="GET" action="{{route('exam.show')}}"class="form-inline">
	  <label class="sr-only" for="inlineFormInputName2">Email</label>
	  <input name="email" type="email" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="ejemplo@gmail.com" required>
	  <input type="hidden" name="step" value="f1">
	  <button type="submit" class="btn btn-primary mb-2">Consultar</button>
	</form>
@endif

@if(request()->step == "f1" && !isset($err))
{!! Form::open(['route' => 'exam.store']) !!}	
	{!! Form::hidden('exam_id', $exam->id) !!}
	<div class="form-row">
    <div class="form-group col-md-12">
      <label for="name">Tu nombre completo</label>		      
      {!! Form::text('name', null, ['placeholder' => 'Verifica tu nombre, es como saldrá en tu certificación', 'class' => 'form-control', 'id' => 'name', 'required']) !!}
    </div>	    
  </div>  

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="country">Tu país de origen</label>
      {!! Form::text('country', null, ['placeholder' => 'Perú - Colombia...', 'class' => 'form-control', 'id' => 'country', 'required']) !!}
    </div>
    <div class="form-group col-md-6">
      <label for="phone">Un número telefónico</label>
      {!! Form::text('phone', null, ['placeholder' => '+57 888 888 88 88', 'class' => 'form-control', 'id' => 'phone']) !!}
    </div>
  </div>
  <button id="btnform1" type="submit" class="btn btn-primary">Comenzar Prueba</button>

  {!! Form::close() !!}
  </div>
  <br>
  <div class="alert alert-warning">
  	Recuerda que una vez arrancada la prueba dispondrás de 40 minutos para responderla.
  </div>
  @endif
</div>