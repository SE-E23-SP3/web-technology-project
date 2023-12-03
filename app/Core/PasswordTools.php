<?php

namespace App\Core;

use JsonSerializable;

class PasswordTools {
    public static function getClientSiteConstant() {
        return env("APP_CLIENT_HASH_SITE_CONSTANT");
    }

    public static function getSaltFromEmail(String $email): String {
            return hash_hmac("sha256", $email, base64_decode(PasswordTools::getClientSiteConstant()), true);
    }

    public static function makeClientHash(String $email, String $password, Int $iterations = 600000): String {
        return base64_encode(openssl_pbkdf2($password, PasswordTools::getSaltFromEmail($email), 32, $iterations, "sha256"));
    }

}

enum InputType implements JsonSerializable {
    case Empty;
    case ClientHashedPassword;
    case Email;
    case Username;
    case Other;

    public static function interpretType(String $input): self {
        if ($input === "") return self::Empty;
        if (self::isValidClientHashedPasswordFormat($input)) return self::ClientHashedPassword;
        if (self::isValidEmailFormat($input)) return self::Email;
        if (self::isValidUsernameFormat($input)) return self::Username;
        return self::Other;
    }


    public static function isValidClientHashedPasswordFormat(String $hashedPassword): Bool {
        $pattern = "/^[A-Za-z0-9+\/]{43}\=$/";
        return preg_match($pattern, $hashedPassword);
    }

    public static function isValidEmailFormat(String $email): Bool {
        $pattern = "/^\b[A-Za-z0-9._%+-]{1,90}@[A-Za-z0-9.-]{1,90}\.[A-Za-z]{2,20}\b ?$/";
        return preg_match($pattern, $email);
    }

    public static function isValidUsernameFormat(String $username): Bool {
        $pattern = "/^[A-Za-z0-9_-]{4,20}$/";
        return preg_match($pattern, $username);
    }



    public function jsonSerialize(): String {
        return $this->name;
    }
}
