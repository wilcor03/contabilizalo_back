
<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="UTF-8">
    @section('title_page')
      <title>ConTabilizalo.com Información Contable y Excel</title>
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta property="fb:app_id" content="1554582124798835"/>
    <link rel="icon" href="https://contabilizalo.com/favicon.png" type="image/x-icon" />    
    {!! Html::style('assets/templates/bw_cerulean/css/bootstrap.min.css') !!}
    {!! Html::style('assets/templates/bw_cerulean/css/custom.min.css') !!}
    @yield('head')

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->    
    {!! Html::script("https://use.fontawesome.com/1d29805766.js") !!}
    <style type="text/css">
      .searcher-btn{
        max-width: 300px !important;
      }
      .navbar{
        position: relative;        
      }      
      .header_ads{
        margin:15px 0 15px 0;
        text-align: center;
      }      
      .affix{        
        top:0;
        z-index: 999;
        width: 100%;
      }
    </style>
    @include('layouts.Blog.partials.adsense-level-page')
  </head>
  <body>
    @include('layouts.Blog.partials.facebook-box')
    @include('layouts.Blog.partials.superior-nav')

    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <header>
            @yield('h1')        
          </header>
          <section>
            <article>            
                @yield('content')
            </article>
          </section>
        </div>
        <div class="col-sm-3" align="center">

        <!--<a href="https://play.google.com/store/apps/details?id=com.wilcor.detrips" title="Descarga guía turistica DeTrips" target="_blank">
        <picture class="text-center">
          {!! Html::image('images/banner_detrips_contabilizalo.png', 'Descarga DeTrips', ['width' => '280px','height' => '220px','class' => 'img-responsive']) !!}
        </picture>
        </a>-->

        

        <!--<a href="{{ route('promo.apl.renta.j') }}" title="Descarga Liquidador Renta Personas Jurídicas">
        <picture class="text-center">
          {!! Html::image('images/renta-personas-juridicas-banner.png', 'renta personas jurídicas en Excel', ['width' => '280px','height' => '220px','class' => 'img-responsive', 'style' => 'border: 1px solid #c7c7c7;
            box-shadow: 1px 2px 2px #000;']) !!}
        </picture>
        </a>
          <br>-->
          
          @if(Route::currentRouteName() != "promo.apl.renta.j" && Route::currentRouteName() != "promo.apl.renta")
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- 01. right_in_posts -->
          <ins class="adsbygoogle"
               style="display:inline-block;width:300px;height:600px"
               data-ad-client="ca-pub-6749239594655834"
               data-ad-slot="4339069736"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
          <hr>

          @endif
          <!--<br>
          <a href="{{ route('promo.apl.renta') }}" title="Descarga Liquidador Renta Personas Naturales">
            <picture class="text-center">
              {!! Html::image('images/banner-people-tax.png', 'renta personas naturales en Excel', ['width' => '280px','height' => '220px','class' => 'img-responsive', 'style' => 'border: 1px solid #c7c7c7;
                box-shadow: 1px 2px 2px #000;']) !!}
            </picture>
          </a>
          <br>
          <a target="_blank" href="https://trabajo.contabilizalo.com/app/auth/pre-register" title="Encontrar ofertas de empleo en Colombia">
            <picture class="text-center">
              {!! Html::image('images/empleo-trabajador.png', 'Encontrar trabajo en Colombia', ['width' => '280px','height' => '220px','class' => 'img-responsive', 'style' => 'border: 1px solid #c7c7c7;
                box-shadow: 1px 2px 2px #000;']) !!}
            </picture>
          </a>      
          <br>-->
            @if(isset($soldCategories[@$post->category_id]))
              <div class="panel panel-primary">
                <div class="panel-body">

                  <H4 class="text-danger" style="text-shadow: 1px 1px 2px #ccc">DESCARGA TODOS LOS VIDEOS Y FORMATOS DE ESTE CURSO</H4>
                  <br>
                  <i class="fa fa-file-video-o fa-3x text-danger" aria-hidden="true"></i> 
                  <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-file-excel-o fa-3x text-success" aria-hidden="true"></i>
                  <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                  <i class="fa fa-file-pdf-o fa-3x text-warning"" aria-hidden="true"></i>
                  <hr>            

                  <a href="{{ route('promo.courses', ['course' => $post->category_id]) }}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Descargar Curso Completo</a>

                </div>
              </div>
              <hr>
            @endif
          @if(Route::currentRouteName() != "promo.apl.renta.j")
          <div class="fb-page"
          data-href="https://www.facebook.com/Contabilizalocom-559714470714981/" 
          data-width="340"
          data-hide-cover="false"
          data-show-facepile="true"
          data-adapt-container-width="true"></div>
          @endif
        
        </div>
      </div>  

      @include('layouts.Blog.partials.footer')
    </div> <!-- end container -->


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="{!! asset('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/templates/bw_cerulean/js/custom.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('bower_components/js-cookie/src/js.cookie.js') !!}"></script>
    @yield('scripts')   
    @include('layouts.Blog.partials.analytics')
  <script type="text/javascript">/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>
  </body>
</html>
