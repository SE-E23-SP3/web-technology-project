<?php
declare(strict_types=1);

namespace App\Core;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;

use App\Core\Hotp;

use App\Enums\HotpAlgorithms;
use App\Enums\HotpDigits;

class Totp {
    public const INTERVAL = 30;
    public const START_TIME = 0;

    public static function getTimeStep(?int $time = NULL, int $interval = self::INTERVAL, int $startTime = self::START_TIME): int {
        if ($time === NULL) {
            $time = time();
        }

        return intval(($time - $startTime) / $interval);
    }

    public static function calculate(string $secret, ?int $timeStep = NULL, int $interval = self::INTERVAL, HotpDigits $length = Hotp::DEFAULT_DIGITS_LENGTH, HotpAlgorithms $algo = Hotp::DEFAULT_ALGORITHM) {
        if ($timeStep === NULL) {
            $timeStep = self::getTimeStep();
        }
        return Hotp::calculate($secret, $timeStep, $length, $algo);
    }


    private string $encryptedSecret;
    private int $interval;
    private int $startTime;
    private HotpDigits $length;
    private HotpAlgorithms $algo;

    public function __construct(string $encryptedSecret, int $interval = self::INTERVAL, int $startTime = self::START_TIME, HotpDigits $length = Hotp::DEFAULT_DIGITS_LENGTH, HotpAlgorithms $algo = Hotp::DEFAULT_ALGORITHM) {
        $this->encryptedSecret = $encryptedSecret;
        $this->interval = $interval;
        $this->startTime = $startTime;
        $this->length = $length;
        $this->algo = $algo;
    }

    public function validate(string $input) {
        $currentTimeStep = self::getTimeStep(time(), $this->interval, $this->startTime);
        $secret = Crypt::decryptString($this->encryptedSecret);
        foreach ([$currentTimeStep - 1, $currentTimeStep, $currentTimeStep + 1] as $timeStep) {
            if (self::calculate($secret, $timeStep, $this->interval, $this->length, $this->algo) === $input) {
                return true;
            }
        }
        return false;
    }
}
