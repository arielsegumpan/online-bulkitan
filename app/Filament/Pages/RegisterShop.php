<?php

namespace App\Filament\Pages;

use App\Models\Shop;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RegisterShop extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Shop';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->unique()
                    ->label('Organization Name')
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
            ]);
    }

    protected function handleRegistration(array $data): Shop
    {
       return DB::transaction(function () use ($data) {
            $shop = Shop::create($data);

            $shop->users()->attach(Auth::id());
    
            // Tell Spatie which tenant (team) these roles/permissions belong to
            app(PermissionRegistrar::class)->setPermissionsTeamId($shop->id);

            $role = Role::firstOrCreate([
                'name' => 'super-admin',
                'guard_name' => 'web',
                'shop_id' => $shop->id, // must match team_foreign_key column
            ]);

            $role->syncPermissions(Permission::all());

            Auth::user()->assignRole($role);

            return $shop;
        });
    }
}
