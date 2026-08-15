<?php

namespace App\Filament\Resources\Appointments\Pages;

use App\Filament\Resources\Appointments\AppointmentResource;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class CreateAppointment extends CreateRecord
{
    protected static string $resource = AppointmentResource::class;

   public function mount(): void
    {
        parent::mount();

        $this->ensureCustomerRoleExistsForShop();
    }

    protected function ensureCustomerRoleExistsForShop(): void
    {
        $shop = Filament::getTenant();

        // Make sure Spatie's team scoping matches the current shop.
        // (SyncShieldTenant in your tenant middleware likely already does
        // this per-request, but setting it here guards against this method
        // ever running outside that middleware chain.)
        app(PermissionRegistrar::class)->setPermissionsTeamId($shop->id);

        Role::firstOrCreate([
            'name' => 'customer',
            'guard_name' => 'web',
            'shop_id' => $shop->id, // must match your team_foreign_key column
        ]);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }
}
