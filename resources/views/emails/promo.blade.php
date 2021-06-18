@component('mail::message')
<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" />
<br>
# Hola, {{ strtoupper($suscriber->name) }}<br>
<div style="text-align: justify;">
<h2 style="text-align: justify;">¿Ya estás en nuestros grupos privados?</h2>
<p>Hoy es el gran día, nuestro evento en vivo inicia a las 8:00 PM hora Colombia<p>
<p style="text-align: justify;">Aquí tendremos un trato más cercano, serás el primero en enterarte de todas las noticias y estarás acompañado de personas con tu mismo objetivo de ser un experto en el manejo de Excel.</p>
<p>Nos vemos dentro</p>
<p>Si no te has registrado al evento de hoy te dejo el enlace de registro clic aquí</p>
<p><a href="https://event.webinarjam.com/channel/contabilizalo">Registrarme al Evento gratuito>></a></p>
<ul>
	<li>Certificamos tu asistencia.</li>
</ul>
<p>¡Nos vemos en la sesión!</p>
</div>

@component('mail::button', ['url' => 'https://t.me/joinchat/LwPHxjXARb9jOWMx', 'color' => 'green'])
Unirme al Grupo Telegram
@endcomponent

@component('mail::panel')
Un abrazo,<br>
# Wilmer Cordoba
ConTabilizalo.com
<hr>
<a style="font-size: 10px;" href="{{ route('promo.delete.suscriber', ['e' => $suscriber->email, 'id' => $suscriber->id]) }}">Salir de esta lista</a>
@endcomponent
@endcomponent
