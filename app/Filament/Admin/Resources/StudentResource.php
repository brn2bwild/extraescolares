<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\StudentResource\Pages;
use App\Filament\Admin\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
				Forms\Components\Toggle::make('validated')
					->required()
					->label('Válido'),
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
				Forms\Components\TextInput::make('inscription_code')
					->required()
					->maxLength(255)
					->label('Número de ficha'),
				Forms\Components\TextInput::make('university_enrollment')
					->maxLength(255)
					->label('Matrícula'),
				Forms\Components\TextInput::make('name')
					->required()
					->maxLength(255)
					->label('Nombre'),
				Forms\Components\Textarea::make('illnes')
					->rows(3)
					->cols(10)
					->readonly()
					->maxLength(255)
					->label('Enfermedades'),
				// Forms\Components\DateTimePicker::make('validated_at')
				// 	->readonly()
				// 	->label('Fecha de validación'),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('activity.name')
					->numeric()
					->sortable()
					->label('Actividad'),
				Tables\Columns\TextColumn::make('period.lapse')
					->numeric()
					->sortable()
					->label('Periodo'),
				Tables\Columns\TextColumn::make('inscription_code')
					->searchable()
					->label('Número de ficha'),
				Tables\Columns\TextColumn::make('university_enrollment')
					->searchable()
					->label('Matrícula'),
				Tables\Columns\TextColumn::make('name')
					->searchable()
					->label('Nombre'),
				Tables\Columns\TextColumn::make('illnes')
					->searchable()
					->label('Enfermedades'),
				Tables\Columns\TextColumn::make('evaluation_grade')
					->label('Calificación')
					->getStateUsing(function (Model $record) {
						$data = $record->getEvaluationPoints();
						return $data;
					}),
				Tables\Columns\CheckboxColumn::make('validated')
					->label('Válido')
					->beforeStateUpdated(function ($record, $state) {
						$record->update([
							'validated_by' => Auth::user()->name,
							'validated_at' => Carbon::now(),
							'validation_token' => Str::random(32),
						]);
					}),
				Tables\Columns\TextColumn::make('validated_by')
					->searchable()
					->label('Validado por')
					->toggleable(isToggledHiddenByDefault: true),
				Tables\Columns\TextColumn::make('validated_at')
					->dateTime()
					->sortable()
					->label('Fecha de validación')
					->toggleable(isToggledHiddenByDefault: true),
				Tables\Columns\TextColumn::make('career.name')
					->numeric()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true)
					->label('Carrera'),
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
				Tables\Actions\Action::make('evaluateStudent')
					->label('Evaluar')
					->form([
						// Forms\Components\Select::make('authorId')
						// 	->label('Author')
						// 	->options(Student::query()->pluck('name', 'id'))
						// 	->required()
						// ->action(function (array $data, Post $record): void {
						// 	$record->author()->associate($data['authorId']);
						// 	$record->save();
						// })
						Forms\Components\Radio::make('first_criteria')
							->label('Cumple en tiempo y forma con las actividades encomendadas alcanzando los objetivos')
							->options([
								0 => 'Insuficiente',
								1 => 'Suficiente',
								2 => 'Bueno',
								3 => 'Notable',
								4 => 'Excelente',
							])
							->inline()
							->required(),
						Forms\Components\Radio::make('second_criteria')
							->label('Trabaja en equipo y se adapta a nuevas situaciones')
							->options([
								0 => 'Insuficiente',
								1 => 'Suficiente',
								2 => 'Bueno',
								3 => 'Notable',
								4 => 'Excelente',
							])
							->inline()
							->required(),
						Forms\Components\Radio::make('third_criteria')
							->label('Muestra liderazgo en las actividades encomendadas')
							->options([
								0 => 'Insuficiente',
								1 => 'Suficiente',
								2 => 'Bueno',
								3 => 'Notable',
								4 => 'Excelente',
							])
							->inline()
							->required(),
						Forms\Components\Radio::make('fourth_criteria')
							->label('Organiza su tiempo y trabaja de manera proactiva')
							->options([
								0 => 'Insuficiente',
								1 => 'Suficiente',
								2 => 'Bueno',
								3 => 'Notable',
								4 => 'Excelente',
							])
							->inline()
							->required(),
						Forms\Components\Radio::make('fifth_criteria')
							->label('Interpreta la realidad y se sensibiliza aportando soluciones a la problemática con la actividad Cultural y/o Deportiva')
							->options([
								0 => 'Insuficiente',
								1 => 'Suficiente',
								2 => 'Bueno',
								3 => 'Notable',
								4 => 'Excelente',
							])
							->inline()
							->required(),
						Forms\Components\Radio::make('sixth_criteria')
							->label('Realiza sugerencias innovadoras para beneficio o mejora del programa en el que participa')
							->options([
								0 => 'Insuficiente',
								1 => 'Suficiente',
								2 => 'Bueno',
								3 => 'Notable',
								4 => 'Excelente',
							])
							->inline()
							->required(),
						Forms\Components\Radio::make('seventh_criteria')
							->label('Tiene iniciativa para ayudar en las actividades encomendadas y muestra espíritu de servicio')
							->options([
								0 => 'Insuficiente',
								1 => 'Suficiente',
								2 => 'Bueno',
								3 => 'Notable',
								4 => 'Excelente',
							])
							->inline()
							->required(),
					])
					->action(function (array $data, Student $record): void {
						$record->update([
							'grades' => json_encode($data),
						]);
						// $record->author()->associate($data['authorId']);
						// $record->save();
					}),
				Tables\Actions\Action::make('printEvaluation')
					->label('Notas')
					->url(fn (Student $record): string => route('admin.student_grades', $record)),
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
