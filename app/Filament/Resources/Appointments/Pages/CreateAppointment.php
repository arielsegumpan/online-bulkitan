<?php

namespace App\Filament\Resources\Appointments\Pages;

use App\Filament\Resources\Appointments\AppointmentResource;
use App\Filament\Resources\Appointments\Schemas\AppointmentForm;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard\Step;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class CreateAppointment extends CreateRecord
{
    use HasWizard;

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

    /**
     * @return array<Step>
     */
    protected function getSteps(): array
    {
        return [
            Step::make('Service Items')
                ->schema([
                    Section::make()
                        ->schema([AppointmentForm::getItemsRepeater()]),
                ]),

            Step::make('Appointment Details')
                ->schema([
                    Section::make()
                        ->description('Manage the core information, scheduling times, and service notes for this appointment.')
                        ->icon(Iconoir::CalendarCheck)
                        ->schema(AppointmentForm::getDetailsComponents())
                        ->columns(),
                ]),

        ];
    }
}
