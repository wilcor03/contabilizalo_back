@extends('layouts.Blog.cerulean_bwacth_home')

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
<style type="text/css">
@import url(//www.google.com/cse/api/branding.css);
.custom_title{
  font-size: 2em !important;
}
</style>

<!-- Put the following javascript before the closing </head> tag. -->
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

@section('content')
  
    <div class="row">
      <div class="col-sm-3 hidden-xs hidden-sm">
        <div class="fb-page" data-href="https://www.facebook.com/Contabilizalocom-559714470714981/" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">          
        </div>
      </div>
      
      <div class="col-sm-6">
        <header>
          <div class="page-header text-center">
            <h1 class="custom_title">Contabilizalo, Aprendizaje Fácil. ConTabilidad, Excel y Más</h1>
          </div>

          <div align="center">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- 04. home_top -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:336px;height:280px"
                 data-ad-client="ca-pub-6749239594655834"
                 data-ad-slot="7835762932"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
          </div>
          <hr>

          @include('partials.mailchimp_form')          
        </header>

        <section>
        <article>

        <p>Encuentra información Gratis Referente a distintos temas de tu interés</p>
        <ul class="list-unstyled">
          <li>
            <span class="text-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
            Contabilidad Básica
          </li>
          <li>
            <span class="text-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>            
            Contabilidad Intermedia y Avanzada
          </li>
          <li>
            <span class="text-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
            Excel Básico
            </li>
          <li>
            <span class="text-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
            Excel Intermedio y Avanzado
          </li>
          <li>
            <span class="text-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
            Normas Internacionales de Información Financiera (NIIF)
          </li>
          <li>
            <span class="text-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
            Emprendimiento
          </li>
          <li>
            <span class="text-success"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
            y Mas...
          </li>
        </ul>

        <div class="text-center">
          <h3 class="text-primary">Buscar Contenido</h3>
        </div>

        <div class="well">
          <div class="cse-branding-bottom" style="background-color:#FFFFFF;color:#000000">
            <div class="cse-branding-form">
              <form onsubmit="return executeQuery();" id="cse-search-box-form-id">
                <div class="text-center">
                  <div class="form-group has-success">
                    <input type="text" id="cse-search-input-box-id" size="25" autocomplete="off" class="form-control" />                   
                  </div>
                  <input type="submit" value="Buscar" class="btn btn-primary"/>
                </div>
              </form>
            </div>    
          </div>  
        </div>

      </div>
      </article>
      </section>

      <div class="col-sm-3">

        <div align="center">

          <!--
          <a href="https://play.google.com/store/apps/details?id=com.wilcor.detrips" title="Descarga guía turistica DeTrips" target="_blank">
          <picture class="text-center">
            {!! Html::image('images/banner_detrips_contabilizalo.png', 'Descarga DeTrips', ['width' => '280px','height' => '220px','class' => 'img-responsive']) !!}
          </picture>
          </a>

          <hr>

          <a href="{{ route('promo.apl.renta.j') }}" title="Descarga Liquidador Renta Personas Jurídicas">
            <picture class="text-center">
              {!! Html::image('images/renta-personas-juridicas-banner.png', 'renta personas jurídicas en Excel', ['width' => '280px','height' => '220px','class' => 'img-responsive']) !!}
            </picture>
          </a>-->

          <a href="{{ route('promo.apl.renta') }}" title="Descarga Liquidador Renta Personas Naturales">
            <picture class="text-center">
              {!! Html::image('images/banner-people-tax.png', 'renta personas naturales en Excel', ['width' => '280px','height' => '220px','class' => 'img-responsive', 'style' => 'border: 1px solid #c7c7c7;
                box-shadow: 1px 2px 2px #000;']) !!}
            </picture>
          </a>
          <br>
        </div>

        <hr>

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- 01. right_in_posts -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:600px"
             data-ad-client="ca-pub-6749239594655834"
             data-ad-slot="4339069736"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>       
        
      </div>
    </div>    

    <section>
      <article>
      <div>
       <gcse:searchresults-only></gcse:searchresults-only>
      </div>
      </article>
    </section>

    <section>
      <article>
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
      </article>
    </section>
  {{-- @include('partials.modal_promo') --}}
@endsection

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/cookie.js') }}"></script>
  <script type="text/javascript"
        src="//www.google.com/cse/brand?form=cse-search-box-form-id&inputbox=cse-search-input-box-id">
  </script>
  <!-- End of Google branding watermark -->

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