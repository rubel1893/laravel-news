<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Site Settings';
    protected static ?string $navigationGroup = 'Configuration';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('site_name')
                ->label('Site Name')
                ->required(),

            TextInput::make('site_tagline')
                ->label('Site Tagline'),

            FileUpload::make('site_logo')
                ->label('Site Logo')
                ->image()
                ->directory('logos')
                ->disk('public'),

            TextInput::make('contact_email')
                ->label('Contact Email')
                ->email(),

            TextInput::make('contact_phone')
                ->label('Contact Phone'),

            Textarea::make('contact_address')
                ->label('Contact Address')
                ->rows(2),

            Textarea::make('footer_text')
                ->label('Footer Text')
                ->rows(2),

            TextInput::make('facebook_url')
                ->label('Facebook URL')
                ->url(),

            TextInput::make('twitter_url')
                ->label('Twitter URL')
                ->url(),

            TextInput::make('instagram_url')
                ->label('Instagram URL')
                ->url(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('site_name')->label('Name')->searchable()->sortable(),
            TextColumn::make('site_tagline')->label('Tagline')->limit(30),
            ImageColumn::make('site_logo')->label('Logo')->disk('public')->size(50),
            TextColumn::make('contact_email')->label('Email')->limit(20),
            TextColumn::make('contact_phone')->label('Phone'),
            TextColumn::make('facebook_url')->label('Facebook')->limit(20),
            TextColumn::make('twitter_url')->label('Twitter')->limit(20),
            TextColumn::make('instagram_url')->label('Instagram')->limit(20),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
