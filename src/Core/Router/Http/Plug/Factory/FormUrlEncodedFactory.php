<?php

namespace Plug\Factory;

use Plug\Body\FormUrlEncoded;

class FormUrlEncodedFactory implements Factory
{
    public static function create()
    {
        return new FormUrlEncoded();
    }
}
