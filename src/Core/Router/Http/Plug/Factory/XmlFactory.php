<?php

namespace Plug\Factory;

use Plug\Body\XML;

class XmlFactory implements Factory
{
    public static function create()
    {
        return new XML();
    }
}
