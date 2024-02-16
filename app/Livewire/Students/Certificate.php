<?php

namespace App\Livewire\Students;

use Livewire\Component;

class Certificate extends Component
{
	public function render()
	{
		return view('livewire.students.certificate')
			->extends('components.layouts.students')
			->section('content')
			->title('Consulta de certificados');
	}
}
