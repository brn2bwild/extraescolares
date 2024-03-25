<?php

namespace App\Livewire\Students;

use App\Enums\Genders;
use App\Models\Activity;
use App\Models\Career;
use App\Models\Period;
use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Register extends Component
{
	use Toast;

	#[Validate(['required'], message: ['required' => 'Este campo es requerido'])]
	#[Validate(['regex:/^\d{14,16}$/'], message: ['regex' => 'El número de ficha no tiene el formato deseado'])]
	#[Validate(['unique:students,inscription_code'], message: ['unique' => 'El número de ficha ya ha sido registrado'])]
	public $inscription_code;

	#[Validate(['required'], message: ['required' => 'Debes proporcionar tu nombre'])]
	public $name;

	#[Validate(['required'], message: ['required' => 'Debes seleccionar una carrera'])]
	public $career;

	#[Validate(['required'], message: ['required' => 'Debes seleccionar una actividad'])]
	public $activity;

	#[Validate(['required'], message: ['required' => 'Debes seleccionar un periodo'])]
	public $period;

	#[Validate(['required'], message: ['required' => 'Debes especificar tu estado de salud'])]
	public $illnes;

	#[Validate(['required'], message: ['required' => 'Debes seleccionar un género'])]
	public $gender;

	public $careers;
	public $activities;
	public $periods;
	public $genders;

	public function mount()
	{
		$this->genders = Genders::cases();
		$this->careers = Career::get()->toArray();
		$this->activities = Activity::get()
			->filter(function ($activity) {
				if (Student::where('activity_id', $activity->id)->count() < $activity->capacity) return $activity;
			})
			->toArray();
		$this->periods = Period::orderByDesc('id')->get()->toArray();
	}

	public function saveData()
	{
		$this->validate();

		Student::create([
			'inscription_code' => $this->inscription_code,
			'name'  => $this->name,
			'gender' => $this->gender,
			'career_id' => $this->career,
			'activity_id' => $this->activity,
			'period_id' => $this->period,
			'illnes' => $this->illnes,
		]);

		$this->toast(
			type: 'success',
			title: 'Registro guardado',
			description: null,                  // optional (text)
			position: 'toast-bottom toast-end',    // optional (daisyUI classes)
			icon: 'o-check-circle',       // Optional (any icon)
			css: 'alert-success',                  // Optional (daisyUI classes)
			timeout: 3000,                      // optional (ms)
			redirectTo: null                    // optional (uri)
		);

		$this->clearData();
	}

	public function clearData()
	{
		$this->inscription_code = null;
		$this->name = null;
		$this->career = null;
		$this->activity = null;
		$this->period = null;
		$this->gender = null;
		$this->illnes = null;
	}

	public function render()
	{
		return view('livewire.students.register')
			->extends('components.layouts.students')
			->section('content')
			->title('Registro extraescolares');
	}
}
