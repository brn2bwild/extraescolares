<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

use PDF;

class Certificate extends Component
{
	#[Validate(['required'], message: ['required' => 'Este campo es requerido'])]
	public $search = null;

	public $student = null;

	public function searchData()
	{
		$this->student = Student::with('activity')
			->with('activity.teacher')
			->with('career')
			->with('period')
			->where('validated', true)
			->where('key', $this->search)
			->orWhere('validation_token', $this->search)
			->first();
	}

	public function downloadPdf($data)
	{
		$data['points'] = $this->student->getEvaluationPoints();
		$date = Carbon::createFromDate($this->student->validated_at);

		$data['validated_at'] = $date->isoFormat('D MMMM YYYY');

		$data['performance'] = $this->student->getEvaluationPerformance();

		view()->share('data', $data);
		$pdf = PDF::loadView('pdf.certificate', $data)
			->setPaper('letter', 'portrait')
			->output();

		return response()->streamDownload(
			fn () => print($pdf),
			strtolower(str_replace(" ", "_", $data['name'])) . "_certificate.pdf"
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
