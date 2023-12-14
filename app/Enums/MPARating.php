<?php

namespace App\Enums;

enum MPARating: string {
    case G = 'G';
    case PG = 'PG';
    case PG13 = 'PG-13';
    case R = 'R';
    case NC17 = 'NC-17';

    public static function values(): array {
        return array_column(self::cases(), 'value');
      }
};
