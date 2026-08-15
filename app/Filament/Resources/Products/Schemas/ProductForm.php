<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Product;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\ToolbarButtonGroup;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make([
                    Section::make()
                        ->icon(Iconoir::UnderlineSquare)
                        ->description('Manage your products.')
                        ->schema([

                            TextInput::make('sku')
                                ->label('SKU')
                                ->prefix('SKU-')
                                ->required()
                                ->default(function () {
                                    do {
                                        $random = strtoupper(Str::random(7));
                                        $sku = substr($random, 0, 4).'-'.substr($random, 4, 3);
                                    } while (Product::where('sku', $sku)->exists());

                                    return $sku;
                                })
                                ->unique(ignoreRecord: true)
                                ->maxLength(8)
                                ->suffixAction(
                                    Action::make('refreshSku')
                                        ->icon('heroicon-m-arrow-path')
                                        ->tooltip('Generate new SKU')
                                        ->action(function ($set) {
                                            do {
                                                $random = strtoupper(Str::random(7));
                                                $sku = substr($random, 0, 4).'-'.substr($random, 4, 3);
                                            } while (Product::where('sku', $sku)->exists());

                                            $set('sku', $sku);
                                        })
                                )
                                ->columnSpanFull(),

                            TextInput::make('name')
                                ->required()
                                ->columnSpanFull()
                                ->maxlength(255),

                            Select::make('category_id')
                                ->relationship(name: 'category', titleAttribute: 'name')
                                ->required()
                                ->native(false)
                                ->preload()
                                ->optionsLimit(5)
                                ->searchable(),

                            Select::make('brand_id')
                                ->relationship(name: 'brand', titleAttribute: 'brand_name')
                                ->required()
                                ->native(false)
                                ->preload()
                                ->optionsLimit(5)
                                ->searchable(),

                            TextInput::make('barcode')
                                ->label('Barcode')
                                ->placeholder('-')
                                ->default(null)
                                ->columnSpanFull()
                                ->maxLength(255),

                            TextInput::make('cost_price')
                                ->required()
                                ->numeric()
                                ->prefix('₱'),

                            TextInput::make('selling_price')
                                ->required()
                                ->numeric()
                                ->prefix('₱'),

                            TextInput::make('stock')
                                ->required()
                                ->numeric()
                                ->default(0),

                            TextInput::make('low_stock_alert')
                                ->required()
                                ->numeric()
                                ->default(5),
                        ])
                        ->columns([
                            'default' => 1,
                            'sm' => 1,
                            'md' => 2,
                            'lg' => 2,
                        ]),

                    Section::make()
                        ->schema([
                            RichEditor::make('description')
                                ->columnSpanFull()
                                ->toolbarButtons([
                                    ['bold', 'italic', 'underline', 'strike', 'link'],
                                    [ToolbarButtonGroup::make('Paragraph', ['paragraph', 'h1', 'h2', 'h3'])->textualButtons()],
                                    [ToolbarButtonGroup::make('Alignment', ['alignStart', 'alignCenter', 'alignEnd', 'alignJustify'])],
                                    ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                    ['undo', 'redo'],
                                ])
                        ]),
                ])
                    ->columnspan([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 3,
                        'lg' => 3,
                    ]),
                Group::make([
                    Section::make('Featured Image')
                        ->schema([
                            FileUpload::make('ft_img')
                                ->hiddenLabel()
                                ->image()
                                ->required()
                                ->imageEditor()
                                ->disk('public')
                                ->directory('product_uploads')
                                ->visibility('public')
                                ->maxSize(1024),
                        ]),
                    Section::make('Attahcments')
                        ->schema([
                            FileUpload::make('attachments.image')
                                ->hiddenLabel()
                                ->image()
                                ->required()
                                ->imageEditor()
                                ->disk('public')
                                ->directory('product_uploads')
                                ->visibility('public')
                                ->maxSize(1024)
                                ->panelAspectRatio('3:1')
                                ->panelLayout('grid')
                                ->maxFiles(3)
                                ->multiple()
                                ->validationMessages([
                                    'required' => 'Please upload an shop logo.',
                                    'image' => 'The uploaded file must be an image.',
                                    'max' => 'The uploaded file must be less than 512kb.',
                                ]),
                        ]),
                ])
                    ->columnspan([
                        'default' => 1,
                        'sm' => 1,
                        'md' => 2,
                        'lg' => 2,
                    ]),
            ])
            ->columns([
                'default' => 1,
                'sm' => 1,
                'md' => 5,
                'lg' => 5,
            ]);
    }
}
