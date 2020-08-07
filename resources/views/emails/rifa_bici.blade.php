@component('mail::message')
<img src="https://contabilizalo.com/images/macros_y_no_morir_en_el_intento.png" />
<br>
# Hola, {{ strtoupper($suscriber->name) }}. <a href="https://contabilizalo.com" target="_blank">ConTabilizalo.com</a> quiere que te capacites en:



<h1 style="text-align: center; color:orange;">Video Curso de Macros y VBA Excel</h1>
<h3 style="text-align: center; color:#4bc74b;"><i>Aprende a programar y automatizar procesos en Excel sin morir en el intento.</i></h3>

Excel es imprescindible en la gestión empresarial, por lo que aprender a manejar de manera óptima esta herramienta te dará muchas mas oportunidades.<br>

Gracias a <strong>Excel, las Macros y VBA</strong> es posible automatizar en un alto grado todos esos reportes repetitivos y complejos que debemos elaborar en nuestro diario trasegar.

<strong>El tiempo se acaba!.</strong> Suscribete ahora mismo!.

@component('mail::panel')
@component('mail::button', ['url' => 'https://contabilizalo.com/promo/curso-excel-macros-vba', 'color' => 'green'])
VER DETALLES DEL CURSO >>
@endcomponent
@endcomponent


@component('mail::panel')
Saludos,<br>
# Grupo de - <a target="_blank" href="https://contabilizalo.com">{{ config('app.name') }}</a>
@endcomponent
@endcomponent
