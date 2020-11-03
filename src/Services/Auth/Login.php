<?php

namespace Services\Auth;

use Services\Auth\JWT\Encode as JWT;

class Login
{
    public function verifyEmail($db, $email)
    {
        // TODO
    }

    public function verifyPassword($password, $hash)
    {
        // TODO
    }

    public function authenticate($db, $data = array())
    {
        $email = $data['email'];
        $password = $data['password'];

        $result = $this->verifyEmail($db, $email);

        $id = $result['id'];
        $_password = $result['password'];

        $this->verifyPassword($password, $_password);

        return JWT::encode($id);
    }
}
