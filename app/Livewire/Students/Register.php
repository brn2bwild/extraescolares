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
	#[Validate(['regex:/^\d{5,10}$/'], message: ['regex' => 'Debes introducir un número de ficha válido'])]
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
		$this->activities = [];
		$this->genders = Genders::cases();
		$this->careers = Career::get()->toArray();
		$this->periods = Period::orderByDesc('id')->orderBy('created_at', 'desc')->get()->toArray();
	}

	public function saveData()
	{
		$this->validate();

		if (Student::where('activity_id', $this->activity)->count() < Activity::where('id', $this->activity)->first()->capacity) {
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
		} else {
			$this->toast(
				type: 'warning',
				title: 'Error al registrarte',
				description: 'Al parecer no hay espacios disponibles para la actividad a la que te deseas inscribir',                  // optional (text)
				position: 'toast-bottom toast-end',    // optional (daisyUI classes)
				icon: 'c-exclamation-circle',       // Optional (any icon)
				css: 'alert-success',                  // Optional (daisyUI classes)
				timeout: 4000,                      // optional (ms)
				redirectTo: null                    // optional (uri)
			);
		}
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

	public function searchPeriod()
	{
		$this->activities = Activity::with('periods')
			->whereHas('periods', function ($query) {
				$query->where('period_id', $this->period);
			})
			->get()
			->filter(function ($activity) {
				if ((Student::where('activity_id', $activity->id)->count() < $activity->capacity)) return $activity;
			})
			->toArray();
	}

	public function render()
	{
		return view('livewire.students.register')
			->extends('components.layouts.students')
			->section('content')
			->title('Registro extraescolares');
	}
}
