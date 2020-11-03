<?php

namespace Router;

use Router\Plug\Response;
use Router\Callback\Callback;
use Router\Helpers\ValidateHelper;
use Router\Http\Request;

class RouteManager
{
	private $callback;

	private $routes;

	private $request;

	private $errorRoute;

	private $simpleRoute;

	private $dynamicRoute;

	public function __construct(
		RouteContainer $router,
		Request $request,
		SimpleRoute $simpleRoute,
		DynamicRoute $dynamicRoute
	)
	{
		$this->request 		= $request;
		$routes 			= $router->getRoutes();
		$this->callback     = new Callback($this->request);
		$this->routes       = $routes[$this->request->method()];
		$this->simpleRoute	= $simpleRoute;
		$this->dynamicRoute	= $dynamicRoute;
		$this->errorRoute	= $router->getErrorRouteNotFound();
	}

	public function run(array $dependencies = [])
	{
		$this->dynamicRoute->next($this->simpleRoute);
		$url = $this->request->getUrl();

		foreach ($this->routes as $route) {
			$routerObject = $this->dynamicRoute->handler($route->getRoute(), $url);
			$routeHandled = $routerObject->getRoute();

			if (ValidateHelper::isEqual($routeHandled, $url)) {
				$this->setParameters($routerObject->getParameters());

				return $this->callback->handlerCallback($route, $dependencies);
			}
		}

		return $this->routeNotFound();
	}

	private function routeNotFound()
	{
		if ($this->errorRoute->getCallback()) {
			return $this->callback->handlerCallback($this->errorRoute);
		}

		$response = new Response();
		$response->setStatusCode(404)->response();
		return Error::throwException("The route could not be found.");
	}

	private function setParameters($parameters)
	{
		foreach ($parameters as $key => $value) {
			$this->request->setParameter($key, $value);
		}
	}
}
