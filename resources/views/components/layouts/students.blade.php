<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title ?? 'Page title' }}</title>

	<!-- Scripts -->
	@vite('resources/css/app.css')
	@livewireStyles
</head>

<body class="antialiased bg-neutral-50 min-h-screen flex flex-col items-center">
	<x-toast />

	<div class="navbar nav">
		<div class="flex-1">
			<img src="/storage/images/logo_tecnm_blanco.png" class=" h-16" alt="logo_tecnm">
		</div>
		<div class="flex-none">
			<ul class="menu menu-horizontal">
				<li><a href="{{ route('home') }}" class="navlink" wire:navigate>Inicio</a></li>
				<li><a href="{{ route('students.register') }}" class="navlink" wire:navigate>Registro</a></li>
				<li><a href="{{ route('students.certificate') }}" class="navlink" wire:navigate>Constancias</a></li>
			</ul>
		</div>
	</div>
	@yield('content')
	@livewireScripts
	@stack('scripts')


</body>

</html>