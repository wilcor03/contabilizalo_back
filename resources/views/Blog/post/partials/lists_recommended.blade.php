@if(isset($posts))
@if(count($posts))
<div class="panel panel-default">
  <div class="panel-body">
	  
	  <div class="table-responsive">
	  	<table class="table table-bordered">
	  		<thead>
	  			<tr>
	  				<th>Título</th>
	  				<th><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  		@foreach($posts as $post)
	  			<tr>
	  				<td><a target="_blank" href="{{ route('post.show', $post) }}">{{ $post->post->title }}</a></td>	 
	  				<td>
	  					{!! Form::open(['route' => ['post.recommended', $post->post, $editingPost], 'id' => 'recommended-post-lists']) !!}			  					
	  						<button 
	  							class="btn btn-danger btn-xs saver-btn"
	  							data-view = "#recommended-lists-view"
						    	data-load-url="{{ route('post.recommended.lists', $editingPost) }}"
						    	data-loading-text="Guardando..."
						    	autocomplete="off"
	  							>	  								
	  							<i class="fa fa-chain-broken" aria-hidden="true"></i>   								
	  								Enlazado
  							</button>	  								  					
	  					{!! Form::close() !!}	  					
	  				</td> 				
	  			</tr>
	  		@endforeach
	  		</tbody>
	  	</table>		  	
	  </div>	        
		
	</div>	
</div>
@endif
@endif