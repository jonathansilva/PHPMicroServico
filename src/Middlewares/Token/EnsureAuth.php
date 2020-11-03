<?php

// Seguir este raciocínio https://github.com/jonathansilva/API/blob/master/src/middlewares/token/ensure-auth.js

namespace Middlewares\Token;

use \PlugRoute\Http\Request;
use \PlugRoute\Middleware\RouterMiddleware;

class EnsureAuth extends RouterMiddleware
{
    public function handle(Request $request)
    {
        $token = $request->header('Authorization');

        if (!$token) {
            throw new \Exception('Access denied');
        }

        //$next();
    }
}
