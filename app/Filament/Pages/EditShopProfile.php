<?php

namespace App\Filament\Pages;

use App\Models\NetShop;
use Fahiem\FilamentPinpoint\Pinpoint;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filafly\Icons\Phosphor\Enums\Phosphor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\EditTenantProfile;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class EditShopProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Shop profile';
    }

    public function form(Schema $schema): Schema
    {
         return $schema
            ->components([
                Wizard::make([
                    Step::make('Shop Details')
                        ->icon(Iconoir::Shop)
                        ->schema([
                            Group::make([
                                FileUpload::make('logo')
                                    ->label('Logo')
                                    ->required()
                                    ->image()
                                    ->imageEditor()
                                    ->disk('public')
                                    ->directory('shop_uploads')
                                    ->visibility('public')
                                    ->maxSize(512)
                                    ->imagePreviewHeight('250')
                                    ->panelAspectRatio('3:1')
                                    ->panelLayout('integrated')
                                    ->validationMessages([
                                        'required' => 'Please upload an shop logo.',
                                        'image' => 'The uploaded file must be an image.',
                                        'max' => 'The uploaded file must be less than 512kb.',
                                    ]),

                                Group::make([
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255)
                                        ->unique()
                                        ->label('Shop')
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                    TextInput::make('slug')
                                        ->label('Slug')
                                        ->required()
                                        ->trim()
                                        ->maxLength(255)
                                        ->disabled()
                                        ->dehydrated()
                                        ->validationMessages([
                                            'required' => 'Please generate slug.',
                                            'unique' => 'This slug is already taken.',
                                        ]),
                                ])
                                    ->columns([
                                        'default' => 1,
                                    ]),
                            ])->columns([
                                'default' => 1,
                                'sm' => 2,
                                'md' => 2,
                                'lg' => 2,
                            ])
                                ->columnSpanFull(),

                            TextInput::make('phone')
                                ->label('Phone Number')
                                ->tel()
                                ->trim()
                                ->required()
                                ->suffixIcon(Iconoir::Phone)
                                ->maxLength(10) // Total characters allowed in the input box (e.g., 9493934319)
                                ->telRegex('/^9\d{9}$/') // Ensures it starts with 9 and is followed by exactly 9 digits
                                ->prefix('+639')
                                ->validationMessages([
                                    'required' => 'Please enter a phone number.',
                                    'regex' => 'The phone number must be a valid 10-digit number starting with 9.',
                                    'max' => 'The phone number must be 10 digits.',
                                ]),

                            TextInput::make('email')
                                ->label('Email')
                                ->email()
                                ->trim()
                                ->required()
                                ->suffixIcon(Iconoir::Mail)
                                ->maxLength(255)
                                ->validationMessages([
                                    'required' => 'Please enter an email.',
                                    'unique' => 'This email is already taken.',
                                    'email' => 'Please enter a valid email.',
                                ]),

                        ])
                        ->columns([
                            'default' => 1,
                            'sm' => 1,
                            'md' => 2,
                            'lg' => 2,
                        ]),
                    Step::make('Location')
                        ->icon(Iconoir::MapPin)
                        ->schema([
                            Pinpoint::make('other_details')
                                ->label('Location')
                                ->provider('leaflet')
                                ->defaultLocation(10.90154, 123.0705) // Victorias Default
                                ->defaultZoom(15)
                                ->height(400)
                                ->latField('other_details.lat')
                                ->lngField('other_details.long')
                                ->addressField('other_details.address')
                                ->draggable()
                                ->searchable()
                                ->columnSpanFull()
                                ->height(300)
                                ->dehydrated(),
                        ])
                        ->columnSpanFull(),
                ])
                    ->submitAction(new HtmlString(Blade::render(<<<'BLADE'
                        <x-filament::button type="submit" size="sm">
                            Update Shop
                        </x-filament::button>
                    BLADE))),
            ]);
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $oldSlug = $record->slug;
        $newSlug = $data['slug'];

        $record->update($data);

        // If slug changed, redirect to the new tenant URL
        if ($oldSlug !== $newSlug) {
            $this->redirect(
                route('filament.shop.tenant', ['tenant' => $newSlug]),
                navigate: false
            );
        }

        return $record;
    }

     /**
     * Remove the default register button rendered outside the wizard.
     */
    protected function getFormActions(): array
    {
        return [];
    }
}
