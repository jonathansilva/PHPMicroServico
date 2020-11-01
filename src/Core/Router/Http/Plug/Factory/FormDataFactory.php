<?php

namespace Plug\Factory;

use Plug\Body\FormData;

class FormDataFactory implements Factory
{
    public static function create()
    {
        return new FormData();
    }
}
