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
}
