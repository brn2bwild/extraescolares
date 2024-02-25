<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use PDF;

class StudentGradeController extends Controller
{
	public function __invoke(Request $request, $id)
	{
		$student = Student::with('activity')
			->with('period')
			->findOrFail($id);

		$data = $student->toArray();
		$grades = json_decode($data['grades'], true);

		// insuficiente => 290
		// suficiente => 350
		// bueno => 410
		// notable => 460
		// excelente => 510
		$data['first_criteria'] = match(intval($grades['first_criteria'])){
			0 => 290,
			1 => 350,
			2 => 410,
			3 => 460,
			4 => 510,
		};

		$data['second_criteria'] = match(intval($grades['second_criteria'])){
			0 => 290,
			1 => 350,
			2 => 410,
			3 => 460,
			4 => 510,
		};

		$data['third_criteria'] = match(intval($grades['third_criteria'])){
			0 => 290,
			1 => 350,
			2 => 410,
			3 => 460,
			4 => 510,
		};

		$data['fourth_criteria'] = match(intval($grades['fourth_criteria'])){
			0 => 290,
			1 => 350,
			2 => 410,
			3 => 460,
			4 => 510,
		};

		$data['fifth_criteria'] = match(intval($grades['fifth_criteria'])){
			0 => 290,
			1 => 350,
			2 => 410,
			3 => 460,
			4 => 510,
		};

		$data['sixth_criteria'] = match(intval($grades['sixth_criteria'])){
			0 => 290,
			1 => 350,
			2 => 410,
			3 => 460,
			4 => 510,
		};

		$data['seventh_criteria'] = match(intval($grades['seventh_criteria'])){
			0 => 290,
			1 => 350,
			2 => 410,
			3 => 460,
			4 => 510,
		};

		$data['points'] = $student->getEvaluationPoints();
		$data['performance'] = $student->getEvaluationPerformance();

		view()->share('data', $data);

		$pdf = PDF::loadView('pdf.performance', $data)
			->setPaper('letter', 'portrait');

		return $pdf->download(strtolower(str_replace(" ", "_", $data['name'])) . '_performance.pdf');
	}
}
