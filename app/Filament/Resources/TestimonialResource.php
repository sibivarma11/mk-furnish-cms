<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('role')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('rating')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->default(5)
                    ->required(),
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image_file')
                    ->disk('public')
                    ->directory('temp-testimonial-images')
                    ->visibility('private')
                    ->required(fn($livewire) => $livewire instanceof Pages\CreateTestimonial),
                Forms\Components\Placeholder::make('current_image')
                    ->label('Current Image')
                    ->content(function ($record) {
                        if ($record && $record->image) {
                            return new \Illuminate\Support\HtmlString('<img src="' . route('testimonials.image', $record) . '" style="max-width: 200px; max-height: 200px;" />');
                        }
                        return 'No image uploaded';
                    })
                    ->hidden(fn($record) => !$record),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image_preview')
                    ->label('Image')
                    ->state(function ($record) {
                        return route('testimonials.image', $record);
                    }),
                Tables\Columns\TextColumn::make('content')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
