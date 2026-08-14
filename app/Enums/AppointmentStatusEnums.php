<?php

namespace App\Enums;
use BackedEnum;
use Filafly\Icons\Iconoir\Enums\Iconoir;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum AppointmentStatusEnums: string implements HasLabel, HasColor, HasIcon
{
    case SCHEDULED = 'scheduled';
    case INPROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public function getLabel(): string | Htmlable | null
    {

        return match ($this) {
            self::SCHEDULED => 'Scheduled',
            self::INPROGRESS => 'In Progress',
            self::COMPLETED => 'Completed',
            self::CANCELLED => 'Cancelled',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::SCHEDULED => 'warning',
            self::INPROGRESS => 'primary',
            self::COMPLETED => 'success',
            self::CANCELLED => 'danger',
        };
    }

    public function getIcon(): string | BackedEnum | Htmlable | null
    {
        return match ($this) {
            self::SCHEDULED => Iconoir::CalendarCheck,
            self::INPROGRESS => Iconoir::Clock,
            self::COMPLETED => Iconoir::Check,
            self::CANCELLED => Iconoir::Xmark,
        };
    }
}
