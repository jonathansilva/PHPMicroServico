<?php

// Seguir este raciocínio https://github.com/jonathansilva/API/blob/master/src/services/auth/jwt/decode.js

namespace Services\Auth\JWT;

use \Firebase\JWT\JWT;

class Decode
{
    public function decode(string $token)
    {
        $key = "teste123";

        $decoded = JWT::decode($token, $key, array('HS256'));

        return $decoded;
    }
}
