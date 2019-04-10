@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
  <label for="title">Titulo</label>
    {!! Form::text('title', null, ['class' => 'form-control','id' => 'titlepost']) !!}
</div>

@php
	if(Route::currentRouteName() == 'post.create'){
		$defaultCategory = 9;
	} else {
		$defaultCategory = $post->category_id;
	}
@endphp

<div class="form-group">
  <label for="category_id">Categoría</label>
  {!! Form::select('category_id', $categories, $defaultCategory, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  <label for="slug">URL</label>
  {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'sin http']) !!}
</div>

<div class="form-group">
  <label for="status">Estado</label>
  {!! Form::select('status', ['' => 'Seleccione...', 'public' => 'Público', 'hide' => 'Oculto'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  <label for="description">Descripción</label>
  {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 20, 'id' => 'summernote']) !!}
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">SEO</h3>
  </div>
  <div class="panel-body"> 

  	<div class="form-group">
	    <label for="title">META Keywords</label>
	    {!! Form::textarea('meta_keywords', null, ['class' => 'form-control', 'rows' => 3]) !!}
  	</div>
  	<div class="form-group">
	    <label for="title">META Descripción</label>
	    {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'rows' => 4]) !!}
  	</div>

  </div>
</div>