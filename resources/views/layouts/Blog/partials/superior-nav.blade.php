@if(Route::currentRouteName() != "home" && Route::currentRouteName() != "post.promo.apl")
<div class="row header_ads hidden-xs hidden-sm">
  <div class="col-sm-12">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- 06. Header -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-6749239594655834"
         data-ad-slot="1029636531"
         data-ad-format="auto"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
</div>
<div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
@endif

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/" class="navbar-brand" tittle="logo contabilizalo.com">
        {!! Html::image(config('custom.images.settings.logo-path'), 'contabilizalo.com aprende fácil Contabilidad y Excel', ['class' => 'img-responsive', 'style' => 'max-width: 120px; background:#fff; padding:7px;']) !!}
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
          <a href="/"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Contabilidad <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="themes">
            <li>
              <a title="Curso de Contabilidad Básica En Internet" href="{{ route('post.show', 'curso-de-contabilidad-gratis') }}"><i class="fa fa-battery-quarter" aria-hidden="true"></i> Contabilidad Básica</a></li>               
            <li>
              <a title="Curso de Contabilidad Intermedia - Avanzada" href="{{ route('post.show', 'curso-de-contabilidad-gratis-en-colombia') }}"><i class="fa fa-battery-three-quarters" aria-hidden="true"></i> Contabilidad Intermedia</a></li>

              <li>
              <a title="Publicaciones contabilizalo.com" href="{{ url('publicaciones-contabilizalo') }}"><i class="fa fa-align-justify text-success"></i> Publicaciones</a></li><li>
              <a title="Curso Wordpress desde Cero" href="{{ url('sitio-web-desde-cero-con-wordpress') }}"> <i class="fa fa-wordpress text-info" aria-hidden="true"></i> Curso Wordpress</a></li>                  
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Excel <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="themes">
            <li>
              <a title="Aprende Excel Básico Online Gratis" href="{{ route('post.show', 'curso-de-excel-gratis') }}"><i class="fa fa-file-excel-o text-success" aria-hidden="true"></i> Excel Básico</a></li>                
            <li>
              <a title="Excel Avanzado Gratis en Internet" href="{{ route('post.show', 'curso-de-excel-avanzado-gratis') }}"><i class="fa fa-file-excel-o text-success" aria-hidden="true"></i> Excel Profesional</a></li>                  
          </ul>
        </li>
        <li>
          <a title="Venta de Cursos Excel, Contabilidad y Nómina" href="{{ route('post.show', 'curso-nomina-y-laboral-gratis-en-video-online') }}">Laboral</a>
        </li>
      </ul>
      
      @if(!\Route::currentRouteNamed('home'))                          
        <form onsubmit="return executeQuery();" id="cse-search-box-form-id" class="navbar-form navbar-left">
          <div class="form-group">
            <input id="cse-search-input-box-id" type="text" name="q" size="55" class="form-control searcher-btn" autocomplete="off" />
          </div>                    
          <input type="submit" value="Buscar" class="btn btn-default"/>                  
        </form>      
      @endif 

      <ul class="nav navbar-nav navbar-right">               
        <!--<li>
          <a title="Emprendimiento y Marketing" href="{{ route('post.show', 'como-emprender-un-negocio') }}">Emprendimiento</a>
        </li>-->
        <li style="background: orange; font-weight: bold;">
          <a class="btn btn-xs" title="Cotizar Servicios contables" href="https://trabajo.contabilizalo.com/app/auth/pre-register" target="_blank"><i class="fa fa-info-circle"></i> <u>PORTAL DE EMPLEO</u></a>
        </li>
		<!--<li>
          <a class="btn btn-info btn-sm" title="Cotizar Servicios contables" href="https://elportal.contabilizalo.com" target="_blank"> COTIZAR SERVICIOS CONTABLES</a>
        </li>-->
        <li>
          <a title="Herramientas de NIIF Gratuitas" href="{{ route('post.show', 'niif') }}">NIIF</a>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Herramientas <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="themes">
            <li>
              <a title="App Contabilizalo para Mecánica entre Regímenes Tributarios" href="https://operaciones-entre-regimenes.contabilizalo.com/"><i class="fa fa-link" aria-hidden="true"></i> Mecánica de Retenciones</a>
            </li>                  
          </ul>
        </li>
        @if(Auth::check())
        <li>
          @if(isset($post))
          <a href="{{ route('post.edit', $post) }}" target="_blank" class="text-success">
            <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
          @endif
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
@if(Route::currentRouteName() != "home")
</div>
@endif