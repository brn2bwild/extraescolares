<?php

namespace App\Filament\Admin\Resources\StudentResource\Pages;

use App\Enums\Genders;
use App\Filament\Admin\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateStudent extends CreateRecord
{
	protected static string $resource = StudentResource::class;

	protected function getRedirectUrl(): string
	{
		return $this->previousUrl ?? $this->getResource()::getUrl('index');
	}

	protected function handleRecordCreation(array $data): Model
	{
		// $data['gender'] = Genders::setGender($data['gender']);
		return static::getModel()::create($data);
	}
}
