<?php

namespace Plug;

use Plug\Globals\GlobalGet;

class Get implements CreatorInterface
{
	public static function create()
	{
		return new GlobalGet($_GET);
	}
}
