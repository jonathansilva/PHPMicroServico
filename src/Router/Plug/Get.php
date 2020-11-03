<?php

namespace Router\Plug;

use Router\Plug\Globals\GlobalGet;

class Get implements CreatorInterface
{
	public static function create()
	{
		return new GlobalGet($_GET);
	}
}
