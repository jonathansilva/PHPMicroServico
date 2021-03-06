<?php

// Seguir este raciocínio https://github.com/jonathansilva/API/blob/master/src/middlewares/token/token-assert.js

namespace Source\Middlewares\Token;

use \PlugRoute\Http\Request;
use \PlugRoute\Middleware\PlugRouteMiddleware;
use Source\Services\Auth\JWT\Decode as JWT;

class TokenAssert implements PlugRouteMiddleware
{
    public function handler(Request $request)
	{
        $token = $request->header('Authorization');

        try {
            $tokenData = $token ? JWT::decode($token) : '';

            $request->addQuery('tokenData', $tokenData);
        } catch (\Exception $e) {
            throw new \Exception('Invalid authentication');
        }
	}
}
