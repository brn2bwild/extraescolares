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

		.name {
			position: absolute;
			font-size: 0.9rem;
			width: 470px;
			top: 239px;
			left: 263px;
			/* transform: translate(-50%, -50%); */
		}

		.activity {
			position: absolute;
			font-size: 0.9rem;
			width: 410px;
			top: 258px;
			left: 323px;
			/* transform: translate(-50%, -50%); */
		}

		.period {
			position: absolute;
			font-size: 0.9rem;
			width: 470px;
			top: 275px;
			left: 263px;
			/* transform: translate(-50%, -50%); */
		}

		.observations {
			position: absolute;
			font-size: 0.9rem;
			width: 632px;
			top: 690px;
			left: 90px;
			/* transform: translate(-50%, -50%); */
		}

		.points {
			position: absolute;
			font-size: 0.9rem;
			width: 100px;
			top: 870px;
			left: 560px;
			/* transform: translate(-50%, -50%); */
		}

		.performance {
			position: absolute;
			font-size: 0.9rem;
			width: 160px;
			top: 893px;
			left: 560px;
			/* transform: translate(-50%, -50%); */
		}

		.first_criteria {
			position: absolute;
			font-size: 1.5rem;
			width: 50px;
			top: 380px;
		}

		.second_criteria {
			position: absolute;
			font-size: 1.5rem;
			width: 50px;
			top: 420px;
		}

		.third_criteria {
			position: absolute;
			font-size: 1.5rem;
			width: 50px;
			top: 455px;
		}

		.fourth_criteria {
			position: absolute;
			font-size: 1.5rem;
			width: 50px;
			top: 485px;
		}

		.fifth_criteria {
			position: absolute;
			font-size: 1.5rem;
			width: 50px;
			top: 535px;
		}

		.sixth_criteria {
			position: absolute;
			font-size: 1.5rem;
			width: 50px;
			top: 585px;
		}

		.seventh_criteria {
			position: absolute;
			font-size: 1.5rem;
			width: 50px;
			top: 635px;
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
	<img class="image-background" src="{{ storage_path('evaluation/template.jpg') }}" alt="template">
	<span class="name">{{ $data['name'] }}</span>
	<span class="activity">{{ $data['activity']['name'] }}</span>
	<span class="period">{{ $data['period']['lapse'] }}</span>
	<span class="first_criteria" style="left: {{ $data['first_criteria'] }}"><strong>X</strong></span>
	<span class="second_criteria" style="left: {{ $data['second_criteria'] }}"><strong>X</strong></span>
	<span class="third_criteria" style="left: {{ $data['third_criteria'] }}"><strong>X</strong></span>
	<span class="fourth_criteria" style="left: {{ $data['fourth_criteria'] }}"><strong>X</strong></span>
	<span class="fifth_criteria" style="left: {{ $data['fifth_criteria'] }}"><strong>X</strong></span>
	<span class="sixth_criteria" style="left: {{ $data['sixth_criteria'] }}"><strong>X</strong></span>
	<span class="seventh_criteria" style="left: {{ $data['seventh_criteria'] }}"><strong>X</strong></span>
	<p class="observations">{{ $data['observations'] }}</p>
	<span class="points">{{ $data['points'] }}</span>
	<span class="performance">{{ $data['performance'] }}</span>
	{{-- <p class="token">{{ $data['validation_token'] }}</p> --}}
</body>

</html>