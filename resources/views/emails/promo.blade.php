@component('mail::message')
<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" />
<br>
<div style="text-align: justify;">
¡Hola!, 
{{ strtoupper($suscriber->name) }}<br>
<br>
<h2 style="text-align: justify;">Me gustaría preguntarte algunas cosas:</h2>
<ul style="font-size: 16px;">
	<li>¿Qué tal te llevas al no saber Excel en su totalidad?</li>
	<li>¿Qué tal te llevas con el manejo de grandes volúmenes de datos y sentirte limitado(a) al no poderlos transformar y utilizar de la manera que deseas?</li>
	<li>¿Eres de los que haces los mismos procesos en Excel una y otra vez?</li>
</ul>
<br>
<p style="text-align: justify;">El trabajo mecánico y repetitivo se llevan mal, al menos para el 99% de las personas como tú o como yo. Sobre todo, al momento de generar informes con gran cantidad de datos, ¿verdad?</p>
<p style="text-align: justify;">Las tareas repetitivas disparan nuestra pérdida de tiempo y despierta frustración al momento de reflejar los datos para un correcto análisis y toma de decisiones. Así que por nuestro propio bien, nos conviene empezar a mejorar nuestra calidad de vida delegando el trabajo pesado a la máquina y la interpretación al humano :D</p><br>
<p style="text-align: justify;">Por eso quiero invitarte  el próximo 18 de junio a una  sesión en directo llamada <a href="https://event.webinarjam.com/channel/contabilizalo">"Automatización y Nuevas Prácticas Con Excel"</a></p>

<div style="text-align: justify;">Este es un Webinar muy especial que he creado, en el que voy a compartir contigo:
<ul style="text-align: justify; font-size: 16px;">
	<li>El cómo modificar, transformar y procesar altos volúmenes de información.</li>
	<li>El cómo generar reportes dinámicos como por ejemplo los Dashboards.</li>
</ul>
</div>       
<br>
<p style="text-align: justify;">Y lo mejor es que no vas a tener que usar programación o Macros.</p>

<p style="text-align: justify;">La sesión es completamente gratuita y <a href="https://event.webinarjam.com/channel/contabilizalo">para poder verla solo tienes que registrarte  aquí.</a></p>
<p style="text-align: justify;">Espero verte en la sesión para que conozcas las nuevas tecnologías que facilitarán tu vida y por supuesto recibas tu certificado de asistencia.</p>
</div>

@component('mail::button', ['url' => 'https://event.webinarjam.com/channel/contabilizalo', 'color' => 'green'])
Registro gratuito
@endcomponent

@component('mail::panel')
Saludos,<br>
# Grupo de - <a target="_blank" href="https://contabilizalo.com">{{ config('app.name') }}</a>
<div style="text-align: center;">
<a href="https://contabilizalo.com" style="color:#7b5f2c;">
	<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" alt="logo-contabilizalo">
	www.contabilizalo.com
</a>
</div>
<hr>
<a style="font-size: 10px;" href="{{ route('promo.delete.suscriber', ['e' => $suscriber->email, 'id' => $suscriber->id]) }}">Salir de esta lista</a>
@endcomponent
@endcomponent
