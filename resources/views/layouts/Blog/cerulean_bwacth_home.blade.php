
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
    {!! Html::script("https://use.fontawesome.com/050f874abd.js") !!}    
    <style type="text/css">
      .container{
        margin-top:60px;"
      }      
    </style>
    {{--@include('layouts.Blog.partials.adsense-level-page')--}}

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PFNTZ4M');</script>
    <!-- End Google Tag Manager -->
  </head>
  <body>
    @include('layouts.Blog.partials.facebook-box')
    @include('layouts.Blog.partials.superior-nav')
    
    <div class="container-fluid">      
      @yield('content')     
      @include('partials.modal_promo')
    </div> <!-- end container -->
    @include('layouts.Blog.partials.footer')

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="{!! asset('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/templates/bw_cerulean/js/custom.js') !!}"></script> 
    <script type="text/javascript" src="{!! asset('bower_components/js-cookie/src/js.cookie.js') !!}"></script>   

    @yield('scripts')    
    @include('layouts.Blog.partials.analytics')
  <script type="text/javascript">/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script></body>
</html>