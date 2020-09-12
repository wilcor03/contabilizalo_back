@component('mail::message')
<img src="https://contabilizalo.com/logocontabilizalo-300x82.png" />
<br>
# {{ strtoupper($data->name) }}, desea tener mas información.

@if($data->cel)
<p><span style="color:orange;">Teléfono: </span>{{ $data->cel }}</p>
@endif

@if($data->email)
<p><span style="color:orange;">Email: </span>{{ $data->email }}</p>
@endif

@if($data->program)
<p><span style="color:orange;">Programa: </span>{{ $data->program }}</p>
@endif

@component('mail::panel')
Saludos,<br>
# Grupo de - <a target="_blank" href="https://contabilizalo.com">{{ config('app.name') }}</a>
@endcomponent
@endcomponent
