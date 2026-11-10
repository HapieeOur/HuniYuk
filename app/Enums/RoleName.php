<?php

namespace App\Enums;

enum RoleName: string
{
    case ADMIN = 'admin';
    case OWNER_KOS = 'owner_kos';
    case PENGHUNI_KOS = 'penghuni_kos';

    /**
     * Get all role values as an array.
     *
     * @return array<int, string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
