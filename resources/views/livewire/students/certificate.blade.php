<div class="w-full flex flex-col justify-center items-center">
	<div class="w-1/3 bg-blue-950 p-10 rounded-xl mt-24 flex flex-col justify-center items-center">
		<h1 class="text-neutral-50 uppercase font-bold">consultar constancia</h1>
		<form wire:submit.prevent="searchData" class="w-full">
			<div class="mt-4 w-full">
				<label for="search" class="text-neutral-50 block">Matrícula:</label>
				<input wire:model="search" type="text" name="search"
					class="block w-full px-4 py-2 rounded-lg ring-0 border-r-0 outline-none uppercase" required>
				@error('search') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
			</div>
			<div class="w-full flex justify-center mt-8">
				<button type="submit"
					class="bg-neutral-50 rounded-xl text-lg px-4 py-2 font-medium text-blue-950 flex justify-between items-center">
					<img wire:loading src="/storage/images/spinner.svg" alt="spinner" class="h-6 mr-2">
					Consultar
				</button>
			</div>
		</form>
	</div>



	<x-modal wire:model="modal" title="Constancias Extraescolares" subtitle="" separator>
		@if ($search !== null && $student_data === null)
		<h1 class="text-neutral-950">
			No se encontró ninguna coincidencia con la matrícula <span class="uppercase font-medium">{{ $search }}</span>
		</h1>
		<x-slot:actions>
			<x-button label="Aceptar" @click="$wire.modal = false" />
		</x-slot:actions>
		@endif
		@if( $search !== null && $student_data !== null)
		<span>
			Nombre: <strong>{{ $student_data['name'] }}</strong><br>
			Actividad: <strong>{{ $student_data['activity']['name'] }}</strong>
		</span>
		<x-slot:actions>
			<x-button label="Cancelar" @click="$wire.modal = false" />
			<x-button label="Descargar" class="btn-primary" wire:click="downloadPdf()" />
		</x-slot:actions>
		@endif
	</x-modal>

</div>