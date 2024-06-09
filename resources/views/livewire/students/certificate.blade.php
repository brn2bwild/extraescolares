<div class="containerCertificate ">
    <div class="card w-96 bg-secondary shadow-xl rounded-xl">
        <div class="card-body">
            <h2 class="card-title text-neutral-50 font-bold">CONSULTAR CONSTANCIA</h2>
            <form wire:submit.prevent="searchData" class="w-full">
                <label for="search" class="textLabel">Matrícula:</label>
                <div class="mt-4 w-full">
                    <input wire:model="search" type="text" name="search" class="label" required>
                    @error('search') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </input>
                </div>
                <div class="w-full flex justify-center mt-8">
                    <button type="submit" class="btn-primary flex">
                        <img wire:loading src="/storage/images/spinner.svg" alt="spinner" class="h-6 mr-2">
                        Consultar
                    </button>
                </div>
            </form>
        </div>
    </div>



    <x-modal wire:model="modal" title="Constancias Extraescolares" subtitle="" separator>
        @if ($search !== null && $student_data === null)
        <h1 class="text-neutral-950">
            No se encontró ninguna coincidencia con la matrícula <span class="uppercase font-medium">{{ $search }}</span>
        </h1>
        <x-slot:actions>
            <x-button label="Aceptar" class="btn-secondary" @click="$wire.modal = false" />
        </x-slot:actions>
        @endif
        @if( $search !== null && $student_data !== null)
        <span>
            Nombre: <strong>{{ $student_data['name'] }}</strong><br>
            Actividad: <strong>{{ $student_data['activity']['name'] }}</strong>
        </span>
        <x-slot:actions>
            <x-button label="Cancelar" @click="$wire.modal = false" />
            <x-button label="Descargar" class="btn-secondary" wire:click="downloadPdf()" />
        </x-slot:actions>
        @endif
    </x-modal>

</div>