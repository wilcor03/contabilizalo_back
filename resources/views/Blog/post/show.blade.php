@extends('layouts.Blog.cerulean_bwacth')

@section('title_page')
<title>{{ $post->title }}</title>
@endsection

@section('head')
<meta name="description" content="{{ $post->meta_description }}"/>
<meta name="robots" content="noodp"/>
<link rel="canonical" href="{{ request()->url() }}" />
<meta property="og:locale" content="es_ES" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ $post->meta_description }}" />
<meta property="og:url" content="{{ request()->url() }}" />
<meta property="og:site_name" content="Contabilizalo" />
<meta property="article:author" content="https://www.facebook.com/pages/Contabilizalocom/559714470714981" />
<meta property="article:section" content="{{ $post->category->title }}" />
@foreach($post->meta_keyword_array as $keyword)
<meta property="article:tag" content="{{ trim($keyword) }}" />
@endforeach
{!! Html::style('css/custom.css') !!}
<script>
  (function() {
    var cx = 'partner-pub-6749239594655834:6581185738';
    var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
  })();
</script>

@endsection

@section('h1')
	<h1 class="text-primary text-center">{{ $post->title }}</h1>	
@endsection

@section('content')
	<gcse:searchresults-only></gcse:searchresults-only>
	<div class="text-center">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- 02. cont_inside_post -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:336px;height:280px"
		     data-ad-client="ca-pub-6749239594655834"
		     data-ad-slot="2465383732"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div><hr>

	@include('partials.mailchimp_form')

	@if($post->principal_image)
	<picture class="text-center">
	   {!! Html::image($post->principal_image->full_path, $post->image_alt, ['width' => '1000px','height' => '220px','class' => 'img-responsive']) !!}
	</picture>
	@endif
	<hr>
	<div class="panel panel-danger">	  
	  <div class="panel-body text-justify">	  	
	  	@if(!$post->hasCategory && $post->category->id == 9)
	  		<p class="text-right"><small>publicado el: {{ Carbon\Carbon::parse($post->updated_at)->format('d-m-Y') }}</small></p>
	  	@endif
			{!! $post->description !!}
		</div>
	</div>

	@if(count($post->videos))
	<div class="panel panel-danger">
	  <div class="panel-heading">
	    <h2 class="panel-title">
	    	<i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i>
	    	Video: <small class="text-uppercase">{{ $post->videos[0]->title }}</small> </h2>
	  </div>
	  <div class="panel-body">  
	  @foreach($post->videos as $video)			
			<div class="embed-responsive embed-responsive-16by9">
			  <iframe class="embed-responsive-item" src="{{ $video->url }}"  allowfullscreen></iframe>
			</div>
		@endforeach
		</div>
	</div>
	@endif

	@if(count($collectionOfPosts))
		<div class="panel panel-danger">
		  <div class="panel-heading">
		    <h3 class="panel-title">
		    	<i class="fa fa-list-alt fa-3x" aria-hidden="true"></i> 
		    	Videos y Artículos Relacionados con <span class="text-uppercase">
		    		{{ $post->hasCategory->title }}</span></h3>
		  </div>
		  <div class="panel-body">  	
				<div class="list-group table-of-contents">            
					@foreach($collectionOfPosts as $ps)				
						@if($ps->id !== $post->id)
						<a class="list-group-item" href="{{ route('post.show', $ps) }}" title="{{ $ps->title }}"> 
						<span> {{ $ps->title }} </span>

						@if(count($ps->videos))
							<span class="pull-right">(Video) <i class="fa fa-video-camera" aria-hidden="true" style="color:#AF3E42;"></i></span>
						@else
						<span class="pull-right">(Texto) <i class="fa fa-file-text-o" aria-hidden="true"></i></span>
						@endif
						</a>		
						@endif		
					@endforeach	
				</div>
			</div>
		</div>
	@endif

	@if(count($post->postsBelongs))
	<div class="panel panel-danger">
	  <div class="panel-heading">
	    <h3 class="panel-title">
	    	<i class="fa fa-link fa-2x" aria-hidden="true"></i> 
	    	Artículos Relacionados</h3>
	  </div>
	  <div class="panel-body">  	
			<div class="list-group table-of-contents">
			@foreach($post->postsBelongs as $recommended)
				<a class="list-group-item" href="{{ route('post.show', $recommended) }}" title="{{ $recommended->title }}"> 
					<span class="text-primary">{{ $recommended->title }}</span>
					@if(count($recommended->videos))
					<span class="pull-right">(Video) <i class="fa fa-video-camera" aria-hidden="true" style="color:#AF3E42;"></i></span>
					@else
						<span class="pull-right">(Texto) <i class="fa fa-file-text-o" aria-hidden="true"></i></span>
					@endif
				</a>
			@endforeach
			</div>
		</div>
	</div>
	@endif

	@if(count($post->files))
	<div class="panel panel-danger">
	  <div class="panel-heading">
	    <h3 class="panel-title">
	    	<i class="fa fa-files-o fa-2x" aria-hidden="true"></i>
	    	Material de descarga</h3>
	  </div>
	  <div class="panel-body">  	
	  	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- 03. down_inside_post -->
			<ins class="adsbygoogle"
			     style="display:block"
			     data-ad-client="ca-pub-6749239594655834"
			     data-ad-slot="8232715735"
			     data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr class="text-muted">
							<th>Nombre del archivo</th>
							<th>Tipo</th>
							<th>Descargar</th>
							<th>Archivo</th>
						</tr>
					</thead>
					<tbody>
						@foreach($post->files as $file)
						<tr>
							<td>
								<a title="Descargar Gratis en {{ strtoupper($file->type_file->name) }}: {{ $file->title }}" href="{{ route('file.download', $file) }}"><small> {{ $file->original_name }}</small></a>
							</td>
							<td title="Formato {{ strtoupper($file->type_file->name) }}">{!! $file->type_file->icon !!}</td>
							<td>					
								<a title="Descargar {{ $file->title }} en Formato {{ $file->type_file->name }}" class="btn btn-info btn-xs" href="{{ route('file.download', $file) }}"><i class="fa fa-cloud-download" aria-hidden="true"></i> </a>					
							</td>
							<td>
								{{ $file->type_file->name }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>	

		</div>
	</div>
	@else
		<div class="text-center>">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- 03. down_inside_post -->
		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-6749239594655834"
		     data-ad-slot="8232715735"
		     data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		</div>
	@endif	

	@if(!isset($collectionOfPosts))
	<div class="panel panel-danger">
	  <div class="panel-heading">
	    <h3 class="panel-title">
	    	<i class="fa fa-bars fa-2x" aria-hidden="true"></i>
	    	Navegación</h3>
	  </div>
	  <div class="panel-body">  
	  	
	  <ul class="list-inline text-center">
	  	@if($prevPost)
	  		@if($prevPost->id !== $principalPost->id)
	  		<li><a title="{{ $prevPost->title }}" class="text-capitalize" href="{{ route('post.show', $prevPost) }}"><small class="hidden-xs hidden-sm hidden-md">({{ str_limit($prevPost->title, 30) }})</small> <span class="btn btn-warning btn-sm"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Anterior</span></a></li>
	  		@endif
	  	@endif

	  	<li>	  		
	  		<a class="btn btn-info" title="{{ $post->category->post->title }}" href="{{ route('post.show', $post->category->post) }}">VER INDICE <i class="fa fa-list-alt" aria-hidden="true"></i></a>
	  	</li>

	  	@if($nextPost)
	  		@if($nextPost->id !== $principalPost->id)
	  		<li><a class="text-capitalize" title="{{ $nextPost->title }}" href="{{ route('post.show', $nextPost) }}"><span class="btn btn-warning btn-sm">Siguiente <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span> <small class="hidden-xs hidden-sm hidden-md">({{ str_limit($nextPost->title, 30) }})</small></a></li>
	  		@endif
	  	@endif
	  </ul>
		</div>
	</div>
	@endif

	<div class="panel panel-danger">
	  <div class="panel-heading">
	    <h3 class="panel-title">
	    	<i class="fa fa-comments-o fa-2x" aria-hidden="true"></i>
	    	Comentarios</h3>
	  </div>
	  <div class="panel-body">  
	  	@include('layouts.Blog.partials.comments_facebook')			
			<ul class="media-list">
				@foreach($post->comments as $key => $comment)
				  @if($comment->parentComment)
				  <li class="media">
				    <div class="media-left">
				      <a href="#" title="Comentario #{{ $key +1 }} sobre {{ $post->title }}">
				        <img width="64" height="64" class="media-object" src="{{ asset('images/avatars/male.jpg') }}" alt="Avátar Hombre Comentarios ConTabilizalo.com">
				      </a>
				    </div>
				    <div class="media-body">
				      <h4 class="media-heading"><small>Por:</small> <strong>{{ $comment->parentComment->author_name }}</strong></h4>
				      <p>{{ $comment->parentComment->comment }}</p>				       
				      <div class="media"><!--start media 2 -->
						    <div class="media-left">
						      <a href="#" title="Comentario #{{ $key +1 }} sobre {{ $post->title }}">
						        <img width="64" height="64" class="media-object" src="{{ asset('images/avatars/male.jpg') }}" alt="Avátar Hombre Comentarios ConTabilizalo.com">
						      </a>
						    </div>
						    <div class="media-body">
						      <h4 class="media-heading"><small>Por:</small> <strong>{{ $comment->author_name }}</strong></h4>
						      <p>{{ $comment->comment }}</p>						      
						    </div>
						  </div><!-- end media 2 -->
				    </div>
				  </li>
				  @else
			  	<li class="media">
				    <div class="media-left">
				      <a href="#" title="Comentario #{{ $key +1 }} sobre {{ $post->title }}">
				        <img width="64" height="64" class="media-object" src="{{ asset('images/avatars/male.jpg') }}" alt="Avátar Hombre Comentarios ConTabilizalo.com">
				      </a>
				    </div>
				    <div class="media-body">
				      <h4 class="media-heading"><small>Por:</small> <strong>{{ $comment->author_name }}</strong></h4>
				      <p>{{ $comment->comment }}</p>
				    </div>
				  </li>
				  @endif
				@endforeach	
			</ul>
		</div>
	</div>

	@include('partials.modal_promo')
@endsection

@section('scripts')	
	<script type="text/javascript" src="{{ asset('js/cookie.js') }}"></script>

	<script type="text/javascript"
        src="//www.google.com/cse/brand?form=cse-search-box-form-id&inputbox=cse-search-input-box-id">
  </script><!-- End of Google branding watermark -->
  <!-- Element code snippet -->
  <script type="text/javascript">
    function executeQuery() {
      var input = document.getElementById('cse-search-input-box-id');
      var element = google.search.cse.element.getElement('searchresults-only0');
      if (input.value == '') {
        element.clearAllResults();
      } else {
        element.execute(input.value);
      }
      return false;
    }
  </script>

  <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'>    
  </script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text'; /*
 * Translated default messages for the $ validation plugin.
 * Locale: ES
 */
$.extend($.validator.messages, {
  required: "Este campo es obligatorio.",
  remote: "Por favor, rellena este campo.",
  email: "Por favor, escribe una dirección de correo válida",
  url: "Por favor, escribe una URL válida.",
  date: "Por favor, escribe una fecha válida.",
  dateISO: "Por favor, escribe una fecha (ISO) válida.",
  number: "Por favor, escribe un número entero válido.",
  digits: "Por favor, escribe sólo dígitos.",
  creditcard: "Por favor, escribe un número de tarjeta válido.",
  equalTo: "Por favor, escribe el mismo valor de nuevo.",
  accept: "Por favor, escribe un valor con una extensión aceptada.",
  maxlength: $.validator.format("Por favor, no escribas más de {0} caracteres."),
  minlength: $.validator.format("Por favor, no escribas menos de {0} caracteres."),
  rangelength: $.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
  range: $.validator.format("Por favor, escribe un valor entre {0} y {1}."),
  max: $.validator.format("Por favor, escribe un valor menor o igual a {0}."),
  min: $.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
});}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
@endsection