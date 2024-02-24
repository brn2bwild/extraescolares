<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Grade extends Component
{

    public function searchDatas()
	{
		$this->student = Student::with('activity')
			->with('activity.teacher')
			->with('period')
			->where('validated', true)
			->where('key', $this->search)
			->orWhere('validation_token', $this->search)
			->first();
	}

    public function downloadPerformance($data)
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
