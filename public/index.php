<?php

/* php -S localhost:8080 -t public/
 *
 * Em caso de erro no processo:
 * ps -ef | grep php
 * kill -9 PID
*/

require __DIR__.'/../vendor/autoload.php';

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, x-access-token");

use \PlugRoute\{ PlugRoute, RouteContainer };
use \PlugRoute\Http\{ Request, RequestCreator };
use Middlewares\Token\TokenAssert;

//new TokenAssert();

$route = new PlugRoute(new RouteContainer(), RequestCreator::create());

$route->notFound(function() {
	echo 'Error Page';
});

$route->get('/', function() {
    echo 'Hello World';
});

$route->get('/user/{id:?}', function(Request $request) {
    var_dump($request->parameters());
});

$route->post('/user', function(Request $request) {
    var_dump($request->bodyObject());
});

$route->put('/user/{id:?}', function(Request $request) {
    $data = [$request->parameters(), $request->bodyObject()];
    var_dump($data);
});

$route->on();
