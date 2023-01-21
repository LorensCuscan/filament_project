<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Illuminate\Support\Facades\Schema;
use App\Models\Guest;
use Filament\Forms\Components\Card;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Pagamentos';

    protected static ?string $modelLabel = 'Pagamentos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('desc')
                            ->label('Descrição do pagamento')
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
                            ->columns(1),
                        Forms\Components\Select::make('room_id')
                            ->relationship('room', 'name')
                            ->label('Nome do quarto')
                            ->required()
                            ->columns(1),
                    ]),
            ]);
            
                    
        
        
           
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('desc')
                ->label('Forma de pagamento'),
                Tables\Columns\TextColumn::make('guest.name') 
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
