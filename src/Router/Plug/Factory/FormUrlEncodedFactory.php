<?php

namespace Router\Plug\Factory;

use Router\Plug\Body\FormUrlEncoded;

class FormUrlEncodedFactory implements Factory
{
    public static function create()
    {
        return new FormUrlEncoded();
    }
}
