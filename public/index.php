<?php

/* php -S localhost:8080 -t public/
 *
 * Em caso de erro no processo:
 * ps -ef | grep php
 * kill -9 PID
*/

// CORS
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, x-access-token");

// Autoload
require_once('autoload.php');

use Router\{ Router, RouteContainer };
use Router\Http\{ Request, RequestCreator };
use Middlewares\Token\TokenAssert;

$token = TokenAssert::class;
var_dump($token);

$route = new Router(new RouteContainer(), RequestCreator::create());

$route->notFound(function() {
	echo 'Error Page';
});

$route->get('/', function() {
    echo 'Hello World';
});

$route->get('/user/{id:?}', function(Request $request) {
    var_dump($request->parameters());
});

$route->on();
