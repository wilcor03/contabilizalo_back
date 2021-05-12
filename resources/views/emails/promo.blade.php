@component('mail::message')
<img src="https://contabilizalo.com/images/email/banner_vba_pro_luz_conta.png" />
<br>
@component('mail::panel')
# Hola, {{ strtoupper($suscriber->name) }}
<p style="text-align: center;">
En ConTabilizalo.com, hemos puesto todo nuestro esfuerzo en crear un curso digital <strong><i><a title="excel contabilizalo" href="https://certificate.contabilizalo.com">EXCEL VBA PRO</a></i></strong> que te permita adquirir las herramientas necesarias para que puedas plasmar tus ideas gracias a <i><strong>Excel y sus poderosas macros.</strong></i>
</p>
@endcomponent
<br>
<div>
	<p>
		Complementa tus conocimientos con las herramientas tecnológicas que nos ofrece Microsoft Excel y VBA.
	</p>
</div>

@component('mail::button', ['url' => 'https://certificate.contabilizalo.com', 'color' => 'green'])
Quiero mas Información
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
