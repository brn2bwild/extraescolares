<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;
use PDF;

use function Termwind\render;

class Certificate extends Component
{
	use Toast;

	#[Validate(['required'], message: ['required' => 'Debes escribir un número de ficha o matrícula'])]
	public $search = null;

	public $student_data = null;

	public $modal = false;

	public function searchData()
	{
		$this->student_data = null;

		$student = Student::with('activity')
			->with('activity.user')
			->with('career')
			->with('period')
			->where('validated', true)
			->Where('university_enrollment', $this->search)
			->orWhere('validation_token', $this->search)
			->first();

		if (isset($student)) {
			$this->student_data = $student->toArray();
			$this->student_data['points'] = $student->getEvaluationPoints();
			$this->student_data['performance'] = $student->getEvaluationPerformance();
			$date = Carbon::createFromDate($student->validated_at);
			$this->student_data['validated_at'] = $date->isoFormat('D MMMM YYYY');
		}
		$this->modal = true;
	}

	public function downloadPdf()
	{
		$student = Student::findOrFail($this->student_data['id']);

		$this->modal = false;
		
		if ($student->certificate_downloaded === false) {
			// dd($this->student_data);
			view()->share('student', $this->student_data);
			$pdf = PDF::loadView('pdf.certificate', $this->student_data)
				->setPaper('letter', 'portrait')
				->output();

			$student->setCertificateDownloaded(true);

			return response()->streamDownload(
				fn () => print($pdf),
				strtolower(str_replace(" ", "_", $this->student_data['name'])) . "_certificate.pdf"
			);
		}

		$this->toast(
			type: 'warning',
			title: 'Descarga de constancia',
			description: 'La constancia ya ha sido descargada, para descargar una nueva solicitar en el área correspondiente',                  			// optional (text)
			position: 'toast-bottom toast-end',    	// optional (daisyUI classes)
			icon: 'o-x-circle',       					// Optional (any icon)
			css: 'alert-success',                  	// Optional (daisyUI classes)
			timeout: 3000,                      		// optional (ms)
			redirectTo: null                    		// optional (uri)
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
