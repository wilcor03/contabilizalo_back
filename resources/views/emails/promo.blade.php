@component('mail::message')
<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" />

<div style="text-align: justify;">
<br>
<p>
<strong>{{ strtoupper($suscriber->name) }}</strong>, ¡abrimos inscripciones al webinar <strong><i><a href="https://bit.ly/Inscribirme_al_Evento">AUTOMATIZACIÓN Y NUEVAS PRÁCTICAS CON EXCEL!</a></i></strong>
</p>
<br>
<p style="text-align: justify;">Sé que por algún motivo te fue imposible asistir al evento en vivo realizado la semana pasada, por esto deseo participes en este evento en vivo que se realizará el viernes 25 de junio hora Colombia.</p>
<p style="text-align: justify;">Este es un Webinar muy especial voy a compartir contigo: </p>
<ul>
	<li>El cómo modificar, transformar y procesar altos volúmenes de información.</li>
	<li>El cómo generar reportes dinámicos como por ejemplo los Dashboards.</li>
	<li>Y lo mejor es que no vas a tener que usar programación o Macros.</li>
</ul>
<p>La sesión es completamente gratuita y <a href="https://bit.ly/Inscribirme_al_Evento">para poder verla solo tienes que inscribirte aquí</a></p>

<p style="text-align: justify;">Espero verte en la sesión para que conozcas las nuevas tecnologías que facilitarán tu vida y por supuesto recibas tu certificado de asistencia.</p>
<p style="text-align: justify;"><a href="">
	<a href="https://t.me/joinchat/znggIlK1GyVkMTUx">PD:  Para tener contacto directo  contigo  unete a nuestro canal de Telegram</a>
</p>

</div>

@component('mail::button', ['url' => 'https://bit.ly/Inscribirme_al_Evento', 'color' => 'green'])
Inscribirme al evento Gratuito
@endcomponent

@component('mail::panel')
Nos vemos en el evento,<br>
# Wilmer Cordoba
ConTabilizalo.com
<br>
<a href="https://www.facebook.com/ConTabilizaloCom">Siguenos en Facebook</a>
<hr>
<a style="font-size: 10px;" href="{{ route('promo.delete.suscriber', ['e' => $suscriber->email, 'id' => $suscriber->id]) }}">Salir de esta lista</a>
@endcomponent
@endcomponent
