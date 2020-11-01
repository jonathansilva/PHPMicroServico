<?php

namespace Plug;

use Plug\Globals\GlobalCookie;

class Cookie implements CreatorInterface
{
	public static function create()
	{
		return new GlobalCookie($_COOKIE);
	}
}
