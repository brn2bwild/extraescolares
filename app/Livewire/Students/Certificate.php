<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

use PDF;

use function Termwind\render;

class Certificate extends Component
{
	#[Validate(['required'], message: ['required' => 'Debes escribir un número de ficha o matrícula'])]
	public $search = null;

	public $student_data = null;

	public function searchData()
	{
		$this->student_data = null;

		$student = Student::with('activity')
			->with('activity.user')
			->with('career')
			->with('period')
			->where('validated', true)
			->where('inscription_code', $this->search)
			->orWhere('university_enrollment', $this->search)
			->orWhere('validation_token', $this->search)
			->first();

		if (isset($student)) {
			$this->student_data = $student->toArray();
			$this->student_data['points'] = $student->getEvaluationPoints();
			$this->student_data['performance'] = $student->getEvaluationPerformance();
			$date = Carbon::createFromDate($student->validated_at);
			$this->student_data['validated_at'] = $date->isoFormat('D MMMM YYYY');
		}
	}

	public function downloadPdf()
	{
		view()->share('student', $this->student_data);
		$pdf = PDF::loadView('pdf.certificate', $this->student_data)
			->setPaper('letter', 'portrait')
			->output();

		return response()->streamDownload(
			fn () => print($pdf),
			strtolower(str_replace(" ", "_", $this->student_data['name'])) . "_certificate.pdf"
		);
	}

	public function render()
	{
		return view('livewire.students.certificate')
			->extends('components.layouts.students')
			->section('content')
			->title('Consulta de certificados');
	}
}
