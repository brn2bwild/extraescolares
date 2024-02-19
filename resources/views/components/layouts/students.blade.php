<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title ?? 'Page title' }}</title>
	@vite('resources/css/app.css')
	@livewireStyles
</head>

<body class="antialiased bg-neutral-50 min-h-screen flex flex-col items-center">
	<x-toast />
	<nav class="w-full flex justify-between bg-blue-950 p-4 items-center">
		<div>
			<img src="/storage/images/logo_tecnm_blanco.png" class=" h-16" alt="logo_tecnm">
		</div>
		<div class="flex gap-8">
			<a href="{{ route('home') }}" wire:navigate
				class="rounded-xl border-2 border-neutral-50 px-4 py-2 font-medium text-neutral-50">Inicio</a>
			<a href="{{ route('students.register') }}" wire:navigate
				class="rounded-xl bg-neutral-50 text-blue-950 px-4 py-2 font-medium">Registro</a>
			<a href="{{ route('students.certificate') }}" wire:navigate
				class="rounded-xl bg-neutral-50 text-blue-950 px-4 py-2 font-medium">Constancias</a>
		</div>
	</nav>
	@yield('content')
	@livewireScripts
</body>

</html>