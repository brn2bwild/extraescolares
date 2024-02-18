<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StudentResource extends Resource
{
	protected static ?string $model = Student::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	protected static ?string $modelLabel = 'Estudiante';

	protected static ?string $pluralModelLabel = 'Estudiantes';

	protected static ?int $navigationSort = 5;

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\Select::make('career_id')
					->relationship('career', 'name')
					->required()
					->label('Carrera'),
				Forms\Components\Select::make('activity_id')
					->relationship('activity', 'name')
					->required()
					->label('Actividad'),
				Forms\Components\Select::make('period_id')
					->relationship('period', 'lapse')
					->required()
					->label('Periodo'),
				Forms\Components\TextInput::make('key')
					->required()
					->maxLength(255)
					->label('Matrícula'),
				Forms\Components\TextInput::make('name')
					->required()
					->maxLength(255)
					->label('Nombre'),
				Forms\Components\Toggle::make('validated')
					->required()
					->label('Validado'),
				Forms\Components\TextInput::make('validated_by')
					->required()
					->maxLength(255)
					->label('Validado por'),
				Forms\Components\DateTimePicker::make('validated_at')
					->required()
					->label('Fecha de validación'),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('career.name')
					->numeric()
					->sortable()
					->label('Carrera'),
				Tables\Columns\TextColumn::make('activity.name')
					->numeric()
					->sortable()
					->label('Actividad'),
				Tables\Columns\TextColumn::make('period.lapse')
					->numeric()
					->sortable()
					->label('Periodo'),
				Tables\Columns\TextColumn::make('key')
					->searchable()
					->label('Matrícula'),
				Tables\Columns\TextColumn::make('name')
					->searchable()
					->label('Nombre'),
				Tables\Columns\ToggleColumn::make('validated')
					->label('Validado')
					->beforeStateUpdated(function ($record, $state) {
						$record->update([
							'validated_by' => Auth::user()->name,
							'validated_at' => Carbon::now(),
							'validation_token' => Str::random(32),
						]);
					}),
				Tables\Columns\TextColumn::make('validated_by')
					->searchable()
					->label('Validado por'),
				Tables\Columns\TextColumn::make('validated_at')
					->dateTime()
					->sortable()
					->label('Fecha de validación'),
				Tables\Columns\TextColumn::make('created_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true)
					->label('Fecha de registro'),
				Tables\Columns\TextColumn::make('updated_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true)
					->label('Fecha de modificación'),
			])
			->filters([
				//
			])
			->actions([
				Tables\Actions\EditAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			]);
	}

	public static function getRelations(): array
	{
		return [
			//
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListStudents::route('/'),
			'create' => Pages\CreateStudent::route('/create'),
			'edit' => Pages\EditStudent::route('/{record}/edit'),
		];
	}
}
