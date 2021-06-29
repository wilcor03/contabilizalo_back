@component('mail::message')
<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" />

<div style="text-align: justify;">
<br>
<p>
<strong>Hola, {{ strtoupper($suscriber->name) }},
</p>
<br>
<p style="text-align: justify;">Bueno, te comparto el enlace del curso <strong>EXCEL VBA PRO</strong> para que aproveches la promo por hoy del 50% y te conviertas en un expert@ en Visual Basic.</p>

@component('mail::button', ['url' => 'https://go.hotmart.com/H42856436B?ap=e6b8', 'color' => 'green'])
Quiero este super pack
@endcomponent

<p style="text-align: justify;"><a href="https://event.webinarjam.com/go/replay/1/qgxnri6t1txtk">Y por aquí te dejo el enlace de la REPE del evento que tuvo lugar el día de hoy.</a></p>
</div>
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
