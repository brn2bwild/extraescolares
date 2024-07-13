<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PeriodResource\Pages;
use App\Filament\Admin\Resources\PeriodResource\RelationManagers;
use App\Models\Period;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeriodResource extends Resource
{
	protected static ?string $model = Period::class;

	protected static ?string $navigationIcon = 'heroicon-m-cube-transparent';

	protected static ?string $modelLabel = 'Periodo';

	protected static ?string $pluralModelLabel = 'Periodos';

	protected static ?int $navigationSort = 2;

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('lapse')
					->label('Periodo')
					->required()
					->maxLength(255),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('lapse')
					->label('Periodo')
					->searchable(),
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
			'index' => Pages\ListPeriods::route('/'),
			'create' => Pages\CreatePeriod::route('/create'),
			'edit' => Pages\EditPeriod::route('/{record}/edit'),
		];
	}
}
