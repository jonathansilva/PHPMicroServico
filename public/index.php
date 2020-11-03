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
header("Access-Control-Allow-Headers: Content-Type");

// Autoload
require_once('autoload.php');

use Router\{ Router, RouteContainer };
use Router\Http\{ Request, RequestCreator };

$route = new Router(new RouteContainer(), RequestCreator::create());

// A ideia é carregar todas as rotas ( cada rota, é um arquivo )
// https://github.com/jonathansilva/API/blob/master/src/core/server/index.js#L6


// https://github.com/erandirjunior/plug-http/blob/master/doc/request.md
$route->get('/{id:?}', function(Request $req) {
    var_dump($req->bodyObject());
    //var_dump($res);
});

$route->on();
