<?php

namespace Router\Plug\Factory;

use Router\Plug\Body\TextPlain;

class TextPlainFactory implements Factory
{
    public static function create()
    {
        return new TextPlain();
    }
}
