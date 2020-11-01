<?php

namespace Plug;

use Plug\Globals\GlobalSession;

class Session implements CreatorInterface
{
	public static function create()
	{
		return new GlobalSession($_SESSION);
	}
}
