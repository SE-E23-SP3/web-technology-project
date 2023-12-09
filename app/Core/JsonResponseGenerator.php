<?php
namespace App\Core;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

// https://gist.github.com/jeffochoa/a162fc4381d69a2d862dafa61cda0798
// https://github.com/symfony/symfony/blob/7.0/src/Symfony/Component/HttpFoundation/JsonResponse.php
class JsonResponseGenerator {
    public static function generic(?String $message = NULL, int $httpCode = Response::HTTP_OK): JsonResponse {
        if ($message === NULL) {
            $message = Response::$statusTexts[Response::HTTP_BAD_REQUEST];
        }
        return new JsonResponse([
            "message" => $message
        ], $httpCode);
    }

    public static function badRequest(?String $message = NULL): JsonResponse {
        return self::generic($message, Response::HTTP_BAD_REQUEST);
    }
}
