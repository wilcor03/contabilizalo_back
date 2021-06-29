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
footer a {
  color: yellow;
}
.custom-cards{
  box-shadow: 2px 3px 3px #000;
}
.jumbotron{
  background: url('/images/accountant-1794122_640.png') #9ccc65;
  background-position: center;
  background-repeat: no-repeat;
}
.jumbotron .sub-title{
  background: #06356f;
  border-radius: 6px;
  opacity: 0.9;
  padding: 7px;
  color: #ffffff;
  box-shadow: 1px 1px 15px #000;
}
</style>

<!-- Put the following javascript before the closing </head> tag. -->
<!--<script>
  (function() {
    var cx = 'partner-pub-6749239594655834:6581185738';
    var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
  })();
</script>-->
<script data-ad-client="ca-pub-6749239594655834" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1337685433285281');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1337685433285281&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
@endsection

@section('content')
  <div class="row">
    <div class="col-md-9">
      <section>
        <article>
          <div class="jumbotron">
            <div class="container">
              <div class="page-header text-center sub-title">
              <h1 class="custom_title">ConTabilizalo, Aprendizaje Fácil. ConTabilidad, Excel, Programación y Más.</h1>
            </div>
            </div>
          </div>
        </article>
      </section>
      <br>

      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <ins class="adsbygoogle"
           style="display:block; text-align:center;"
           data-ad-layout="in-article"
           data-ad-format="fluid"
           data-ad-client="ca-pub-6749239594655834"
           data-ad-slot="8908168290"></ins>
      <script>
           (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <br>
      <section>
        <article>
          <div class="row">
            <div class="col-md-4">      
              <div class="thumbnail custom-cards">
                <img src="{{ asset('images/home_excel_practico.jpg') }}" alt="...">
                <div class="caption text-center">
                  <h3>Excel Práctico</h3>
                  <p class="text-muted">Certificate como experto en Excel, funciones, tablas y macros.</p>
                  <p><a target="_blank" href="{{ route('promo.excel-vba', ['c' => 'excel']) }}" class="btn btn-info" role="button">
                    Mas información <i class="fa fa-angle-double-right"></i>
                  </a>
                  
                  <p style="border-top:1px solid; color:red;">CONTABILIZALO</p>
                </div>
              </div>      
            </div>        
            <!--<div class="col-md-4">      
              <div class="thumbnail custom-cards">
                <img src="{{ asset('images/cont_tec_laboral.jpg') }}" alt="...">
                <div class="caption text-center">
                  <h3>Técnicos laborales</h3>
                  <p class="text-muted">Convierte en técnico laboral <strong>CERTIFICADO</strong> en 1 año.</p>
                  <p><a href="/cursos/tecnicos" class="btn btn-info" role="button">
                    Ver Programas <i class="fa fa-angle-double-right"></i>
                  </a>
                  
                  <p style="border-top:1px solid; color:red;">HEMISFERIO</p>
                </div>
              </div>      
            </div>--><!--end col-->  
            <div class="col-md-4">  
              <div class="thumbnail custom-cards">
                <img src="{{ asset('images/cont_vba-excel_ok.jpg') }}" alt="...">
                <div class="caption text-center">
                  <h3>VBA Excel</h3>
                  <p class="text-muted">Crea Aplicaciones avanzadas con <strong>Excel</strong> y <strong>Visual Basic.</strong></p>
                  <p><a target="_blank" href="{{ route('promo.excel-vba') }}" class="btn btn-info" role="button">
                    Mas información <i class="fa fa-angle-double-right"></i>
                  </a>
                  
                  <p style="border-top:1px solid; color:red;">CONTABILIZALO</p>
                </div>
              </div>

            </div><!--end col--> 
            <div class="col-md-4">      
              <div class="thumbnail custom-cards">
                <img src="{{ asset('images/cont_contabilidad_intermedia.jpg') }}" alt="...">
                <div class="caption text-center">
                  <h3 style="font-size: 1.9rem;">Contabilidad Práctica</h3>
                  <p class="text-muted">Aprende con ejercicios prácticos contables en Video</p>
                  <p><a href="/curso-de-contabilidad-gratis-en-colombia" class="btn btn-info" role="button">
                    Ver Videos <i class="fa fa-angle-double-right"></i>
                  </a>
                  
                  <p style="border-top:1px solid; color:red;">CONTABILIZALO</p>
                </div>
              </div>      
            </div><!--end col--> 
          </div><!-- end internal row-->
        </article>
      </section>
      <br>
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <ins class="adsbygoogle"
           style="display:block; text-align:center;"
           data-ad-layout="in-article"
           data-ad-format="fluid"
           data-ad-client="ca-pub-6749239594655834"
           data-ad-slot="8908168290"></ins>
      <script>
           (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <br>
      <section>
        <article>
          <div class="row">
            <div class="col-md-4">   

              <div class="thumbnail custom-cards">
                <img src="{{ asset('images/cont_contabilidad_basica.jpg') }}" alt="...">
                <div class="caption text-center">
                  <h3>Contabilidad Básica</h3>
                  <p class="text-muted">Aprende las bases de la <strong>Contabilidad</strong> Global en Video</p>
                  <p><a href="/curso-de-contabilidad-gratis" class="btn btn-info" role="button">
                    Ver Videos <i class="fa fa-angle-double-right"></i>
                  </a>
                  
                  <p style="border-top:1px solid; color:red;">CONTABILIZALO</p>
                </div>
              </div>                
            </div><!--end col-->  
            <div class="col-md-4">   

              <div class="thumbnail custom-cards">
                <img src="{{ asset('images/cont_excel_basicol.jpg') }}" alt="...">
                <div class="caption text-center">
                  <h3>Excel Básico</h3>
                  <p class="text-muted">Entiende la estructura, funcionalidad y aplicación de Excel</p>
                  <p><a href="/curso-de-excel-gratis" class="btn btn-info" role="button">
                    Ver Programas <i class="fa fa-angle-double-right"></i>
                  </a>
                  
                  <p style="border-top:1px solid; color:red;">CONTABILIZALO</p>
                </div>
              </div>
                   
            </div><!--end col--> 
            <div class="col-md-4"> 

              <div class="thumbnail custom-cards">
                <img src="{{ asset('images/cont_excel_inermedio.jpg') }}" alt="...">
                <div class="caption text-center">
                  <h3>Excel Intermedio</h3>
                  <p class="text-muted">Funciones, tablas dinámicas y muchas utilidades más en MS Excel.</p>
                  <p><a href="/curso-de-excel-avanzado-gratis" class="btn btn-info" role="button">
                    Ver Videos <i class="fa fa-angle-double-right"></i>
                  </a>
                  
                  <p style="border-top:1px solid; color:red;">CONTABILIZALO</p>
                </div>
              </div>                
            </div><!--end col--> 
          </div><!-- end internal row2-->
        </article>
      </section>
      <br>
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <ins class="adsbygoogle"
           style="display:block; text-align:center;"
           data-ad-layout="in-article"
           data-ad-format="fluid"
           data-ad-client="ca-pub-6749239594655834"
           data-ad-slot="8908168290"></ins>
      <script>
           (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <br>
      <section>
        <article>
          <div class="row">
            <div class="col-md-4">      
              <div class="thumbnail custom-cards">
                <img src="{{ asset('images/cont_niif.jpg') }}" alt="...">
                <div class="caption text-center">
                  <h3>NIIF</h3>
                  <p class="text-muted">Normas internacionales de información Financiera.</p>
                  <p><a href="/niif" class="btn btn-info" role="button">
                    Ver Publicaciones <i class="fa fa-angle-double-right"></i>
                  </a>
                  
                  <p style="border-top:1px solid; color:red;">CONTABILIZALO</p>
                </div>
              </div>      
            </div><!--end col-->  
            <div class="col-md-4">      
              <div class="thumbnail custom-cards">
                <img src="{{ asset('images/cont_videos_laboral.jpg') }}" alt="...">
                <div class="caption text-center">
                  <h3>Laboral - Nómina</h3>
                  <p class="text-muted">Videos en donde liquidaremos paso a paso una <strong>Nómina.</strong></p>
                  <p><a href="/curso-nomina-y-laboral-gratis-en-video-online" class="btn btn-info" role="button">
                    Ver Videos <i class="fa fa-angle-double-right"></i>
                  </a>
                  
                  <p style="border-top:1px solid; color:red;">CONTABILIZALO</p>
                </div>
              </div>
            </div><!--end col--> 
            <div class="col-md-4">      
                    
            </div><!--end col--> 
          </div><!-- end internal row2-->
        </article>
      </section>
      <br>
      <br>
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <ins class="adsbygoogle"
           style="display:block; text-align:center;"
           data-ad-layout="in-article"
           data-ad-format="fluid"
           data-ad-client="ca-pub-6749239594655834"
           data-ad-slot="8908168290"></ins>
      <script>
           (adsbygoogle = window.adsbygoogle || []).push({});
      </script>      
    </div>

    <div class="col-md-3"> 
    <section>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- 01. right_in_posts -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:600px"
             data-ad-client="ca-pub-6749239594655834"
             data-ad-slot="4339069736"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script><br>
        <br><br>
        <a href="https://certificate.contabilizalo.com/excel-para-contadores-y-financieros/" target="_blank" title="Video curso Macros y VBA Excel - Programación en Excel">
          <picture class="text-center">
            {!! Html::image('images/banner_contabilizalo_promo_excel_sp.png', 'Curso de Excel Desde 0 a Avanzado', ['class' => 'img-responsive', 'style' => 'border: 1px solid #c7c7c7;
                box-shadow: 1px 2px 2px #000;']) !!}
          </picture>
        </a>
        <br>

        <!--<a href="{{ route('promo.apl.renta') }}" title="Descarga Liquidador Renta Personas Naturales">
          <picture class="text-center">
            {!! Html::image('images/banner-people-tax.png', 'renta personas naturales en Excel', ['width' => '280px','height' => '220px','class' => 'img-responsive', 'style' => 'border: 1px solid #c7c7c7;
              box-shadow: 1px 2px 2px #000;']) !!}
          </picture>
        </a>
        
        <br>-->

        <div class="fb-page" data-href="https://www.facebook.com/Contabilizalocom-559714470714981/" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">          
        </div>
      </div>
    </section>     
  </div>


  {{--@include('partials.modal_promo') --}}
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