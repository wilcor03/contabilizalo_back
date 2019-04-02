@if(isset($images))
	
	<div class="table-responsive">	
		<table class="table">
			<thead>
				<tr>
					<th>Imagen</th>
					<th>Estado</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($images as $image)
					<tr>
						<td> {{ $image->full_url_file }}
							<br>
							{{ $image->full_url_file_thumb }}

							<img class="img-responsive" src="{{ asset($image->full_path_thumb) }}" alt="...">							
						</td>
						<td>
							@if($image->imageable instanceOf App\User)
								<span class="text-success">Sin Guardar</span>
							@else
								<span class="text-danger">Guardada</span>
							@endif
						</td>
						<td>
							{!! Form::open(['route' => ['image.destroy', $image], 'method' => 'DELETE', 'id' => 'form-delete-imgs']) !!}
								<button class="btn btn-danger btn-xs btn-deleter"
				    			data-view = "#image-view"
							   	data-load-url="{{ route('image.by.post', $post)}}"
				    		>
				    			Eliminar
				    		</button>
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endif