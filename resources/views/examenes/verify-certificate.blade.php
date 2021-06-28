@extends('layouts.Blog.cerulean_bwacth')

@section('content')
	<h1>VERIFICACIÓN DE CERTIFICACIÓN</h1>
	@if(request()->has('tt'))
		<p class="text-muted">
			la persona: <strong>{{ Str::upper($student->name) }}</strong> reposa en nuestra base de datos como asistente efectivo a la capacitación virtual y en vivo impartida entre los días 27 de marzo de 2021 y el día 3 de Abril de 2021 de manera Gratuita.
		</p>
		<p>
			Esta capacitación se llevó a cabo durante aproximadamente 6 horas y se impartió a través de la modalidad de Webinar.
		</p>
		<p>
			La certificación impartida por <strong>ConTabilizalo</strong> da fé de que la persona:
			<ul>
				<li>Respondió un cuestionario de 12 preguntas relacionadas con los temas tratados y las aprobó satisfactoriamente.</li>
				<li>La persona asistió y/o se retroalimento del contenido impartido y publicado a través de la plataforma de Webinar, youtube y Facebook</li>
			</ul>
		</p>
	@endif

	@if(request()->has('wb') && !request()->has('day'))
		<p class="text-muted">
			la persona: <strong>{{ Str::upper($student->name) }}</strong> reposa en nuestra base de datos como asistente efectivo a la capacitación virtual durante el día 18 de mayo de 2021 de manera Gratuita.
		</p>
		<p>
			Esta capacitación se llevó a cabo durante aproximadamente 1 hora(s) y se impartió a través de la modalidad de Webinar.
		</p>
		<p>
			La certificación impartida por <strong>ConTabilizalo</strong> da fé de que la persona:
			<ul>				
				<li>La persona asistió y/o se retroalimento del contenido impartido y publicado a través de la plataforma de Webinar, youtube y Facebook</li>
			</ul>
		</p>
	@endif

	@if(request()->has('wb') && request()->day == '20210626')
		<p class="text-muted">
			la persona: <strong>{{ Str::upper($student->name) }}</strong> reposa en nuestra base de datos como asistente efectivo a la capacitación virtual durante el día 26 de junio de 2021 de manera Gratuita.
		</p>
		<p>
			Esta capacitación se llevó a cabo durante aproximadamente 1 hora(s) y se impartió a través de la modalidad de Webinar.
		</p>
		<p>
			La certificación impartida por <strong>ConTabilizalo</strong> da fé de que la persona:
			<ul>				
				<li>La persona asistió y/o se retroalimento del contenido impartido y publicado a través de la plataforma de Webinar, youtube y Facebook</li>
				<li><strong>Temas tratados:</strong> introducción a Excel, Power Query, Power Pivot y elaboración de Dashboard en Excel</li>
			</ul>
		</p>
	@endif

	@if(request()->has('wb') && request()->day == '20210628')
		<p class="text-muted">
			la persona: <strong>{{ Str::upper($student->name) }}</strong> reposa en nuestra base de datos como asistente efectivo a la capacitación virtual durante el día 28 de junio de 2021 de manera Gratuita.
		</p>
		<p>
			Esta capacitación se llevó a cabo durante aproximadamente 1 hora(s) y se impartió a través de la modalidad de Webinar.
		</p>
		<p>
			La certificación impartida por <strong>ConTabilizalo</strong> da fé de que la persona:
			<ul>				
				<li>La persona asistió y/o se retroalimento del contenido impartido y publicado a través de la plataforma de Webinar, youtube y Facebook</li>
				<li><strong>Temas tratados:</strong> introducción a Excel, macros y programación de formularios VBA con Excel.</li>
			</ul>
		</p>
	@endif

<div class="alert alert-info">
	<p>
		Responsable: <strong>WILMER CORDOBA</strong>
	</p>
	<small>CEO ConTabilizalo</small>
	<p><a href="https://contabilizalo.com">www.contabilizalo.com</a></p>
</div>
	
@endsection