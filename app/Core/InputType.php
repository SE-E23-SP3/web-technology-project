<?php
declare(strict_types=1);

namespace App\Core;

use JsonSerializable;


enum InputType implements JsonSerializable {
    case Null;
    case Empty;
    case ClientHashedPassword;
    case Email;
    case Username;
    case Other;

    public static function interpretType(?String $input): self {
        if ($input === NULL) return self::Null;
        if ($input === "") return self::Empty;
        if (self::isValidClientHashedPasswordFormat($input)) return self::ClientHashedPassword;
        if (self::isValidEmailFormat($input)) return self::Email;
        if (self::isValidUsernameFormat($input)) return self::Username;
        return self::Other;
    }


    public static function isValidClientHashedPasswordFormat(String $hashedPassword): Bool {
        $pattern = "/^[A-Za-z0-9+\/]{43}\=$/";
        return preg_match($pattern, $hashedPassword) === 1;
    }

    public static function isValidEmailFormat(String $email): Bool {
        $pattern = "/^\b[A-Za-z0-9._%+-]{1,90}@[A-Za-z0-9.-]{1,90}\.[A-Za-z]{2,20}\b ?$/";
        return preg_match($pattern, $email) === 1;
    }

    public static function isValidUsernameFormat(String $username): Bool {
        $pattern = "/^[A-Za-z0-9_-]{4,20}$/";
        return preg_match($pattern, $username) === 1;
    }

    public function jsonSerialize(): String {
        return $this->name;
    }
}
