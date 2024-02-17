<?php

namespace App\Livewire\Students;

use App\Models\Activity;
use App\Models\Career;
use App\Models\Period;
use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
	#[Validate(['required'], message: ['required' => 'Este campo es requerido'])]
	#[Validate(['unique:students,key'], message: ['unique' => 'La matrícula ya ha sido registrada'])]
	public $key;

	#[Validate(['required'], message: ['required' => 'Este campo es requerido'])]
	public $name;

	#[Validate(['required'], message: ['required' => 'Este campo es requerido'])]
	public $career;

	#[Validate(['required'], message: ['required' => 'Este campo es requerido'])]
	public $activity;

	#[Validate(['required'], message: ['required' => 'Este campo es requerido'])]
	public $period;

	public $careers;
	public $activities;
	public $periods;

	public function mount()
	{
		$this->careers = Career::get();
		$this->activities = Activity::get();
		$this->periods = Period::orderByDesc('id')->get();
	}

	public function saveData()
	{
		$this->validate();

		Student::create([
			'key' => $this->key,
			'name'  => $this->name,
			'career_id' => $this->career,
			'activity_id' => $this->activity,
			'period_id' => $this->period,
		]);

		$this->clearData();
	}

	public function clearData()
	{
		$this->key = null;
		$this->name = null;
		$this->career = null;
		$this->activity = null;
		$this->period = null;
	}

	public function render()
	{
		return view('livewire.students.register')
			->extends('components.layouts.students')
			->section('content')
			->title('Registro extraescolares');
	}
}
