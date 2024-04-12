<?php

namespace App\Filament\Teacher\Resources\StudentResource\Pages;

use App\Filament\Teacher\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditStudent extends EditRecord
{
	protected static string $resource = StudentResource::class;

	protected function getRedirectUrl(): string
	{
		return $this->previousUrl ?? $this->getResource()::getUrl('index');
	}

	protected function handleRecordUpdate(Model $record, array $data): Model
	{
		// Si el alumno no tiene matrícula la validación no se permite
		if ($data['university_enrollment'] === null) $data['validated'] = false;

		$record->update($data);

		return $record;
	}

	protected function getHeaderActions(): array
	{
		return [
			Actions\DeleteAction::make(),
		];
	}
}
