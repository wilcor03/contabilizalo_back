@component('mail::message')
<img src="https://contabilizalo.com/images/plantilla_para_email_cursos.jpg" />
<br>
# Hola, {{ strtoupper($suscriber->name) }}
Formate con nosotros en los siguientes programas <i style="color:red;">con énfasis en <strong>INGLES</strong></i>:
<p style="text-align: center; color:#ccc;">(Certificados por el ministerio de educación)</p>
<h2 style="text-align: center; color:orange;">INGLES</h2>
<ul>
	<li>Ingles Conversacional</li>	
	<li>Bachillerato Académico</li>
</ul>

<h2 style="text-align: center; color:orange;">PROGRAMAS TÉCNICOS LABORALES</h2>

<ul>
	<li>Técnico Laboral Auxiliar Administrativo.</li>
	<li>Técnico Laboral Auxiliar Contable.</li>
	<li>Técnico Laboral Primera Infancia</li>
	<li>Técnico Laboral en Seguridad y Salud en el Trabajo</li>
	<li>Técnico Laboral en Mercadeo y Ventas</li>
	<li>Técnico Laboral en Sistemas</li>	
</ul>


<p style="color:green;">Todos los programas incluyen <strong><i>Nivel A1 de Ingles</i></strong> y <strong><i>Básico de Excel</i></strong>.</p>
<p style="color:red; text-align: center;"><strong>Programas certificados por el ministerio de educación</strong></p>

@component('mail::panel')
@component('mail::button', ['url' => url('cursos/tecnicos#startpage'), 'color' => 'red'])
SOLICITAR MAS INFORMACIÓN >>
@endcomponent
@endcomponent


@component('mail::panel')
Te esperamos,<br>
# Grupo de - <a target="_blank" href="https://contabilizalo.com">{{ config('app.name') }}</a>
@endcomponent
@endcomponent
