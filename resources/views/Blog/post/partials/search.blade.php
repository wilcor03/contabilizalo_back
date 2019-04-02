@if(isset($posts))
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
	  				<td><a target="_blank" href="{{ route('post.show', $post) }}">{{ $post->title }}</a></td>	 
	  				<td>

	  					{!! Form::open(['route' => ['post.recommended', $post, $editingPost], 'id' => 'recommended-post']) !!}	

		  					@if(in_array($post->id, $recommendedPostsIDs))
		  						<button 
		  							class="btn btn-danger btn-xs saver-btn"
		  							data-view = "#modal-view"
							    	data-load-url="{{ route('post.search', [$editingPost, 'page' => request()->get('page')]) }}"
							    	data-keyword = "{{ $keyword }}"
		  							>	  								
		  							<i class="fa fa-chain-broken" aria-hidden="true"></i>   								
		  								Enlazado
	  							</button>
	  						@else
	  							<button 
		  							class="btn btn-info btn-xs saver-btn"
		  							data-view = "#modal-view"
							    	data-load-url="{{ route('post.search', [$editingPost, 'page' => request()->get('page')]) }}"
							    	data-keyword = "{{ $keyword }}"
		  							>
		  							<i class="fa fa-link" aria-hidden="true"></i> 	  								
		  								Enlazar
	  							</button>
		  					@endif
	  						
	  					{!! Form::close() !!}	  					
	  				</td> 				
	  			</tr>
	  		@endforeach
	  		</tbody>
	  	</table>	
	  	<span 
	  		data-load-url = ""
				data-view = "#modal-view"
			>
	  	{!! $posts->appends(['keyword' => $keyword])->links() !!} 	  		
	  	</span>
	  </div>	        
		
	</div>	
</div>
@endif