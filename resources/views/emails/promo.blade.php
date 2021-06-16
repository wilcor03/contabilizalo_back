@component('mail::message')
<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" />
<br>
# Hola, {{ strtoupper($suscriber->name) }}<br>
<div style="text-align: justify;">
<h2 style="text-align: justify;">¿Aún no te has registrado?</h2>
<p>Registrate al gran evento en vivo totalmente gratis donde compartiré la forma de automatizar las tareas cotidianas con Excel y las nuevas prácticas que están disponibles para hacer tu vida más fácil:<p>
<ul style="text-align: justify; font-size: 16px;">
<li>Power Pivot</li>
<li>Power Query</li>
<li>Introducción a lenguaje DAX</li>
<li>Dashboard</li>
</ul>
<p style="text-align: justify;">Los cupos son limitados, registrate y asegura tu cupo; recuerda  entregamos certificado de asistencia.</p>
</div>

@component('mail::button', ['url' => 'https://event.webinarjam.com/channel/contabilizalo', 'color' => 'green'])
Registrarme
@endcomponent

@component('mail::panel')
Saludos,<br>
# Wilmer Cordoba
ConTabilizalo.com
<hr>
<a style="font-size: 10px;" href="{{ route('promo.delete.suscriber', ['e' => $suscriber->email, 'id' => $suscriber->id]) }}">Salir de esta lista</a>
@endcomponent
@endcomponent
