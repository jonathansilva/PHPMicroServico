<?php

namespace Router\Plug\Factory;

use Router\Plug\Body\FormData;

class FormDataFactory implements Factory
{
    public static function create()
    {
        return new FormData();
    }
}
