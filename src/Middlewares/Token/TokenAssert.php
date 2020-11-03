<?php

// Seguir este raciocínio https://github.com/jonathansilva/API/blob/master/src/middlewares/token/token-assert.js

namespace Middlewares\Token;

use Router\Http\Request;
use Router\Middleware\RouterMiddleware;
use Services\Auth\JWT\Decode as JWT;

class TokenAssert extends RouterMiddleware
{
    public function handle(Request $request)
	{
        $token = $request->header('Authorization');

        try {
            $tokenData = $token ? JWT::decode($token) : '';

            $request->addQuery('tokenData', $tokenData);

            // $next()
        } catch (\Exception $e) {
            throw new \Exception('Invalid authentication');
        }
	}
}
