<?php

namespace App\Filament\Admin\Resources\TeacherResource\Pages;

use App\Filament\Admin\Resources\TeacherResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class CreateTeacher extends CreateRecord
{
	protected static string $resource = TeacherResource::class;

	protected function handleRecordCreation(array $data): Model
	{
		// $role = Role::findById($data['role']);

		$record = new ($this->getModel())($data);

		$record->save();

		$record->assignRole('teacher');

		return $record;
		// return static::getModel()::create($data);
	}
}
