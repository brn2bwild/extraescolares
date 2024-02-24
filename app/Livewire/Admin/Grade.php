<?php

namespace App\Livewire\Admin;

use App\Models\Student;
use Livewire\Component;

class Grade extends Component
{
	public Student $student;

	public function mount($id)
	{
		$this->student = Student::with('activity')
			->with('activity.teacher')
			->with('period')
			->where('validated', true)
			->where('id', $id)
			->first();
	}

	public function downloadGrades($data)
	{
		view()->share('data', $data);
		$pdf = PDF::loadView('pdf.performance', $data)
			->setPaper('letter', 'portrait')
			->output();

		return response()->streamDownload(
			fn () => print($pdf),
			"performance.pdf"
		);
	}
	
	public function render()
	{
		return view('livewire.admin.grade');
	}
}
