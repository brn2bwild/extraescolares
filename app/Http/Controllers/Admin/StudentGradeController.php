<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use PDF;

class StudentGradeController extends Controller
{
	public function __invoke(Request $request, Student $student)
	{
		view()->share('data', $student->toArray());

		$pdf = PDF::loadView('pdf.performance', $student->toArray())
			->setPaper('letter', 'portrait');

		return $pdf->download(strtolower(str_replace(" ", "_", $student->name)) . '_performance.pdf');
	}
}
