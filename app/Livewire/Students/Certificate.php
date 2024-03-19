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
	#[Validate(['required'], message: ['required' => 'Este campo es requerido'])]
	public $search = null;

	public $student = null;

	public function searchData()
	{
		$student = Student::with('activity')
			->with('activity.user')
			->with('career')
			->with('period')
			->where('validated', true)
			->where('key', $this->search)
			->orWhere('validation_token', $this->search)
			->first();

			if(isset($student)){
				$this->student = $student->toArray();
				$this->student['points'] = $student->getEvaluationPoints();
				$this->student['performance'] = $student->getEvaluationPerformance();
				$date = Carbon::createFromDate($this->student['validated_at']);
				$this->student['validated_at'] = $date->isoFormat('D MMMM YYYY');
			}
	}

	public function downloadPdf()
	{
		view()->share('student', $this->student);
		$pdf = PDF::loadView('pdf.certificate', $this->student)
			->setPaper('letter', 'portrait')
			->output();

		return response()->streamDownload(
			fn () => print($pdf),
			strtolower(str_replace(" ", "_", $this->student['name'])) . "_certificate.pdf"
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
