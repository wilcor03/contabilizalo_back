<div class="alert alert-success text-center" role="alert">
  <h4 class="alert-heading">Estamos por comenzar...!</h4>
  <p>Inicia la prueba, recuerda que cuentas con 40 minutos para resolverla</p>
  <hr>
  <p class="mb-0">Si al finalizar la prueba obtienes una calificación sobresaliente, podrás descargar tu certificado de manera automatica.</p>
  <h3>Exitos!!</h3>
</div>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div>
	{!! Form::open(['route' => ['exam.store', 'mode' => 'exam']]) !!}
	  <div class="form-group">
	    <label>01. Para que Excel nos permite realizar cualquier tipo de cálculo es necesario ingresar en nuestra celda el siguiente operador</label>	    
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p1" id="p1Op1" value="R1">
			  <label class="form-check-label" for="p1Op1">
			    a. * (Multiplicación)
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p1" id="p1Op2" value="R2">
			  <label class="form-check-label" for="p1Op2">
			    b. = (Igual)
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p1" id="p1Op3" value="R3">
			  <label class="form-check-label" for="p1Op3">
			    c. - (Resta)
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p1" id="p1Op4" value="R4">
			  <label class="form-check-label" for="p1Op4">
			    d. $ (moneda)
			  </label>
			</div>
	  </div>

	  <div class="form-group mt-4">
	    <label>02. Las partes básicas de una nómina son:</label>	    
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p2" id="p2Op1" value="R1">
			  <label class="form-check-label" for="p2Op1">
			    a. Total devengado - Deducciones - otros descuentos
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p2" id="p2Op2" value="R2">
			  <label class="form-check-label" for="p2Op2">
			    b. Total devengado - apropiaciones - descuentos de salud
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p2" id="p2Op3" value="R3">
			  <label class="form-check-label" for="p2Op3">
			    c. Total devengado - deducciones - apropiaciones
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p2" id="p2Op4" value="R4">
			  <label class="form-check-label" for="p2Op4">
			    d. Salario - salud - descuentos
			  </label>
			</div>
	  </div>

	  <div class="form-group mt-4">
	    <label>03. La manera correcta de calcular el TOTAL DEVENGADO en Excel es la siguiente:</label>	    
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p3" id="p3Op1" value="R1">
			  <label class="form-check-label" for="p3Op1">
			    a. Salario básico /  30 * días trabajados
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p3" id="p3Op2" value="R2">
			  <label class="form-check-label" for="p3Op2">
			    b. (salario básico / 30 ) * días trabajados
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p3" id="p3Op3" value="R3">
			  <label class="form-check-label" for="p3Op3">
			    c. a y b son correctas
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p3" id="p3Op4" value="R4">
			  <label class="form-check-label" for="p3Op4">
			    d. salario base / dias trabajados - descuentos
			  </label>
			</div>
	  </div>

	  <div class="form-group mt-4">
	    <label>04. De acuerdo a lo visto, la función que utilizamos para calcular de manera inteligente el Auxilio de Transporte fue:</label>	    
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p4" id="p4Op1" value="R1">
			  <label class="form-check-label" for="p4Op1">
			    a. Función REDONDEAR
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p4" id="p4Op2" value="R2">
			  <label class="form-check-label" for="p4Op2">
			    b. Función Auxilio Base / 30 * días trabajados
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p4" id="p4Op3" value="R3">
			  <label class="form-check-label" for="p4Op3">
			    c. No usamos ninguna función
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p4" id="p4Op4" value="R4">
			  <label class="form-check-label" for="p4Op4">
			    d. Función SI
			  </label>
			</div>
	  </div>

	  <div class="form-group mt-4">
	    <label>05. La manera correcta de redondear 125.935 a 126.000 es:</label>	    
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p5" id="p5Op1" value="R1">
			  <label class="form-check-label" for="p5Op1">
			    a. REDONDEAR(125.935; -1)
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p5" id="p5Op2" value="R2">
			  <label class="form-check-label" for="p5Op2">
			    b. REDONDEAR(125.935; -2)
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p5" id="p5Op3" value="R3">
			  <label class="form-check-label" for="p5Op3">
			    c. REDONDEAR(125.935; -3)
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p5" id="p5Op4" value="R4">
			  <label class="form-check-label" for="p5Op4">
			    d. REDONDEAR(125.935; -4)
			  </label>
			</div>
	  </div>

	  <div class="form-group mt-4">
	    <label>06. De acuerdo a nuestra nómina, el Auxilio de transporte se le debe pagar únicamente a los trabajadores que:</label>	    
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p6" id="p6Op1" value="R1">
			  <label class="form-check-label" for="p6Op1">
			    a. Ganen Menos de dos SMMLV
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p6" id="p6Op2" value="R2">
			  <label class="form-check-label" for="p6Op2">
			    b. Ganen Más de dos SMMLV
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p6" id="p6Op3" value="R3">
			  <label class="form-check-label" for="p6Op3">
			    c. Ganen en Dólares
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p6" id="p6Op4" value="R4">
			  <label class="form-check-label" for="p6Op4">
			    d. Las personas mas pobres del país
			  </label>
			</div>
	  </div>

	  <div class="form-group mt-4">
	    <label>07. Para liquidar una NOMINA, normalmente los meses se toman de la siguiente manera:</label>	    
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p7" id="p7Op1" value="R1">
			  <label class="form-check-label" for="p7Op1">
			    a. como si tuvieran 30 días todos
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p7" id="p7Op2" value="R2">
			  <label class="form-check-label" for="p7Op2">
			    b. como si todos fueran similares a febrero
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p7" id="p7Op3" value="R3">
			  <label class="form-check-label" for="p7Op3">
			    c. meses de 31 días
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p7" id="p7Op4" value="R4">
			  <label class="form-check-label" for="p7Op4">
			    d. fecha de ingreso - fecha final
			  </label>
			</div>
	  </div>

	  <div class="form-group mt-4">
	    <label>08. Una MACRO en excel puede nos puede servir para:</label>	    
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p8" id="p8Op1" value="R1">
			  <label class="form-check-label" for="p8Op1">
			    a. Automatizar procesos
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p8" id="p8Op2" value="R2">
			  <label class="form-check-label" for="p8Op2">
			    b. Guardar PDFs a partir de un botón
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p8" id="p8Op3" value="R3">
			  <label class="form-check-label" for="p8Op3">
			    c. Traer datos dinámicamente desde la WEB
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p8" id="p8Op4" value="R4">
			  <label class="form-check-label" for="p8Op4">
			    d. Todas las anteriores son correctas
			  </label>
			</div>
	  </div>


	  <div class="form-group mt-4">
	    <label>09. ¿Es posible multiplicar fechas en Excel?:</label>	    
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p9" id="p9Op1" value="R1">
			  <label class="form-check-label" for="p9Op1">
			    a. Si
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p9" id="p9Op2" value="R2">
			  <label class="form-check-label" for="p9Op2">
			    b. No
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p9" id="p9Op3" value="R3">
			  <label class="form-check-label" for="p9Op3">
			    c. posiblemente
			  </label>
			</div>			
	  </div>


	  <div class="form-group mt-4">
	    <label>10. Que nos arrojaría Excel si realizamos el siguiente cálculo en la celda A3, (8+8)*3:</label>	    
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p10" id="p10Op1" value="R1">
			  <label class="form-check-label" for="p10Op1">
			    a. 32
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p10" id="p10Op2" value="R2">
			  <label class="form-check-label" for="p10Op2">
			    b. 19
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p10" id="p10Op3" value="R3">
			  <label class="form-check-label" for="p10Op3">
			    c. 48
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p10" id="p10Op4" value="R4">
			  <label class="form-check-label" for="p10Op4">
			    d. 192
			  </label>
			</div>
	  </div>


	  <div class="form-group mt-4">
	    <label>11. ¿Es posible darle un nombre distinto a la celda C8 en excel y referirme a ella en mis Fórmulas?:</label>	    
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p11" id="p11Op1" value="R1">
			  <label class="form-check-label" for="p11Op1">
			    a. No
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p11" id="p11Op2" value="R2">
			  <label class="form-check-label" for="p11Op2">
			    b. Si
			  </label>
			</div>			
	  </div>

	  <div class="form-group mt-4">
	    <label>12. En una hoja de Excel, podemos asegurar que de acuerdo a la celda AB3:</label>
	    <div class="form-check">
			  <input required class="form-check-input" type="radio" name="p12" id="p12Op1" value="R1">
			  <label class="form-check-label" for="p12Op1">
			    a. A es la columna 3 es la fila
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p12" id="p12Op2" value="R2">
			  <label class="form-check-label" for="p12Op2">
			    b. AB son la fila y 3 es la columna
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p12" id="p12Op3" value="R3">
			  <label class="form-check-label" for="p12Op3">
			    c. 3 es la fila y B la columna
			  </label>
			</div>
			<div class="form-check">
			  <input required class="form-check-input" type="radio" name="p12" id="p12Op4" value="R4">
			  <label class="form-check-label" for="p12Op4">
			    d. AB es la columna y 3 es la fila
			  </label>
			</div>
	  </div>
	  <input type="hidden" name="temp_token" value="{{ $exam->temp_token }}">

	  <p>Si estas seguro de tus respuestas...</p>
	  <button class="btn btn-primary">Enviar mi prueba</button>
	</form>
</div>