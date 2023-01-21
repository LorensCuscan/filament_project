<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuestResource\Pages;
use App\Filament\Resources\GuestResource\RelationManagers;
use App\Models\Guest;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Tabs;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationLabel = 'Hóspedes';

    protected static ?string $modelLabel = 'Hóspedes';

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('guests')
                    ->tabs([
                        Tabs\Tab::make('Dados de registro')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nome')
                                    ->required()
                                    ->columns(1),
                                Forms\Components\TextInput::make('tel')
                                    ->label('Telefone para contato')
                                    ->required()
                                    ->columns(1),
                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->required()
                                    ->columns(1),
                            ]),
                        Tabs\Tab::make('Dados de hospedagem')                       
                            ->schema([
                                Forms\Components\Select::make('hotel_id')
                                    ->relationship('hotel', 'name')
                                    ->label('Nome do hotel')
                                    ->required()
                                    ->columns(1),
                                Forms\Components\Select::make('room_id')
                                    ->relationship('room', 'name')
                                    ->label('Nome do quarto')
                                    ->required()
                                    ->columns(1),                                    
                            ]),

                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Nome do hóspede'),
                Tables\Columns\TextColumn::make('tel') 
                ->label('Telefone para contato'),
                Tables\Columns\TextColumn::make('hotel.name')
                ->label('Hotel:'),
                Tables\Columns\TextColumn::make('room.name') 
                ->label('Quarto:'),
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
            'index' => Pages\ListGuests::route('/'),
            'create' => Pages\CreateGuest::route('/create'),
            'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }    
}
