<?php

namespace Router\Plug\Factory;

use Router\Plug\Body\Post;

class PostFactory implements Factory
{
    public static function create()
    {
        return new Post($_POST);
    }
}
