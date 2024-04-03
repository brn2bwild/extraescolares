<div class="w-full sm:w-2/3 bg-blue-950 p-10 rounded-xl my-10 sm:mt-24 flex flex-col justify-center items-center">
	<h2 class="text-neutral-50 text-2xl font-bold uppercase">datos del alumno</h2>

	<!-- Formulario -->
	<form wire:submit.prevent="saveData" class="mt-4 w-full">
		<div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-8">
			<div class="col-span-1">
				<div class="mb-2 w-full">
					<label for="inscription_code" class="text-neutral-50 block">Número de ficha</label>
					<input wire:model="inscription_code" type="text" name="inscription_code"
						class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none" required>
					@error('inscription_code') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
				</div>
				<div class="mb-2 w-full">
					<label for="name" class="text-neutral-50 block">Nombre</label>
					<input wire:model="name" type="text" name="name"
						class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none" required>
					@error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
				</div>
				<div class="mb-2 w-full">
					<label for="gender" class="text-neutral-50 block">Género</label>
					<select wire:model="gender" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none" required>
						<option value="" class="text-neutral-600">Selecciona una opción</option>
						@foreach ($genders as $gender)
						<option value="{{ $gender->value }}">{{ $gender->label() }}</option>
						@endforeach
					</select>
					@error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
				</div>
				<div class="mb-2 w-full">
					<label for="career" class="text-neutral-50 block">Carrera</label>
					<select wire:model="career" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none" required>
						<option value="" class="text-neutral-600">Selecciona una opción</option>
						@foreach ($careers as $career)
						<option value="{{ $career['id'] }}">{{ $career['name'] }}</option>
						@endforeach
					</select>
					@error('career') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
				</div>
			</div>
			<div class="col-span-1">
				<div class="mb-2 w-full">
					<label for="period" class="text-neutral-50 block">Periodo</label>
					<div class="flex justify-between items-center">
						<select wire:change="searchPeriod" wire:model="period"
							class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none" required>
							<option value="" class="text-neutral-600">Selecciona una opción</option>
							@foreach ($periods as $period)
							<option value="{{ $period['id'] }}">{{ $period['lapse'] }}</option>
							@endforeach
						</select>
						<img wire:loading wire:target="searchPeriod" src="/storage/images/spinner.svg" alt="spinner"
							class="rounded-md h-8 bg-white">
					</div>
					@error('period') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
				</div>
				<div class="mb-2 w-full">
					<label for="activity" class="text-neutral-50 block">Extraescolar</label>
					<select wire:model="activity" class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none"
						required>
						<option value="" class="text-neutral-600">Selecciona una opción</option>
						@foreach ($activities as $activity)
						<option value="{{ $activity['id'] }}">{{ $activity['name'] }}</option>
						@endforeach
					</select>
					@error('activity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
				</div>
				<div class="mb-2 w-full">
					<label for="illnes" class="text-neutral-50 block">¿Padeces alguna enfermedad crónica o degenerativa?</label>
					<textarea wire:model="illnes" type="text" name="illnes"
						class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none resize-none placeholder-neutral-500"
						placeholder="En caso no padecer alguna enfermedad escribir ninguna" rows="4" cols="50" required></textarea>
					@error('illnes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
				</div>
			</div>
		</div>
		<div class="w-full flex justify-center mt-8">
			<button type="submit"
				class="bg-neutral-50 rounded-xl px-4 py-2 font-medium text-blue-950 flex items-center justify-between text-lg">
				<img wire:loading wire:target="saveData" class="h-4 mr-2" src="/storage/images/spinner.svg" alt="spinner">
				Registrarse
			</button>
		</div>
	</form>
</div>