<?php

// Seguir este raciocínio https://github.com/jonathansilva/API/blob/master/src/middlewares/token/token-assert.js

namespace Middlewares\Token;

use \PlugRoute\Http\Request;
use \PlugRoute\Middleware\RouterMiddleware;
use Services\Auth\JWT\Decode as JWT;

class TokenAssert extends RouterMiddleware
{
    public function handle(Request $request)
	{
        $token = $request->header('Authorization');

        try {
            $tokenData = $token ? JWT::decode($token) : '';
            var_dump($tokenData);

            $request->addQuery('tokenData', $tokenData);

            // $next()
        } catch (\Exception $e) {
            throw new \Exception('Invalid authentication');
        }
	}
}
