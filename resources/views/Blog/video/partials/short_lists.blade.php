@if(count($videos))
	<div class="panel panel-default">
	  <div class="panel-body">	
		  
		  <div class="table-responsive">
		    <table class="table">
		    	<thead>
		    		<tr>
		    			<th colspan="2">LISTADO DE VIDEOS</th>								    			
		    		</tr>
		    	</thead>
		    	<tbody class="list-of-videos">
			    @foreach($videos as $video)						    	
				    <tr style="border-top: 2px solid #000;">		
						  <td><b>Tit:</b></td>
						  <td>{{ $video->video->title }}</td>										  										
				    </tr>	
				    <tr>
				    	<td><b>Url:</b></td>
						  <td>{{ $video->video->url }}</td>
				    </tr>
				    <tr>
				    	<td colspan="2" class="text-center">
				    	{!! Form::open(['route' => ['video.destroy', $video->video], 'method' => 'DELETE']) !!}
				    		<button class="btn btn-danger btn-xs btn-deleter"
				    			data-view = "#view-videos"
							   	data-load-url="{{ route('video.by.post', request()->route('post'))}}"
				    		>
				    			Borrar
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