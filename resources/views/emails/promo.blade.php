@component('mail::message')
<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" />

<div style="text-align: justify;">
<br>
<p>
<strong>Hola, {{ strtoupper($suscriber->name) }},
</p>
<br>
<p style="text-align: justify;">Hola, se que estuviste en el evento en vivo <strong><i>NUEVAS PRÁCTICAS CON EXCEL 2021</i></strong> y también sé que te encanto.</p>
<p style="text-align: justify;">Así que no dejes de darle otro nivel a tu Excel con herramientas avanzadas como <strong>POWER PIVOT</strong>, <strong>POWER QUERY</strong> y la elaboración de <strong>Dashboards</strong>:</p>
<p style="text-align: justify;">Tu empleo del día a día y/o tu emprendimiento requieren que automatices los procesos y ahorres tiempo.</p>
<p style="text-align: justify;">Tendrás más de 7 módulos disponibles ahora mismo para ti, además, si te inscribes ahora ahorras el 50% y obtienes dos módulos adicionales: <strong>INTRODUCCIÓN A POWER BI</strong> y <strong>POWER MAPS.</strong></p>
<p><a href="https://payment.hotmart.com/K54691318O?off=ke8jrqug&checkoutMode=10&bid=1624389589716">Obtener Excel con Super poderes con el 50% de descuento >></a></p>
</div>

@component('mail::button', ['url' => 'https://payment.hotmart.com/K54691318O?off=ke8jrqug&checkoutMode=10&bid=1624389589716', 'color' => 'green'])
Quiero este super pack
@endcomponent

<p>
	<strong>Ventajas:</strong>
	<ul>
		<li>Acceso de por vida</li>
		<li>Garantía <strong>HOTMART</strong></li>
		<li>Acceso a la plataforma 24/7</li>
		<li>Reuniones en vivo para refuerzo</li>
		<li>Plantillas y material de descarga</li>
		<li>Certificado de finalización</li>
		<li>Actualizaciones periódicas gratuitas</li>
		<li>y mucho más...</li>
	</ul>
</p>

@component('mail::panel')
Te veré en el curso,<br>
# Wilmer Cordoba
ConTabilizalo.com
<br>
<a href="https://www.facebook.com/ConTabilizaloCom">Siguenos en Facebook</a>
<hr>
<a style="font-size: 10px;" href="{{ route('promo.delete.suscriber', ['e' => $suscriber->email, 'id' => $suscriber->id]) }}">Salir de esta lista</a>
@endcomponent
@endcomponent
