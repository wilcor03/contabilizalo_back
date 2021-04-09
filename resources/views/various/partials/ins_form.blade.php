
{!! Form::open(['route' => 'preins.go']) !!}
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Nombre</label>       
    {!! Form::text('nombre',null, ['class' =>'form-control','id' => 'validationCustom01', 'required']) !!}
  </div>
  <div class="valid-feedback">
      Looks good!
    </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Email</label>
    {!! Form::text('email',null, ['class' =>'form-control','id' => 'validationCustom02', 'required']) !!}
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Pais</label>
    {!! Form::text('pais',null, ['class' =>'form-control','id' => 'validationCustom03', 'required']) !!}
    <div class="valid-feedback">
      Looks good!
    </div>    
  </div>

  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">Teléfono</label>
    {!! Form::text('telefono',null, ['class' =>'form-control','id' => 'validationCustom04', 'required']) !!}
    <div class="invalid-feedback">
      Teléfono
    </div>
  </div>  
  
  <div class="col-12 mt-3">
    <button class="btn btn-primary" type="submit">Enviar</button>
  </div>
{!! Form::close() !!}
