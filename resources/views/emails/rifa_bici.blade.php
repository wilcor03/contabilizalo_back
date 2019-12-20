@component('mail::message')
<img src="https://detrips.com/img/rifa_bici.png" />
<br>
# Hola, {{ strtoupper($suscriber->name) }}

Soy <strong>Wilmer Cordoba</strong> de <strong>ConTabilizalo.com</strong>
y por ser navidad voy a rifar una <strong>SUPER BICICLETA DTFLY MAX</strong> en Aluminio Rin 27.5" entre los suscriptores de mi nuevo canal. Es totalmente gratis, asi que ve a este enlace y enterate de como inscribirte: <strong><i>(Mira el Video para que obtengas mas oportunidades de ganar).</i></strong><br>

@component('mail::panel')
@component('mail::button', ['url' => 'https://detrips.com/gana-premios', 'color' => 'green'])
INSCRIBIRME EN LA RIFA >>
@endcomponent
@endcomponent


@component('mail::panel')
Saludossss,<br>
# Wilmer C. - <a target="_blank" href="https://contabilizalo.com">{{ config('app.name') }}</a>
@endcomponent
@endcomponent
