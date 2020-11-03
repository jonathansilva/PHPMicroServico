<?php

// Seguir este raciocínio https://github.com/jonathansilva/API/blob/master/src/routes/auth/login.route.js

namespace Routes\Auth;

use Services\Auth\Login as Auth;
use Core\Validator\Schema;

class Login
{
    public function __construct($route)
	{
        // validar os dados
        $schema = array(
            'email' => ['email', 'required'],
            'password' => ['string', 'min:8', 'required']
        );

        $handler = $this->handler($payload, $services);

        // me perdi aqui
        $route->post('/login', $schema, $handler);
    }

    public function handler($payload, $services = array())
    {
        $db = $services['db'];

        try {
            $token = Auth::authenticate($db, $payload);

            return json_encode(array(
                'status' => 200,
                'data' => $token
            ));
        } catch (\Exception $e) {
            throw new \Exception('Incorrect user and password combination');
        }
    }
}
