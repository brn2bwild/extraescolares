<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AdministratorResource\Pages;
use App\Filament\Admin\Resources\AdministratorResource\RelationManagers;
use App\Models\Administrator;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;

class AdministratorResource extends Resource
{
	protected static ?string $model = User::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	protected static ?string $modelLabel = 'Administrador';

	protected static ?string $pluralModelLabel = 'Administradores';

	protected static ?int $navigationSort = 1;

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
				fn (Builder $query) => $query->getModel()->role('admin')
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
			'index' => Pages\ListAdministrators::route('/'),
			'create' => Pages\CreateAdministrator::route('/create'),
			'edit' => Pages\EditAdministrator::route('/{record}/edit'),
		];
	}
}
