<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;

use App\Core\Hotp;

use App\Enums\HotpAlgorithms;
use App\Enums\HotpDigits;

use App\Models\User;


class Totp extends Model {
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


    protected $fillable = [
        'encrypted_secret'
    ];

    protected $casts = [
        "length" => 'App\Enums\HotpDigits',
        "algo" => 'App\Enums\HotpAlgorithms'
    ];


    protected $attributes = [
        'interval' => self::INTERVAL,
        'start_time' => self::START_TIME,
        'length' => Hotp::DEFAULT_DIGITS_LENGTH,
        'algo' => Hotp::DEFAULT_ALGORITHM
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'encrypted_secret'
    ];



    public function validate(string $input): bool {
        $currentTimeStep = self::getTimeStep(time(), $this->interval, $this->start_time);
        foreach ([$currentTimeStep - 1, $currentTimeStep, $currentTimeStep + 1] as $timeStep) {
            if ($this->get($timeStep) === $input) {
                return true;
            }
        }
        return false;
    }

    public function get(?int $timeStep = NULL): string {
        if ($timeStep === NULL) {
            $timeStep = self::getTimeStep(time(), $this->interval, $this->start_time);
        }
        $secret = base64_decode(Crypt::decryptString($this->encrypted_secret));
        return self::calculate($secret, $timeStep, $this->interval, $this->length, $this->algo);
    }


    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
