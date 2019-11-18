@component('mail::message')
<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" />
<br>
# Hola, {{ $suscriber->name }}

Mi nombre es <strong>Wilmer Cordoba</strong> de <strong>ConTabilizalo.com</strong>
y actualmente me encuentro trabajando en un proyecto que busca impulsar las cosas buenas de nuestro país <strong>(Colombia)</strong> y sobretodo el turismo.
<br>

@component('mail::panel')
Es por eso que requiero de tu apoyo, y basta con que te suscribas a mi nuevo canal en YouTube: <strong>"DeTRIPS"</strong> y me sigas en redes sociales.
@endcomponent

De antemano muchisimas gracias por tu apoyo y te espero en <strong><a href="https://detrips.com" target="_blank">detrips.com</a>
</strong>

@component('mail::button', ['url' => 'https://www.youtube.com/channel/UCYDI-2dkFzrmG6oHR7a4r_Q?sub_confirmation=1', 'color' => 'red'])
Suscribirte a mi nuevo canal >>
@endcomponent

@component('mail::button', ['url' => 'https://www.instagram.com/detripsapp/', 'color' => 'green'])
 Instagram: @DetripsApp
@endcomponent

@component('mail::button', ['url' => 'https://www.facebook.com/Detripsapp/', 'color' => 'blue'])
 Facebook: @DetripsApp
@endcomponent

@component('mail::panel')
Que todo te salga muy bien hoy y siempre,<br>
# Wilmer C. - <a target="_blank" href="https://contabilizalo.com">{{ config('app.name') }}</a>
@endcomponent
@endcomponent
