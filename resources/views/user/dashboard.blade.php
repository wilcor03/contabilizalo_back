@extends('layouts.Blog.cerulean_bwacth')

@section('content')
	<div class="panel panel-danger">
	  <div class="panel-heading">
	    <h3 class="panel-title">
	    	<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
	    	MENÚ</h3>
	  </div>
	  <div class="panel-body">  	
			<div class="list-group table-of-contents">            					
				<a class="list-group-item" href="{{ route('post.view.all') }}"> 
					<span> Administrar Artículos </span>
				</a>						
			</div>
		</div>
	</div>
@endsection