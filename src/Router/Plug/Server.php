<?php

namespace Router\Plug;

use Router\Plug\Globals\GlobalServer;

class Server implements CreatorInterface
{
	public static function create()
	{
		return new GlobalServer($_SERVER);
	}
}
