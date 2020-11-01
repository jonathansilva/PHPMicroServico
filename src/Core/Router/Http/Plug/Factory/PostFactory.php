<?php

namespace Plug\Factory;

use Plug\Body\Post;

class PostFactory implements Factory
{

    public static function create()
    {
        return new Post($_POST);
    }
}
