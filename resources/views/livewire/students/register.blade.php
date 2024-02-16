<div class="w-1/3 bg-blue-950 p-8 rounded-xl mt-40 flex flex-col justify-center items-center">
	<h2 class="text-neutral-50 text-2xl font-bold">DATOS DEL ALUMNO</h2>

	<!-- Formulario -->
	<form wire:submit.prevent="save" class="mt-4 w-full">
		<div class="mb-2 w-full">
			<label for="key" class="text-neutral-50 block">Matrícula</label>
			<input type="text" name="key" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none" required>
		</div>
		<div class="mb-2 w-full">
			<label for="name" class="text-neutral-50 block">Nombre</label>
			<input type="text" name="name" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none" required>
		</div>
		<div class="mb-2 w-full">
			<label for="career" class="text-neutral-50 block">Carrera</label>
			<input type="text" name="career" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none"
				required>
		</div>
		<div class="mb-2 w-full">
			<label for="semester" class="text-neutral-50 block">Semestre</label>
			<input type="text" name="semester" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none"
				required>
		</div>
		<div class="mb-2 w-full">
			<label for="group" class="text-neutral-50 block">Grupo</label>
			<input type="text" name="group" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none" required>
		</div>
		<div class="mb-2 w-full">
			<label for="activity" class="text-neutral-50 block">Extra-Escolar</label>
			<input type="text" name="activity" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none"
				required>
		</div>
		<div class="w-full flex justify-center mt-8">
			<button type="submit" class="bg-neutral-50 rounded-xl px-4 py-2">Registrarse</button>
		</div>
	</form>
</div>