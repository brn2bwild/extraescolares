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
				<button type="submit" class="bg-neutral-50 rounded-xl px-4 py-2 font-medium text-blue-950">Consultar</button>
			</div>
		</form>
	</div>
	@isset($student)
	<button wire:transition wire:click="downloadPdf()" class="mt-20 rounded-xl border-2 border-blue-950 p-6">
		<h1>
			{{ $student['name'] }} - {{ $student['activity']['name'] }} - {{ $student['validation_token'] }}
		</h1>
	</button>
	@endisset

	@if ($search !== null and $student === null)
	<h1 wire:transition class="mt-20 rounded-xl border-2 border-blue-950 p-6">
		No se encontró ninguna constancia con la matricula {{ $search }}
	</h1>
	@endif
</div>