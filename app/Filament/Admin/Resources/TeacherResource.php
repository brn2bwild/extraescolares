<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TeacherResource\Pages;
use App\Filament\Admin\Resources\TeacherResource\RelationManagers;
use App\Models\Activity;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;

class TeacherResource extends Resource
{
	protected static ?string $model = User::class;

	protected static ?string $navigationIcon = 'heroicon-o-users';

	protected static ?string $modelLabel = 'Maestro';

	protected static ?string $pluralModelLabel = 'Maestros';

	protected static ?int $navigationSort = 3;

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')
					->label('Nombre')
					->required()
					->maxLength(255),
				Forms\Components\TextInput::make('email')
					->label('Correo electrónico')
					->required()
					->email()
					->unique(ignoreRecord: true)
					->maxLength(255),
				Forms\Components\Select::make('activities')
					->options(Activity::all()->pluck('name', 'id'))
					->relationship(
						name: 'activities',
						titleAttribute: 'name',
					)
					->preload()
					->multiple()
					->label('Actividad(es)'),
				Forms\Components\TextInput::make('password')
					->label('Contraseña')
					->required()
					->password()
					->maxLength(255)
					->confirmed()
					->dehydrated(fn ($state) => filled($state))
					->required(fn (string $context): bool => $context === 'create'),
				Forms\Components\TextInput::make('password_confirmation')
					->label('Confirmar contraseña')
					->required()
					->password()
					->maxLength(255)
					->required(fn (string $context): bool => $context === 'create'),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name')
					->label('Nombre')
					->searchable(),
				Tables\Columns\TextColumn::make('email')
					->label('Correo electrónico')
					->searchable(),
				Tables\Columns\TextColumn::make('activities.name')
					->badge()
					->color('success')
					->label('Actividad(es)'),
				Tables\Columns\TextColumn::make('created_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				Tables\Columns\TextColumn::make('updated_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
			])
			->modifyQueryUsing(
				fn (Builder $query) => $query->getModel()->role('teacher')
			)
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
			'index' => Pages\ListTeachers::route('/'),
			'create' => Pages\CreateTeacher::route('/create'),
			'edit' => Pages\EditTeacher::route('/{record}/edit'),
		];
	}
}
