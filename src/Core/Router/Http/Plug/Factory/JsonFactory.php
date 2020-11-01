<?php

namespace Plug\Factory;

use Plug\Body\Json;

class JsonFactory implements Factory
{
    public static function create()
    {
        return new Json();
    }
}
