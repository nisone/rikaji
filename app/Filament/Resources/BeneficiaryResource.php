<?php

namespace App\Filament\Resources;

use App\BeneficiaryNeedStatusEnum;
use App\Filament\Resources\BeneficiaryResource\Pages;
use App\Filament\Resources\BeneficiaryResource\RelationManagers;
use App\Filament\Resources\BeneficiaryResource\Widgets\BeneficiaryStatsOverview;
use App\Models\Beneficiary;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BeneficiaryResource extends Resource
{
    protected static ?string $model = Beneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('address'),
                TextInput::make('phone_number'),
                TextInput::make('support_need'),
                TextInput::make('email'),
                Select::make('need_status')
                    ->label('Status')
                    ->options(BeneficiaryNeedStatusEnum::labels())
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('address'),
                TextColumn::make('phone_number'),
                TextColumn::make('support_need'),
                TextColumn::make('need_status'),
                TextColumn::make('email'),
            ])

            ->filters([
                SelectFilter::make('need_status')
                    ->options([
                        BeneficiaryNeedStatusEnum::Pending->value => 'Pending',
                        BeneficiaryNeedStatusEnum::Approved->value => 'Approved',
                        BeneficiaryNeedStatusEnum::Rejected->value => 'Rejected',
                    ]),
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
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeneficiaries::route('/'),
            'create' => Pages\CreateBeneficiary::route('/create'),
            'edit' => Pages\EditBeneficiary::route('/{record}/edit'),
        ];
    }
}
