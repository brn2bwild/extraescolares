<?php

namespace App\Filament\Admin\Resources\AdministratorResource\Pages;

use App\Filament\Admin\Resources\AdministratorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class CreateAdministrator extends CreateRecord
{
	protected static string $resource = AdministratorResource::class;

	protected function handleRecordCreation(array $data): Model
	{
		// $role = Role::findById($data['role']);

		$record = new ($this->getModel())($data);

		$record->save();

		$record->assignRole('admin');

		return $record;
		// return static::getModel()::create($data);
	}
}
