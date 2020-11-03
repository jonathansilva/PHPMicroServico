<?php

// Seguir este raciocínio https://github.com/jonathansilva/API/blob/master/src/core/error.js

namespace Core;

class Error
{
    public function __construct()
    {
        // TODO
    }

    public function parseError($error)
    {
        return array(
            'statusCode' => '?',
            'headers' => '?',
            'data' => '?'
        );
    }
}
