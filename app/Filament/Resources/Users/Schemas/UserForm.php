<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->minLength(3),

                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->minLength(3),

                        TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->minLength(8)
                            ->maxLength(255)
                            ->same('passwordConfirmation')
                            ->dehydrated(fn ($state) => filled($state))
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->live(debounce: 500)
                            ->autocomplete('new-password'),

                        TextInput::make('passwordConfirmation')
                            ->label('Confirm password')
                            ->password()
                            ->revealable()
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->minLength(8)
                            ->maxLength(255)
                            ->dehydrated(false)
                            ->autocomplete('new-password'),
                    ])
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                        'lg' => 2,
                    ])
                    ->columnSpanFull(),

                Section::make()
                    ->schema([
                        CheckboxList::make('roles')
                            ->relationship('roles', 'name')
                            ->searchable()
                            ->getOptionLabelFromRecordUsing(
                                fn (Role $record) => Str::of($record->name)->replace('-', ' ')->title()
                            )
                            ->saveRelationshipsUsing(function (Model $record, $state) {
                                $record->roles()->syncWithPivotValues($state, [config('permission.column_names.team_foreign_key') => getPermissionsTeamId()]);
                            }),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
