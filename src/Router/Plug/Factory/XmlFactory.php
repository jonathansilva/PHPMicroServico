<?php

namespace Router\Plug\Factory;

use Router\Plug\Body\XML;

class XmlFactory implements Factory
{
    public static function create()
    {
        return new XML();
    }
}
