<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



    public static function form(Form $form): Form
    {
        $categories = Category::all();
        return $form
            ->schema([
                TextInput::make('name')->maxLength(60)->required()->columnSpanFull()
                    ->live(onBlur: true)->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->required()->columnSpanFull()
                    ->disabled(fn (?string $operation) =>  $operation == 'edit'),
                Select::make('brand_id')->required()
                    ->label('Select Brand')
                    ->options(Brand::all()->pluck('name', 'id'))
                    ->afterStateUpdated(function ( $state) use (& $brand)  {
                        $brand = $state;
                    })
                ->live(onBlur: true),
                Select::make('category_id')->required()
                    ->label('Select Category')
                    ->options(function (Get $get) use ($categories)  {
                        if(!empty($get('brand_id'))){
                            return $categories->where('brand_id',$get('brand_id') )->pluck('name', 'id');
                        }else{
                            return $categories->pluck('name', 'id');
                        }
                    }),
                TextInput::make('price')->required()->label('Price'),
                TextInput::make('in_stock')->required()->label('In Stock')->default(20),
                FileUpload::make('featured_image')->required()->label('Featured Image')
                    ->imageEditor()->imageEditorAspectRatios([
                    '16:9',
                    '4:3',
                    '1:1',
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('brand.name')->label('Brand'),
                TextColumn::make('category.name')->label('Category'),
            ])
            ->defaultSort('name', 'asc')
            ->searchPlaceholder('Search By Name')
            ->filters([
                Tables\Filters\SelectFilter::make('brand_id')
                    ->relationship('brand', 'name')
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
