<?php

namespace App\Livewire\Students;

use Livewire\Component;

class Register extends Component
{
	public $count = 1;

	public function increment()
	{
		$this->count++;
	}

	public function decrement()
	{
		$this->count--;
	}

	public function render()
	{
		return view('livewire.students.register')
			->extends('components.layouts.students')
			->section('content')
			->title('Registro extraescolares');
	}
}
