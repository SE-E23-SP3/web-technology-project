<?php
declare(strict_types=1);

namespace App\Enums;

enum HotpDigits: int {
    case SIX = 6;
    case EIGHT = 8;

    public static function getDefault(): self {
        return self::SIX;
    }

    public static function values(): array {
        return array_column(self::cases(), 'value');
    }
}
