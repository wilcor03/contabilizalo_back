@component('mail::message')
<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" />

<div style="text-align: justify;">
<br>
<p>
<strong>Hola, {{ strtoupper($suscriber->name) }}
</p>
<br>
<p style="text-align: justify;">Aún estoy emocionado con lo que sucedió en la sesión en directo <strong><i>“Automatización y Nuevas Prácticas Con Excel”</i></strong> que he impartido hace apenas unas horas.</p>
<p style="text-align: justify;">¡Tantas personas se han dado cuenta de las herramientas que han omitido en su día a día y a la vez, es tan normal seguir haciendo trabajos mecánicos que quitan mucho tiempo, dejando de lado el poder de la AUTOMATIZACIÓN...</p>

<p style="text-align: justify;">
	...¿Verdad?, Así que, si a ti también te pasa, es hora de poner manos a la obra!
</p>

<p style="text-align: justify;">
	<a href="https://youtu.be/Bd8WXarE__I">Si no pudiste entrar en directo en la sesión o te gustaría verla otra vez, aquí tienes la grabación. Pero ten en cuenta que sólo estará disponible por 48 horas.</a>
</p>

<p style="text-align: justify;">Además, te comparto la super oferta del 50% que tenemos para ti de nuestro curso <strong><i><a href="https://certificate.contabilizalo.com/excel-para-contadores-y-financieros/">EXCEL CON SÚPER PODERES</a></i></strong></p>

<p style="text-align: justify;">¿Qué esperas para adquirirla?  aprende paso a paso ahora.</p>
<p><a href="https://go.hotmart.com/K54691318O?dp=1">Clic aquí para obtener la oferta al 50%</a></p>
</div>

@component('mail::button', ['url' => 'https://go.hotmart.com/K54691318O?dp=1', 'color' => 'green'])
Obtener Curso con 50% + Módulos adicionales
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
