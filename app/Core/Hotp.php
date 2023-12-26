<?php
declare(strict_types=1);

namespace App\Core;

use Illuminate\Support\Facades\Log;

use app\Enums\HotpAlgorithms;

class Hotp {
    public const BYTE_SIZE= 8;
    public const COUNTER_SIZE = 8;
    public const DEFAULT_ALGORITHM = HotpAlgorithms::SHA1;
    public const PACK_FORMAT = 'C*';
    public const BYTE_MASK = 0b11111111; //0xff
    public const LOWER_HALF_BYTE_MASK = 0b1111; //0xf

    public static function intToByteArray(int $input, int $byteSize = self::COUNTER_SIZE): array {
        $bitSize = self::BYTE_SIZE* $byteSize;
        $binNumString = str_pad(decbin($input), $bitSize, '0', STR_PAD_LEFT);

        for ($byteIndex = 0; $byteIndex < $byteSize; $byteIndex += 1) {
            $bitIndex = $byteIndex * self::BYTE_SIZE;
            $byteArray[$byteIndex] = bindec(substr($binNumString, $bitIndex, self::BYTE_SIZE));
        }

        return $byteArray;
    }

    public static function intToByteString(int $input): string {
        return self::byteArrayToByteString(self::intToByteArray($input));
    }

    public static function byteArrayToByteString(array $byteArray): string {
        return pack(self::PACK_FORMAT, ...$byteArray);
    }

    public static function byteStringToByteArray(string $byteString): array {
        return array_values(unpack(self::PACK_FORMAT, $byteString));
    }

    public static function byteArrayToHexString(array $byteArray): string {
        return bin2hex(self::byteArrayToByteString($byteArray));
    }

    public static function hexStringToByteArray(string $input): array {
        return self::byteStringToByteArray(hex2bin($input));
    }

    // Dynamic truncate function
    private static function dt(array $hmacResult): int {
        $p = (
            self::getByteFromHmacResult($hmacResult, 0, 0b01111111) |
            self::getByteFromHmacResult($hmacResult, 1) |
            self::getByteFromHmacResult($hmacResult, 2) |
            self::getByteFromHmacResult($hmacResult, 3)
        );

        return $p;
    }

    private static function getByteFromHmacResult(array $hmacResult, int $byteNr, int $byteMask = self::BYTE_MASK): int {
        $offset = $hmacResult[19] & self::LOWER_HALF_BYTE_MASK;
        $index = $offset + $byteNr;
        $byteShift = (3 - $byteNr) * self::BYTE_SIZE;
        return ($hmacResult[$index] & $byteMask) << $byteShift;
    }

    private static function getHotpDigits(int $p, int $length = 6): string {
        $digits = $p % (10 ** $length);
        return str_pad(strval($digits), $length, '0', STR_PAD_LEFT);
    }

    public static function hmac(string $data, string $key, HotpAlgorithms $algo = self::DEFAULT_ALGORITHM): string {
        return hash_hmac($algo->value, $data, $key, true);
    }


    public static function calculate(string $secret, int $counter, HotpAlgorithms $algo = self::DEFAULT_ALGORITHM): string {
        $counterKey = self::intToByteString($counter);
        $hmacResult = self::hmac($counterKey, $secret, $algo);
        $hmacResultArray = self::byteStringToByteArray($hmacResult);
        return self::getHotpDigits(self::dt($hmacResultArray));
    }
}
