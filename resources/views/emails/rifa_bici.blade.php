@component('mail::message')
<img src="https://contabilizalo.dev/images/banner_promo_renta_naturales_seminario_email.png" />
<br>
# Hola, {{ strtoupper($suscriber->name) }}. <a href="https://contabilizalo.com" target="_blank">ConTabilizalo.com</a> te trae:



<h1 style="text-align: center; color:#009450;">Liquidador de renta personas naturales + Seminario virtual de actualización</h1>

Liquidar la renta para personas naturales nunca fue tan sencillo.<br>

En ConTabilizalo.com te ayudamos, descarga ahora mismo la herramienta <strong style="color:blue;">PEOPLE TAX</strong>
y ahorra tiempo y dinero.

<strong>El tiempo se acaba!.</strong> El seminario de actualización se llevará a cabo el día 24 de Julio de 2020 a las 5pm.

<strong>Seminarista</strong>: William Dussán Salazar, especialista en Derecho Tributario, Fundador de www.consultorcontable.com.

@component('mail::panel')
@component('mail::button', ['url' => 'https://contabilizalo.com/promo/descargar-aplicativo-renta-personas-naturales', 'color' => 'green'])
DESCARGAR LIQUIDADOR DE RENTA >>
@endcomponent
@endcomponent


@component('mail::panel')
Saludos,<br>
# Grupo de - <a target="_blank" href="https://contabilizalo.com">{{ config('app.name') }}</a>
@endcomponent
@endcomponent
