<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\PostResource\Pages;
use App\Models\Blog\Post;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $slug = 'blog/posts';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationIcon = 'fluentui-news-20';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Images')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('featured_image')
                                    ->label('Featured Image')
                                    ->collection('featured_image')
                                    ->required()
                                    ->image()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1200')
                                    ->imageResizeTargetHeight('675')
                                    ->columnSpan(1),
                            ]),
                        Forms\Components\FileUpload::make('gallery_images')
                            ->label('Gallery Images')
                            ->multiple()
                            ->image()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->directory('blog/gallery')
                            ->visibility('public')
                            ->helperText('Upload multiple images for post gallery'),
                    ])
                    ->collapsible(),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->maxLength(255)
                            ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(Post::class, 'slug', ignoreRecord: true),

                        Forms\Components\Toggle::make('is_featured')
                            ->required(),

                        Forms\Components\Textarea::make('content_overview')
                            ->label('Excerpt')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('A brief overview of the post content (shown in listings)')
                            ->columnSpan('full'),

                        Forms\Components\MarkdownEditor::make('content')
                            ->required()
                            ->columnSpan('full'),

                        Forms\Components\Select::make('blog_author_id')
                            ->relationship(
                                name: 'author',
                                modifyQueryUsing: fn(Builder $query) => $query->with('roles')->whereRelation('roles', 'name', '=', 'admin'),
                            )
                            ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->firstname} {$record->lastname}")
                            ->searchable(['firstname', 'lastname'])
                            ->required(),

                        Forms\Components\Select::make('blog_category_id')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->required(),

                        Forms\Components\DatePicker::make('published_at')
                            ->label('Published Date'),

                        SpatieTagsInput::make('tags'),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('SEO')
                    ->schema([
                        Forms\Components\TextInput::make('seo_title')
                            ->label('SEO Title')
                            ->maxLength(60)
                            ->helperText('Leave empty to use post title'),
                            
                        Forms\Components\Textarea::make('seo_description')
                            ->label('SEO Description')
                            ->rows(2)
                            ->maxLength(160)
                            ->helperText('Leave empty to use post excerpt'),
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('featured_image')
                    ->label('Image')
                    ->collection('featured_image')
                    ->circular(false)
                    ->width(80)
                    ->height(50),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('author.name')
                    ->searchable(['firstname', 'lastname'])
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(fn(Post $record): string => $record->published_at?->isPast() ? 'Published' : 'Draft')
                    ->colors([
                        'success' => 'Published',
                    ]),

                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('view_count')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published Date')
                    ->date(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated')
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->hiddenLabel()->tooltip('Detail'),
                Tables\Actions\EditAction::make()->hiddenLabel()->tooltip('Edit'),
                Tables\Actions\DeleteAction::make()->hiddenLabel()->tooltip('Delete'),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __("menu.nav_group.blog");
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}