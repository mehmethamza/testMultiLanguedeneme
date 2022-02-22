<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordRouteKeyName = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Sayfa Adı')
                    ->reactive()
                    ->afterStateUpdated(fn(string $state, callable $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->label('Bağlantı'),
                Forms\Components\Select::make('template')
                    ->label('Şablon')
                    ->reactive()
                    ->options([
                        'home' => 'Anasayfa',
                        'about' => 'Hakkımızda'
                    ]),
                Forms\Components\Card::make()
                    ->visible(fn(callable $get) => $get('template') === 'home')
                    ->schema([
                        Forms\Components\TextInput::make('data.test_title')
                            ->label('Test Başlık')
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record:id}/edit'),
        ];
    }
}
