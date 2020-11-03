<?php

namespace Router\Plug\Factory;

use Router\Plug\Body\Json;

class JsonFactory implements Factory
{
    public static function create()
    {
        return new Json();
    }
}
