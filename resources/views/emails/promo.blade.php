@component('mail::message')
<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" />
<br>
<div style="text-align: justify;">
<br>
<p style="text-align: justify;">
<strong>{{ strtoupper($suscriber->name) }},</strong> ¿Te encuentras en un momento donde la cantidad de datos te abruman?  ¿Te sientes drenado de hacer una y otra vez las mismas cosas en Excel? ¿No sabes por dónde empezar con paso firme?
</p>
<p style="text-align: justify;">La falta de automatización en tu trabajo puede tener distintas causas y no ocuparte de entenderlas puede llevarte a estados de agotamiento persistente hasta frustrarte.</p>

<p style="text-align: justify;">Hoy en día, existen tecnologías que te permiten optimizar los procesos de tal manera que tendrás que buscar en qué invertir el tiempo libre del que dispondrás si le delegas a la máquina tanto proceso que hoy día realizas a mano.</p>

<p style="text-align: justify;">La tecnología a la que me refiero siempre ha estado a tu mano, solo que la gran mayoría de las personas no le saca el 100% de provecho. Qué pasaría si le pudieras decir un simple libro de Excel que siempre te formatee la información según ciertos criterios y que cuando te llegue información nueva, el sistema ya sepa qué hacer con ella: ordenarla, generar ciertos cálculos y además presentarla de manera organizada y estéticamente atractiva.</p>

<p style="text-align: justify;">Todo esto ya existe, es fácil de implementar y nos lo brinda Excel con sus complementos, Power Query, Power Pivot y los Dashboard. El BI <strong>(Business Intelligence)</strong> ya está aquí, solo falta que tú lo aproveches.</p>

<p>¡Por cierto!</p>

<p style="text-align: justify;">Solo por ti mantenemos nuestras inscripciones abiertas al programa <strong>EXCEL CON SÚPER PODERES</strong></p>

<p style="text-align: justify;"><a href="https://rebrand.ly/Obtener-Descuento-ahora">Clic aquí para unirte al programa con el 50% de descuento donde aprenderás paso a paso Excel como un experto.</a></p>
<p style="text-align: justify;">Me encantaría verte dentro del curso y ayudarte a reescribir tu relación con el Excel.</p>

@component('mail::button', ['url' => 'https://rebrand.ly/Obtener-Descuento-ahora', 'color' => 'green'])
Quiero unirme >>
@endcomponent
</div>

@component('mail::panel')
Un fuerte abrazo,<br>
# Wilmer Cordoba
ConTabilizalo.com
<br>
<a href="https://www.facebook.com/ConTabilizaloCom">Siguenos en Facebook</a>
<hr>
<a style="font-size: 10px;" href="{{ route('promo.delete.suscriber', ['e' => $suscriber->email, 'id' => $suscriber->id]) }}">Salir de esta lista</a>
@endcomponent
@endcomponent
