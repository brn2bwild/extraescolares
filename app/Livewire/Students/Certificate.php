<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Certificate extends Component
{
	#[Validate(['required'], message: ['required' => 'Este campo es requerido'])]
	public $search = null;

	public $student = null;

	public function searchData()
	{
		$this->student = Student::with('activity')
			->where('key', $this->search)
			->orWhere('validation_token', $this->search)
			->first();
	}

	public function downloadPdf($data)
	{
		dd($data);
	}

	public function render()
	{
		return view('livewire.students.certificate')
			->extends('components.layouts.students')
			->section('content')
			->title('Consulta de certificados');
	}
}
