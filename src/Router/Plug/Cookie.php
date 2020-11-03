<?php

namespace Router\Plug;

use Router\Plug\Globals\GlobalCookie;

class Cookie implements CreatorInterface
{
	public static function create()
	{
		return new GlobalCookie($_COOKIE);
	}
}
