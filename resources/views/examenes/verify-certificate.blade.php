@extends('layouts.Blog.cerulean_bwacth')

@section('content')
	<h1>VERIFICACIÓN DE CERTIFICACIÓN</h1>
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

<div class="alert alert-info">
	<p>
		Responsable: <strong>WILMER CORDOBA</strong>
	</p>
	<small>CEO ConTabilizalo</small>
</div>
	
@endsection