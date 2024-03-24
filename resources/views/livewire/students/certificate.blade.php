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
					class="bg-neutral-50 rounded-xl px-4 py-2 font-medium text-blue-950 flex justify-between items-center">
					<img wire:loading src="/storage/images/spinner.svg" alt="spinner" class="h-6 mr-2">
					Consultar
				</button>
			</div>
		</form>
	</div>

	@if ($search !== null && $student_data === null)
	<h1 wire:transition class="mt-20 rounded-xl border-0 bg-blue-950 text-neutral-50 p-6">
		No se encontró ninguna coincidencia con <span class="uppercase font-medium">{{ $search }}</span>
	</h1>
	@endif
	@if( $search !== null && $student_data !== null)
	<button wire:transition wire:click="downloadPdf()" class="mt-20 rounded-xl border-0 bg-blue-950 text-neutral-50 p-6">
		<span>
			Descargar certificado | {{ $student_data['name'] }} - {{ $student_data['activity']['name'] }} - {{
			$student_data['validation_token'] }}
		</span>
	</button>
	@endif

</div>