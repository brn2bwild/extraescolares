<div>
	<form method="post" action="/formulario">
		@csrf

		<label for="matricula">Matrícula:</label>
		<input type="text" name="matricula" required>

		<button type="submit">Obtener constancia</button>
	</form>
</div>