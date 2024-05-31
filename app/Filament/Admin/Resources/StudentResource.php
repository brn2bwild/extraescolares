<?php

namespace App\Filament\Admin\Resources;

use App\Enums\Genders;
use App\Filament\Admin\Resources\StudentResource\Pages;
use App\Filament\Admin\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
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
				Forms\Components\Checkbox::make('first_validation')
					->requiredWith('university_enrollment')
					->inline()
					->label('Primer semestre'),
				Forms\Components\Checkbox::make('second_validation')
					->requiredWith('university_enrollment')
					->inline()
					->label('Segundo semestre'),
				Forms\Components\TextInput::make('name')
					->required()
					->maxLength(255)
					->label('Nombre'),
				Forms\Components\Select::make('gender')
					->required()
					->options(fn (): array => Genders::forSelect())
					// ->formatStateUsing(fn (string|null $state): string => Genders::getLabel($state))
					->label('Género'),
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
					->maxLength(16)
					->numeric()
					->label('Número de ficha'),
				Forms\Components\TextInput::make('university_enrollment')
					->unique(ignoreRecord: true)
					->regex('/^\d{2}[A-Z]\d{5}$/')
					->validationMessages([
						'unique' => 'El número de matrícula ya existe',
						'regex' => 'La matrícula debe tener el formato 00E00000',
					])
					->maxLength(8)
					->label('Matrícula'),
				Forms\Components\Textarea::make('illnes')
					->rows(3)
					->cols(10)
					->maxLength(255)
					->label('Enfermedades'),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name')
					->searchable()
					->label('Nombre'),
				Tables\Columns\TextColumn::make('gender')
					->sortable()
					->label('Género')
					->getStateUsing(function (Model $record) {
						return $record->gender->label();
					})
					->toggleable(isToggledHiddenByDefault: true),
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
				Tables\Columns\TextColumn::make('illnes')
					->searchable()
					->limit(15)
					->tooltip(function (TextColumn $column): ?string {
						$state = $column->getState();

						if (strlen($state) <= $column->getCharacterLimit()) {
							return null;
						}

						// Only render the tooltip if the column content exceeds the length limit.
						return $state;
					})
					->label('Enfermedades'),
				Tables\Columns\TextColumn::make('evaluation_grade')
					->label('Calificación')
					->getStateUsing(function (Model $record) {
						$data = $record->getEvaluationPoints();
						return $data;
					}),
				Tables\Columns\CheckboxColumn::make('certificate_downloaded')
					->label('Descarga constancia')
					->updateStateUsing(function ($record, $state) {
						$certificate_downloaded = $record->setCertificateDownloaded($state);
						if ($certificate_downloaded === false || $certificate_downloaded === null) {
							Notification::make()
								->title('Descarga de constancia')
								->danger()
								->body('No se ha podido habilitar la descarga de la constancia para el alumno, verifique que cuente con número de matrícula y esté validado')
								->send();
						}
						if ($certificate_downloaded) {
							Notification::make()
								->title('Descarga de constancia')
								->success()
								->body(($state) ? 'El alumno ha descargado su constancia, para descargar nuevamente deberá pagar una nueva' : 'El alumno puede descargar su constancia una sóla vez')
								->send();
						}
					})
					->toggleable(isToggledHiddenByDefault: true),
				Tables\Columns\CheckboxColumn::make('first_validation')
					->label('Válido')
					->updateStateUsing(function ($record, $state) {
						$university_enrollment = $record->setFirstValidation($state);
						if ($university_enrollment === false || $university_enrollment === null) {
							Notification::make()
								->title('Error en la validación')
								->danger()
								->body('No se ha podido validar al alumno, verifique que cuenta con un número de matrícula')
								->send();
						}

						if ($university_enrollment) {
							Notification::make()
								->title('Validación actualizada')
								->success()
								->body(($state) ? 'Se ha validado al alumno correctamente' : 'Se ha quitado la validación al alumno correctamente')
								->send();
						}
					}),
				Tables\Columns\CheckboxColumn::make('second_validation')
					->label('Válido')
					->updateStateUsing(function ($record, $state) {
						$university_enrollment = $record->setSecondValidation($state);
						if ($university_enrollment === false || $university_enrollment === null) {
							Notification::make()
								->title('Error en la validación')
								->danger()
								->body('No se ha podido validar al alumno, verifique que cuenta con un número de matrícula')
								->send();
						}

						if ($university_enrollment) {
							Notification::make()
								->title('Validación actualizada')
								->success()
								->body(($state) ? 'Se ha validado al alumno correctamente' : 'Se ha quitado la validación al alumno correctamente')
								->send();
						}
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
				// Tables\Actions\EditAction::make(),
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
