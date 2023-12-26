<?php
declare(strict_types=1);

namespace App\Enums;

enum HotpAlgorithms: string {
    case SHA1 = 'sha1';
    case SHA256 = 'sha256';
    case SHA512 = 'sha512';

    public static function getDefault(): self {
        return self::SHA1;
    }

    public static function values(): array {
        return array_column(self::cases(), 'value');
    }
}
