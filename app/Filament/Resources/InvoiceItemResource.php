<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceItemResource\Pages;
use App\Filament\Resources\InvoiceItemResource\RelationManagers;
use App\Models\InvoiceItem;
use App\Models\Invoice; // تأكد من استيراد موديل الفاتورة
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceItemResource extends Resource
{
    protected static ?string $model = InvoiceItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('invoice_id')
                    ->label('Invoice')
                    ->relationship('invoice', 'id')
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->label('Quantity')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice.id')->label('Invoice ID'),
                Tables\Columns\TextColumn::make('description')->label('Description'),
                Tables\Columns\TextColumn::make('quantity')->label('Quantity'),
                Tables\Columns\TextColumn::make('price')->label('Price'),
                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->getStateUsing(fn (InvoiceItem $record) => $record->quantity * $record->price), // لحساب الإجمالي
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
            'index' => Pages\ListInvoiceItems::route('/'),
            'create' => Pages\CreateInvoiceItem::route('/create'),
            'edit' => Pages\EditInvoiceItem::route('/{record}/edit'),
        ];
    }
}
