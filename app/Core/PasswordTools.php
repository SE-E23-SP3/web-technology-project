<?php

namespace App\Core;

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

    public static function validateClientHashedPasswordFormat(String $hashedPassword): Bool {
        $pattern = "/^[A-Za-z0-9+\/]{43}\=$/";
        return preg_match($pattern, $hashedPassword);
    }

    public static function validateEmailFormat(String $email): Bool {
        $pattern = "/^\b[A-Za-z0-9._%+-]{1,90}@[A-Za-z0-9.-]{1,90}\.[A-Za-z]{2,20}\b ?$/";
        return preg_match($pattern, $email);
    }

    public static function validateUsernameFormat(String $username): Bool {
        $pattern = "/^[A-Za-z0-9_-]{4,20}$/";
        return preg_match($pattern, $username);
    }
}
