@component('mail::message')
<img src="https://contabilizalo.com/images/email/email_yo_cabecera.png" />
<br>
@component('mail::panel')
# Hola, {{ strtoupper($suscriber->name) }}
<p style="text-align: center;">
Te invito para que revices el último video de nuestro canal de YouTube <i><strong>Nueva Función de Excel UNIRCADENAS - Reemplaza concatenar</strong></i>
</p>
@endcomponent
<br>
<div>
	<div style="float:left; width: 50%; padding: 4px; border-right: 1px solid #ccc; background:#fffbea;">
		<img alt="funcion unir cadenas de Excel" style="width: 100%;" src="https://contabilizalo.com/images/email/email_varios.jpg" />
		<h3 style="text-align: center; margin-top: 5px; color:green;">
			<a style="text-decoration: none;" href="https://youtu.be/p3cVcbR2N_M">
				Nueva función UNIRCADENAS de Excel
			</a>
		</h3>
		<p>
			Video que puedes visualizar desde nuestro canal de <strong>YouTube (ConTabilizaloCom).</strong> Aprenderemos una nueva forma que habilitó Excel a la hora de concatenar las celdas.
		</p>

		@component('mail::button', ['url' => 'https://youtu.be/p3cVcbR2N_M', 'color' => 'green'])
		Ver	Video
		@endcomponent
	</div>
	<div style="float:left; width: 50%; padding: 4px;">
		<img alt="Excel VBA PRO contabilizalo" style="width: 100%;" src="https://contabilizalo.com/images/email/emai_mi_foto_y_texto_descriptivo_vba.jpg" />

		<h3 style="text-align: center; margin-top: 5px; color:green;">
			<a style="text-decoration: none;" href="https://contabilizalo.com/promo/curso-excel-macros-vba">
			Curso Excel PRO VBA
			</a>
		</h3>
		<p>
			Lleva tu conocimiento de Excel a otro nivel y construye no solo gráficos o fórmulas, sino complejos sistemas que podrán incluso ser comercializados si pones en práctica el contenido de este super curso.
		</p>

		@component('mail::button', ['url' => 'https://contabilizalo.com/promo/curso-excel-macros-vba', 'color' => 'green'])
		Más información
		@endcomponent
	</div>
</div>

<hr>

<div>
	<div style="float:left; width: 50%; padding: 4px; border-right: 1px solid #ccc;">
		<img alt="Web Scraping contabilizalo" style="width: 100%;" src="https://contabilizalo.com/images/email/email_web_scraping_1.png" />
		<h3 style="text-align: center; margin-top: 5px; color:green;">
			<a style="text-decoration: none;" href="https://www.udemy.com/course/draft/4010578/?referralCode=F72640190BBF1E5B7006">
			Curso Web Scraping con Excel y VBA
			</a>
		</h3>
		<p>
			¿Sabías que es posible conectar Excel con los sitios web y traer información desde ellos hacia las hojas de cálculo?. A esto se le llama web Scraping y es lo que aprenderemos a hacer en este curso. 
		</p>

		@component('mail::button', ['url' => 'https://www.udemy.com/course/draft/4010578/?referralCode=F72640190BBF1E5B7006', 'color' => 'green'])
		Más información
		@endcomponent
	</div>
	<div style="float:left; width: 50%; padding: 4px;">
		<img alt="excel práctico contabilizalo" style="width: 100%;" src="https://contabilizalo.com/images/email/email_excel_practico.jpg" />

		<h3 style="text-align: center; margin-top: 5px; color:green;">
			<a style="text-decoration: none;" href="https://contabilizalo.com/promo/curso-excel-macros-vba?c=1">
				Curso Excel Práctico de 0 a Profesional
			</a>
		</h3>
		<p>
			Una gran cantidad de empresas a lo largo del mundo utilizan Excel como su herramienta inicial de análisis de datos. Aprende de manera práctica lo que debes saber para dominar tan poderoso y global paquete.
		</p>

		@component('mail::button', ['url' => 'https://contabilizalo.com/promo/curso-excel-macros-vba?c=1', 'color' => 'green'])
		Más información
		@endcomponent
	</div>
</div>
<hr>
<div style="text-align: center;">
	<a href="https://www.facebook.com/ConTabilizaloCom" target="_blank">
		<img alt="facebook-contabilizalo" width="50" src="https://contabilizalo.com/images/email/facebook.png">
	</a>
	<br><br>
	<p>
		Adquiere las herramientas necesarias en EXCEL y el poder de las Macros. Queremos apoyarte en la consecución de herramientas que te permitan ser más competitivo en el campo laboral y en tus emprendimientos.
	</p>
	<hr>
	<a href="https://contabilizalo.com/cursos/certificados">Ver todos los cursos</a>
</div>
<hr>


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
