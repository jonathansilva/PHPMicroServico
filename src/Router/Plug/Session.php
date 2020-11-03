<?php

namespace Router\Plug;

use Router\Plug\Globals\GlobalSession;

class Session implements CreatorInterface
{
	public static function create()
	{
		return new GlobalSession($_SESSION);
	}
}
