@component('mail::message')
<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" />
<br>
<h2 style="color:#168bde;">
<a href="">Únete aquí a EXCEL CON SÚPER PODERES</a>
</h2>
<br>
<div style="text-align: justify;">
<!--<h2 style="text-align: justify;">¿Ya estás en nuestros grupos privados?</h2>-->
<p>
<strong>{{ strtoupper($suscriber->name) }}</strong>, hoy cerramos la gran oferta del 50% en mi programa de <strong><i>EXCEL CON SUPER PODERES</i></strong> y si tú también quieres automatizar procesos que de seguro te van a ahorrar mucho tiempo, yo puedo enseñarte cómo  conseguirlo y lo mejor paso a paso.
</p>
<p style="text-align: justify;">Así que si trabajas incansablemente en el manejo de datos y deseas hacer las cosas más fáciles estoy seguro que este curso paso a paso es para ti.</p>
<p style="text-align: justify;">Ayer viste el gran poder de Excel y las herramientas que tienes a la mano, si estás dispuesto a buscar la forma de que funcione sin sentirte frustrado con la cantidad de datos que no sabes cómo presentar y analizar, <strong>EXCEL CON  SUPER PODERES</strong> es tu mejor opción.</p>
<p style="text-align: justify;">Te ayudare, y lo mejor te acompañare con videos y plantillas que te darán práctica e ideas para que desde ya implementes en tus trabajos o proyectos.</p>
<p style="text-align: justify;"><a href="https://www.hotmart.com/product/excel-practico-power-pivot-power-query-3x1/K54691318O">Tu realización profesional no puede esperar más: apuntate ahora a <strong>EXCEL CON SÚPER PODERES.</a></strong></p>
<p style="text-align: justify;">Nos vemos en el curso,</p>
<p>Wilmer Córdoba</p>
</div>

@component('mail::button', ['url' => 'https://www.hotmart.com/product/excel-practico-power-pivot-power-query-3x1/K54691318O', 'color' => 'green'])
Quiero unirme este curso
@endcomponent

@component('mail::panel')
Un abrazo,<br>
# Wilmer Cordoba
ConTabilizalo.com
<hr>
<a style="font-size: 10px;" href="{{ route('promo.delete.suscriber', ['e' => $suscriber->email, 'id' => $suscriber->id]) }}">Salir de esta lista</a>
@endcomponent
@endcomponent
