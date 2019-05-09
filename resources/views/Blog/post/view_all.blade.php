@extends('layouts.Blog.cerulean_bwacth_back_end')

@section('content')
	<div class="panel panel-danger">
	  <div class="panel-heading">
	    <h3 class="panel-title">
	    	<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
	    	LISTADO DE ARTÍCULOS</h3>
	  </div>
	  <div class="panel-body">  	
	  	<p>Administrar Artículos publicados en el Blog</p>
	  	<p>
	  		<a href="{{ route('post.create') }}" target="_blank" class="btn btn-primary">Crear articulo</a>
	  	</p>
		</div>

		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th>Titulo</th>
						<th>Descripción</th>						
						<th><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<td>{{ str_limit($post->title, 50) }}</td>
						<td><div class="limit-text">{!! $post->description !!}</div></td>						
						<td>
							<a href="{{ route('post.show', $post) }}" target="_blank">V</a> ||
							<a href="{{ route('post.edit', $post) }}" target="_blank" class="text-success"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a> !! 
							<span class="text-danger"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></span>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div><!--end responsive table -->
		{!! $posts->links() !!}
	</div>
@endsection
@section('scripts')
<script type="text/javascript">// <![CDATA[
	$(function(){
	  $(".limit-text").each(function(i){
	    len=$(this).text().length;
	    if(len>80)
	    {
	      $(this).text($(this).text().substr(0,80)+'...');
	    }
	  });
	});
</script>
@endsection