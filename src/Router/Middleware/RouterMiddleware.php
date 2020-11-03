<?php

namespace Router\Middleware;

use Router\Http\Request;

interface RouterMiddleware
{
    public function handle(Request $request);
}
