<?php

namespace App\Filament\Teacher\Widgets;

use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TeacherStats extends BaseWidget
{
	protected function getStats(): array
	{
		return [
			Stat::make('Estudiantes inscritos', Student::get()->count()),
		];
	}
}
