<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ImageColumn;



class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';



public static function form(Form $form): Form
{
    return $form
        ->schema([
            Section::make('Post Details')->schema([
                TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (string $state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                Textarea::make('excerpt')
                    ->required(),

                Forms\Components\RichEditor::make('body')
                ->label('Post Content')
                ->required()
                ->toolbarButtons([
                    'bold',
                    'italic',
                    'strike',
                    'underline',
                    'h1',
                    'h2',
                    'h3',
                    'bulletList',
                    'orderedList',
                    'blockquote',
                    'link',
                    'undo',
                    'redo',
                ]),


                FileUpload::make('featured_image')
                    ->label('Featured Image')
                    ->image()
                    ->directory('posts')
                    ->disk('public')
                    ->visibility('public'),

                Toggle::make('show_sidebar')
                    ->label('Show Sidebar'),

                Toggle::make('is_published')
                    ->label('Published'),
            ]),

            Section::make('Relations')->schema([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required(),

                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(auth()->id())
                    ->required(),
            ])
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('title')->label('Title')->sortable()->searchable(),
            TextColumn::make('slug')->label('Slug')->toggleable(),
            IconColumn::make('is_published')->label('Published')->boolean(),
            TextColumn::make('created_at')->label('Created')->dateTime(),
            ImageColumn::make('featured_image')
    ->label('Image')
    ->disk('public')
    ->size(60),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }    
}
