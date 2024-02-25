<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Certificado</title>
	<style>
		html {
			margin: 0px;
			padding: 0px;
		}

		.body {
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
			font-size: 1rem;
			background-color: black;
			display: flex;
			justify-content: center;
			align-items: center;
			width: 100%;
			min-height: 100vh;
		}

		.image-background {
			height: 100%;
			width: 100%;
			z-index: -1;
			position: absolute;
		}

		.text {
			position: absolute;
			font-size: 1rem;
			width: 80%;
			top: 38%;
			left: 52%;
			transform: translate(-50%, -50%);
		}

		.teacher {
			position: absolute;
			font-size: 0.8rem;
			width: 60%;
			top: 69%;
			left: 43%;
			transform: translate(-50%, -50%);
		}

		.content {
			text-align: left;
			z-index: 1;
		}

		.token {
			position: absolute;
			z-index: 1;
			font-size: 1rem;
			bottom: 0%;
			right: 3%;
			transform: translate(0%, -50%);
		}
	</style>
</head>

<body>
	<img class="image-background" src="{{ storage_path('certificate/template.jpg') }}" alt="template">
	{{-- <h2>{{ $data['name'] }}</h2> --}}
	<p class="text">
		Esto es una prueba
	</p>
	{{-- <span class="teacher">{{ $data['activity']['teacher']['name'] }}</span>
	<p class="token">{{ $data['validation_token'] }}</p> --}}
</body>

</html>