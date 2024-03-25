<?php

namespace App\Filament\Admin\Resources\StudentResource\Pages;

use App\Enums\Genders;
use App\Filament\Admin\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditStudent extends EditRecord
{
	protected static string $resource = StudentResource::class;

	protected function handleRecordUpdate(Model $record, array $data): Model
	{
		// $data['gender'] = Genders::setGender($data['gender']);
		// dd($data['gender']);
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
