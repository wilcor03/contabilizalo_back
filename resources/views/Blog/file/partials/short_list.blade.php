@if(count($files))
<hr />
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Nombre orig</th>
				<th>Tipo</th>
				<th>Desc</th>
				<th>Bor</th>
			</tr>
		</thead>
		<tbody>
			@foreach($files as $file)
			<tr>
				<td><small>{{ $file->file->original_name }}</small></td>
				<td>{!! $file->file->type_file->icon !!}</td>
				<td>					
					<a class="btn btn-info btn-xs" href="{{ route('file.download', $file->file) }}"><i class="fa fa-cloud-download" aria-hidden="true"></i> </a>					
				</td>
				<td>
					{!! Form::open(['route' => ['file.destroy', $file->file], 'method' => 'DELETE']) !!}
		    		<button class="btn btn-danger btn-xs btn-deleter"
		    			data-view = "#view-files"
					   	data-load-url="{{ route('file.by.post', request()->route('post'))}}"
		    		>
		    			<i class="fa fa-trash" aria-hidden="true"></i>
		    		</button>
		    	{!! Form::close() !!}				    	
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif