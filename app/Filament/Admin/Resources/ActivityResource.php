<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ActivityResource\Pages;
use App\Filament\Admin\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use App\Models\Period;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivityResource extends Resource
{
	protected static ?string $model = Activity::class;

	protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

	protected static ?string $modelLabel = 'Actividad';

	protected static ?string $pluralModelLabel = 'Actividades';

	protected static ?int $navigationSort = 4;

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\Select::make('user_id')
					->label('Maestro')
					->required()
					->options(User::all()->pluck('name', 'id')),
				Forms\Components\TextInput::make('name')
					->label('Nombre')
					->required()
					->maxLength(255),
				Forms\Components\Select::make('periods')
					->multiple()
					->relationship(
						name: 'periods',
						titleAttribute: 'lapse'
					)
					->options(Period::all()->pluck('lapse', 'id'))
					->label('Periodo(s)'),
				Forms\Components\TextInput::make('capacity')
					->label('Capacidad')
					->required()
					->numeric(),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('user.name')
					->label('Maestro')
					->sortable(),
				Tables\Columns\TextColumn::make('name')
					->label('Nombre')
					->searchable(),
				Tables\Columns\TextColumn::make('capacity')
					->label('Capacidad')
					->numeric()
					->sortable(),
				Tables\Columns\TextColumn::make('periods.lapse')
					->badge()
					->color('success')
					->label('Periodo(s)'),
				Tables\Columns\TextColumn::make('created_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				Tables\Columns\TextColumn::make('updated_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
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
			'index' => Pages\ListActivities::route('/'),
			'create' => Pages\CreateActivity::route('/create'),
			'edit' => Pages\EditActivity::route('/{record}/edit'),
		];
	}
}
