<?php

namespace Plug\Factory;

use Plug\Body\TextPlain;

class TextPlainFactory implements Factory
{
    public static function create()
    {
        return new TextPlain();
    }
}
