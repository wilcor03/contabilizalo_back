<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Examen Soy Contabilizers - Curso Gratuito Nómina + Excel + Macros</title>
</head>
<body>
<div class="container">	
<main role="main">
	<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Resultados de tu prueba:</h1>
      <div class="text-center">
        @if($correctAnswers > 7)
        <div class="alert alert-success">
          <h1>{{ $correctAnswers }} / 12</h1>
          <p>EXCELENTE, HAS APROBADO!</p>
          <br>
          <a href="{{ route('exam.show', ['tt' => $exam->temp_token]) }}" class="btn btn-info">Descargar certificado</a>
        </div>
        @else
          <div class="alert alert-danger">
            <h1>{{ $correctAnswers }} / 12</h1>
            <p>REPROBADO!</p>
            <p>Gracias por haber hecho parte de nuestras clases gratuitas. Y recuerda que aún puedes ser un MASTER</p>
          </div>     
        @endif            

      </div>
      
    </div><!-- end container -->     
  </section>
  <section>
    <div class="text-center">
    <h1>Sigue Superandote!!</h1><br>
    <h3 style="max-width: 500px; margin: 0 auto 0;" class="text-info">Conviertete en un <span class="text-danger">MASTER</span> EN EXCEL + VBA + POWER BI</h3><br>
    </div>
      <p>Nuestro curso MASTER, ya se encuentra disponible y profundizaremos en:</p>
      <ul>
        <li><strong>Excel</strong> en todos sus niveles</li>
        <li><strong>Macros + VBA</strong> Construye aplicaciones complejas con Excel y macros avanzados.</li>
        <li><strong>POWER BI</strong> Aprenderás a manejar altos volumenes de información, compatirla con el mundo y presentar los mejornes informes y reportes</li>
      </ul>
      <br>
      <div class="text-center">
        <a href="{{ route('promo.excel-vba', ['m' => 1]) }}" class="btn btn-danger btn-lg">QUIERO SER UN MASTER >></a>
      </div>
  </section>
</main>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>