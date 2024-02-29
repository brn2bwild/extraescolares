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
			font-family: Arial, Helvetica, sans-serif;
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
			left: 51.5%;
			transform: translate(-50%, -50%);
			text-align: justify;
			text-justify: auto;
			line-height: 150%;
		}

		.teacher {
			position: absolute;
			font-size: 0.8rem;
			width: 210px;
			top: 73%;
			left: 29%;
			transform: translate(-50%, -50%);
			text-align: center;
		}

		.content {
			text-align: left;
			z-index: 1;
		}

		.token {
			position: absolute;
			z-index: 1;
			font-size: 0.8rem;
			bottom: 125px;
			right: 80px;
			transform: translate(0%, -50%);
		}
	</style>
</head>

<body>
	<img class="image-background" src="{{ storage_path('certificate/template.jpg') }}" alt="template">
	{{-- <h2>{{ $student['name'] }}</h2> --}}
	<p class="text">
		El que suscribe <strong>{{ $student['activity']['teacher']['name'] }}</strong>, por este medio se permite hacer de
		su
		conocimiento que el (la)
		estudiante <strong>{{ $student['name'] }}</strong>, con número de control <strong>{{ $student['key'] }}</strong> de
		la
		carrera de <strong>{{ $student['career']['name'] }}</strong>, ha cumplido su actividad Cultural y/o Deportiva de
		<strong>{{ $student['activity']['name'] }}</strong> con un nivel de desempeño <strong>{{ $student['performance']
			}}</strong> y un valor numérico de <strong>{{
			$student['points'] }}</strong> durante el
		periodo escolar <strong>{{ $student['period']['lapse'] }}</strong>
		con un valor curricular de 2 créditos.<br><br>
		Se extiende la presente en la ciudad de Teapa Tabasco; con fecha de <strong>{{ $student['validated_at'] }}</strong>.
	</p>
	<span class="teacher">{{ $student['activity']['teacher']['name'] }}</span>
	<p class="token">{{ $student['validation_token'] }}</p>
</body>

</html>