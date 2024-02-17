<div class="w-1/3 bg-blue-950 p-10 rounded-xl mt-24 flex flex-col justify-center items-center">
	<h2 class="text-neutral-50 text-2xl font-bold">DATOS DEL ALUMNO</h2>

	<!-- Formulario -->
	<form wire:submit.prevent="saveData" class="mt-4 w-full">
		<div class="mb-2 w-full">
			<label for="key" class="text-neutral-50 block">Matrícula</label>
			<input wire:model="key" type="text" name="key"
				class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none">
			@error('key') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
		</div>
		<div class="mb-2 w-full">
			<label for="name" class="text-neutral-50 block">Nombre</label>
			<input wire:model="name" type="text" name="name"
				class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none">
			@error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
		</div>
		<div class="mb-2 w-full">
			<label for="career" class="text-neutral-50 block">Carrera</label>
			<select wire:model="career" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none" required>
				<option value="">Seleccione una opción</option>
				@foreach ($careers as $career)
				<option value="{{ $career->id }}">{{ $career->name }}</option>
				@endforeach
			</select>
			@error('career') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
		</div>
		<div class="mb-2 w-full">
			<label for="activity" class="text-neutral-50 block">Extraescolar</label>
			<select wire:model="activity" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none" required>
				<option value="">Seleccione una opción</option>
				@foreach ($activities as $activity)
				<option value="{{ $activity->id }}">{{ $activity->name }}</option>
				@endforeach
			</select>
			@error('activity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
		</div>
		<div class="mb-2 w-full">
			<label for="period" class="text-neutral-50 block">Periodo</label>
			<select wire:model="period" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none" required>
				<option value="">Seleccione una opción</option>
				@foreach ($periods as $period)
				<option value="{{ $period->id }}">{{ $period->lapse }}</option>
				@endforeach
			</select>
			@error('period') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
		</div>
		<div class="w-full flex justify-center mt-8">
			<button type="submit" class="bg-neutral-50 rounded-xl px-4 py-2 font-medium text-blue-950">Registrarse</button>
		</div>
	</form>
</div>