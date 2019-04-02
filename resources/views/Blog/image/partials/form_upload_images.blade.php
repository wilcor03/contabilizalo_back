<h4 class="text-center">Subir Imagen</h4>
<br>
{!! Form::open(['route' => ['image.store', $post], 'files' => true, 'id' => 'image-store']) !!}
  <div class="col-sm-4">
    <label for="alt">Texto Alternativo</label>									    
    {!! Form::text('alt', null, ['class' => 'form-control']) !!}
  </div>
  <div class="col-sm-6"">
    <label for="exampleInputFile">Archivo de imagen</label>									    
    {!! Form::file('image', ['class' => 'form-control']) !!}
  </div>

  <div class="row text-center">	
		<div class="col-sm-12">
  		<button 
  			type="submit" 
  			style="margin-top:10px;" 									  			
  			data-loading-text="Guardando..." 
	    	class="btn btn-info saver-btn" 
	    	autocomplete="off"
	    	data-view = "#image-view"
	    	data-load-url="{{ route('image.by.post', $post)}}"
  			>
  			Subir
  		</button>	
  	</div>
  </div>
  
{!! Form::close() !!}