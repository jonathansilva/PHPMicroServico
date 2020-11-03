<?php

// Seguir este raciocínio https://github.com/jonathansilva/API/blob/master/src/services/auth/jwt/encode.js

namespace Services\Auth\JWT;

use \Firebase\JWT\JWT;

class Encode
{
    public function encode()
    {
        $key = "teste123";
        $payload = array(
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "iat" => 1356999524,
            "nbf" => 1357000000
        );

        $jwt = JWT::encode($payload, $key);

        return $jwt;
    }
}
