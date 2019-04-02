@extends('layouts.Blog.cerulean_bwacth')

@section('content')
	<h1 class="text-primary text-center">{{ $category->title }}</h1>	
	{!! $category->description !!}

	<hr />

	<div class="panel panel-danger">
	  <div class="panel-heading">
	    <h3 class="panel-title">
	    	<i class="fa fa-list-alt fa-3x" aria-hidden="true"></i> 
	    	Temario Curso de de Contabilidad Básica</h3>
	  </div>
	  <div class="panel-body">  	
			<div class="list-group table-of-contents">            
				@foreach($category->posts as $post)				
					<a class="list-group-item" href="{{ route('post.show', $post) }}" title="{{ $post->title }}"> 
					<span> {{ $post->title }} </span>
					<span class="pull-right">(Video) <i class="fa fa-video-camera" aria-hidden="true" style="color:#AF3E42;"></i></span>
					</a>				
				@endforeach	
			</div>
		</div>
	</div>
@endsection