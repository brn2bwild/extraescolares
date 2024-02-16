@extends('components.layouts.app')

@section('title', 'Home')

@section('contenido')
<div class="grid grid-cols-1 sm:grid-cols-2 min-h-screen">
	<div class="hidden sm:flex justify-center items-center h-full sm:col-span-1">
		<img src="storage/images/tecnm_azul.png" alt="logo_tecnm">
	</div>
	<div class="flex flex-col justify-center items-center h-full col-span-1 px-4">
		<h1 class="text-8xl text-blue-950 font-bold">Departamento de difusión y concertación</h1>
		<div class="flex justify-evenly w-2/3 mt-12">
			<a wire:navigate rel="stylesheet" href="/students/register"
				class="rounded-xl border-blue-950 border-2 px-10 py-2">Registrarse</a>
			<a wire:navigate rel="stylesheet" href="/students/certificate"
				class="rounded-xl bg-blue-950 px-10 py-2 text-neutral-50">Constancias</a>
		</div>
	</div>
</div>
@endsection