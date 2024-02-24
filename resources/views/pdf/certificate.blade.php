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
		El que suscribe <strong>{{ $data['activity']['teacher']['name'] }}</strong>, por este medio se permite hacer de su
		conocimiento que el (la)
		estudiante <strong>{{ $data['name'] }}</strong>, con número de control <strong>{{ $data['key'] }}</strong> de la
		carrera de <strong>{{ $data['career']['name'] }}</strong>, ha cumplido su actividad Cultural y/o Deportiva de
		<strong>{{ $data['activity']['name'] }}</strong> con el nivel de desempeño Bueno y un valor numérico de 2 durante el
		periodo escolar <strong>{{ $data['period']['lapse'] }}</strong>
		con un valor curricular de 2 créditos.<br><br>
		Se extiende la presente en la ciudad de Teapa Tabasco; con fecha de <strong>{{ $data['validated_at'] }}</strong>.
	</p>
	<span class="teacher">{{ $data['activity']['teacher']['name'] }}</span>
	<p class="token">{{ $data['validation_token'] }}</p>
</body>

</html>