<?php

// Seguir este raciocínio https://github.com/jonathansilva/API/blob/master/src/core/handler.js

namespace Core;

use Services\Database;
use Router\Http\Request;
use Core\Error;

class Handler
{
    public function __construct(Request $req)
    {
        $this->req = $req;
    }

    public function parsePayload($req)
    {
        return [$req->parameters(), $req->bodyObject()];
    }

    public function parseToken($req)
    {
        return $req->only('tokenData');
    }

    public function makeHandler( $handler, $options = [] )
    {
        try {
            $payload = $this->parsePayload($req);

            $schema = $options['schema'];

            if ($schema != null) {
                //$payload = $schema->validate...
            }

            $services = ['db' => Database::connect()];

            $authInfo = $this->parseToken($req);

            // me perdi
            [$status, $data] = $handler($payload, $services, $authInfo);

            return json_encode($status, $data);
        } catch (\Exception $e) {
            $errorResponse = Error::parseError($e);

            return json_encode($errorResponse['statusCode'], $errorResponse);
        }
    }
}
