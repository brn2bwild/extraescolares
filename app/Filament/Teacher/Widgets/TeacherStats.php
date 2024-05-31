<?php

namespace App\Filament\Teacher\Widgets;

use App\Models\Activity;
use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class TeacherStats extends BaseWidget
{
	protected function getStats(): array
	{
		return [
			Stat::make('Estudiantes inscritos', Student::where(
				'activity_id',
				Activity::where('user_id', Auth::user()->id)->first()->id
			)->get()->count()),
		];
	}
}
