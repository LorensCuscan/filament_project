<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriodResource\Pages;
use App\Filament\Resources\PeriodResource\RelationManagers;
use App\Models\Period;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Tabs;

class PeriodResource extends Resource
{
    protected static ?string $model = Period::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Periodos';

    protected static ?string $modelLabel = 'Datas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Dados de estadia')
                    ->tabs([
                        Tabs\Tab::make('Periodo de estadia')
                            ->schema([
                                DatePicker::make('date_from')
                                ->label('De:')
                                ->required()
                                ->columns(1),
                                DatePicker::make('date_to')
                                ->label('Até:')
                                ->required()
                                ->columns(1),
                                Forms\Components\Select::make('guest_id')
                                ->relationship('guest', 'name')
                                ->label('Hóspedes')
                                ->required()
                                ->columns(1),
                                Forms\Components\Select::make('hotel_id')
                                ->relationship('hotel', 'name')
                                ->label('Nome do hotel')
                                ->required()
                                ->columns(2),
                                Forms\Components\Select::make('room_id')
                                ->relationship('room', 'name')
                                ->label('Nome do quarto')
                                ->required()
                                ->columns(2),
                            ]),                          
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date_from')
                ->label('De'),
                Tables\Columns\TextColumn::make('date_to') 
                ->label('Até:'),
                Tables\Columns\TextColumn::make('hotel.name')
                ->label('Nome do hotel')
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
            'index' => Pages\ListPeriods::route('/'),
            'create' => Pages\CreatePeriod::route('/create'),
            'edit' => Pages\EditPeriod::route('/{record}/edit'),
        ];
    }    
}
