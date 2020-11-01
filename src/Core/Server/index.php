<?php
/*
 * Lib:
 * PlugRoute and PlugHttp by github.com/erandirjunior
*/

// php -S localhost:8080 -t public/

use Router\Router;
use Router\RouteContainer;
use Router\Http\RequestCreator;

$route = new Router(new RouteContainer(), RequestCreator::create());

$route->get('/', function() {
    echo 'basic route';
});

$route->on();
