@extends('layouts.Blog.cerulean_bwacth_back_end')

@section('content')
	<div class="panel panel-danger">
	  <div class="panel-heading">
	    <h3 class="panel-title">
	    	<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
	    	EDITAR ARTÍCULO</h3> {{ config('custom.images.settings.public_path') }}
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-sm-8">
	  			<a href="{{ route('post.view.all') }}" class="btn btn-success">Ver todos los posts</a>
		  		<div class="panel panel-info">
					  <div class="panel-heading">
					    <h3 class="panel-title">
					    	DATOS GENERALES</h3>
					  </div>
					  <div class="panel-body">

					  	<div class="panel panel-default well">
  							<div class="panel-body">
									<div class="text-center">
										<div 
											id="image-view"
											data-view = "#image-view"
	    								data-load-url="{{ route('image.by.post')}}"
	    								class="view-results"
										></div>
									</div>
								</div>
							</div>

			  			{!! Form::open(['route' => 'post.store', 'method' => 'POST']) !!}

			  			<div class="form-group">
						    <label for="title">Titulo</label>
						      {!! Form::text('title', null, ['class' => 'form-control']) !!}
					  	</div>

				  		<div class="form-group">
						    <label for="category_id">Categoría</label>
						    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
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
						    <label for="title">Descripción</label>
						    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 20]) !!}
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

							<div class="form-group">
						    <label for="title"></label>
						    <button class="btn btn-primary">Guardar</button>
					  	</div>

							
			  			{!! Form::close() !!}

		  			</div><!-- panel body 2-->
	  			</div>

	  		</div>	 

	  		<div class="col-sm-4">

		  		<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title">
					    	DATOS ADICIONALES</h3>
					  </div>
					  <div class="panel-body">

					  <div class="well">
						  <h3 class="text-center"> VIDEOS </h3>

						  @if(\Route::currentRouteNamed('post.create'))
						  	{!! Form::open(['route' => 'video.store', 'id' => 'formVideos']) !!}
						 	@elseif(\Route::currentRouteNamed('post.edit'))
						 		{!! Form::open(['route' => ['video.store', $post], 'id' => 'formVideos']) !!}
						 	@endif

						  	<div class="form-group">
							    <label for="title">Titulo del video</label>
							    {!! Form::text('title', null, ['class' => 'form-control']) !!}
						  	</div>

						  	<div class="form-group">
							    <label for="url">URL del Video</label>
							    {!! Form::text('url', null, ['class' => 'form-control']) !!}
						  	</div>

						  	<div class="form-group text-center">
							    <button 
							    	type="button" 
							    	data-loading-text="Guardando..." 
							    	class="btn btn-primary saver-btn" 
							    	autocomplete="off" 
							    	data-view = "#view-videos"
							    	data-load-url="{{ route('video.by.post')}}"
							    	>
									  Guardar
									</button>
						  	</div>
						  {!! Form::close() !!}

						  <div class="text-center">
						  	<span id="view-videos" class="text-center"></span>
						  </div>	
					  </div>

					  <hr />

					  <div class="well">
						  <h3 class="text-center"> ARCHIVOS </h3>

						  @if(\Route::currentRouteNamed('post.create'))
						  	{!! Form::open(['route' => 'file.store', 'files' => true, 'id' => 'formFiles']) !!}
						 	@elseif(\Route::currentRouteNamed('post.edit'))
						 		{!! Form::open(['route' => ['file.store', $post], 'files' => true, 'id' => 'formFiles']) !!}
						 	@endif

						  	<div class="form-group">
							    <label for="title">Nombre a mostrar del archivo</label>
							    {!! Form::text('title', null, ['class' => 'form-control']) !!}
						  	</div>

						  	<div class="form-group">
							    <label for="type_file_id"></label>
							    {!! Form::select('type_file_id', $type_files, null, ['class' => 'form-control']) !!}
						  	</div>

						  	<div class="form-group">
							    <label for="url">Archivo a subir</label>
							    {!! Form::file('files[]', ['class' => 'form-control', 'multiple']) !!}
						  	</div>

						  	<div class="form-group text-center">
							  	<button 
							    	type="button" 
							    	data-loading-text="Guardando..." 
							    	class="btn btn-primary saver-btn" 
							    	autocomplete="off" 
							    	data-view = "#view-files"
							    	data-load-url="{{ route('file.by.post')}}"
							    	>
									  Subir
									</button>
								</div>
						  {!! Form::close() !!}

						  <div class="text-center">
						  	<span id="view-files"></span>
						  </div>

						</div>  
					  <hr>

					  <div class="well text-center">
						  <h3 class="text-center"> ARTÍCULOS RECOMENDADOS </h3>

						  <!-- Button trigger modal -->
							<button 
								type="button" 
								class="btn btn-primary" 
								data-toggle="modal" 
								data-target="#myModal"
								data-load-url = "{{ route('post.search') }}"
								data-view = "#modal-view"
								>
							  Buscar artículos
							</button>
							<button class="saver-btn" style="display:none;"
								data-view = "#recommended-lists-view"
						    data-load-url="{{ route('post.recommended.lists') }}"
							></button>

							<!-- Modal -->
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Buscar Artículos</h4>
							      </div>
							      <div class="modal-body">
							      	<p>
							      		{!! Form::text('keyword', null, ['class' => 'form-control keyword']) !!}
							      	</p>
							        <div id="modal-view"></div>
							      </div>
							      <div class="modal-footer">
							        <button 
							        	type="button" 
							        	class="btn btn-default btn-loader"
							        	data-dismiss="modal"
							        	data-load-url = "{{ route('post.recommended.lists') }}"
							        	data-view = "#recommended-lists-view"
							        	>
							        	Cerrar
							        </button>        
							      </div>
							    </div>
							  </div>
							</div>

							<br><br>
						  <div class="form-group text-center">							    
						  	<div id="recommended-lists-view"></div>
						  </div>

						 </div>

					  </div>
					</div>  

	  	</div> <!-- end row -->
		</div>		
	</div>

	<span data-get-new-token="{{ route('new.token') }}"></span>
@endsection

@section('scripts')
	{!! Html::script('js/postsEdit.js') !!}
@endsection