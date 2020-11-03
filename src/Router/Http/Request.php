<?php

namespace Router\Http;

use Router\Plug\Globals\GlobalFile;
use Router\Plug\Globals\GlobalGet;
use Router\Plug\Globals\GlobalServer;
use Router\Plug\Globals\GlobalRequest;

class Request extends GlobalRequest
{
	private $parameter;

	private $routeNamed;

	public function __construct($body, GlobalGet $get, GlobalFile $file, GlobalServer $server)
	{
		parent::__construct($body, $get, $file, $server);
		$this->parameter = [];
		$this->routeNamed = [];
	}

	public function parameter($key)
	{
		return $this->parameter[$key];
	}

	public function parameters()
	{
		return $this->parameter;
	}

	public function setParameter($key, $value)
	{
		$this->parameter[$key] = $value;

		return $this;
	}

	public function redirectToRoute(string $name, int $code = 301)
	{
		if (empty($this->routeNamed[$name])) {
			throw new \Exception("Name wasn't defined.");
		}

		return $this->redirect($this->routeNamed[$name], $code);
	}

	public function setRouteNamed(array $routeNamed)
	{
		$this->routeNamed = $routeNamed;

		return $this;
	}

	public function getRouteNamed()
	{
		return $this->routeNamed;
	}
}
