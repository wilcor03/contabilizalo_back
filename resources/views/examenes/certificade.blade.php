<!DOCTYPE html>
<html>
<head>	
	<title></title>
	<style type="text/css">
		#developers{
			margin: 0 auto 0;
		}

		#developers div{
			float:left;
			width: 30%;			
		}

		body{
			margin:	0;
			padding: 0;
		}
	</style>
</head>
<body>
	<div id="main" style="text-align: center; margin:0 auto 0; padding: 0;">	
		<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div style="max-width: 600px; margin: 0 auto 0">
			<h1 style="color:#100e88;">CERTIFICADO DE ASISTENCIA Y CULMINACIÓN</h1>
		</div>
		<br>
		<h3 style="color:#d05f27;">Este reconocimiento se concede a:</h3>
		<br>		
		<h2>{{ Str::upper($student->name) }}</h2>
		<div style="max-width: 600px; margin: 0 auto 0">
			<p>Por demostrar compromiso y asistencia durante los 4 días de capacitación introductoria a EXCEL, NÓMINA Y MACROS online. Que tuvo lugar entre los días 27 de Marzo de 2021 y el 03 de Abril de 2021 de manera virtual y en vivo.</p>	
		</div>		
		<br>
		<br>
		<div id="developers" style="max-width: 600px;">
			<div>
				<img style="position: relative; right: 124px;" src="https://contabilizalo.com/logocontabilizalo-300x82.png" />				
				Generado el: {{ Carbon\Carbon::now() }}
			</div>			
			<div>
				<img style="    margin-left: 105px;
"width="80" height="80" src="{{ $qrUri }}">
			</div>
			<div>
				
			</div>
		</div>
	</div>
</body>
</html>