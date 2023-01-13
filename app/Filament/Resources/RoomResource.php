<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Models\Room;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-template';

    protected static ?string $navigationLabel = 'Quartos';

    protected static ?string $modelLabel = 'Quartos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                ->schema([
                    Forms\Components\Select::make('hotels_id')
                    ->relationship('hotel', 'name')
                    ->label('Nome do hotel')
                    ->required()
                    ->columnspan(2),
                    Forms\Components\TextInput::make('name')
                    ->label('Nome do quarto')
                    ->required()
                    ->columnspan(2),
                    Forms\Components\TextInput::make('service')
                    ->label('Serviço de quarto utilizado?')
                    ->required()
                    ->columnspan(2),
                    Forms\Components\TextInput::make('guests')
                    ->label('Hóspedes')
                    ->required()
                    ->columnspan(2),
                    Forms\Components\TextInput::make('class')
                    ->label('Classificação do quarto')
                    ->required()
                    ->columnspan(2),
                    Forms\Components\TextInput::make('floor')
                    ->label('Andar')
                    ->required()
                    ->columnspan(2),
                    Forms\Components\TextInput::make('price')
                    ->label('Preço')
                    ->required()
                    ->columnspan(2),
                         ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }    
}
