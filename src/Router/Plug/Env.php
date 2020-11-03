<?php

namespace Router\Plug;

use Router\Plug\Globals\GlobalEnv;

class Env implements CreatorInterface
{
	public static function create()
	{
		return new GlobalEnv($_ENV);
	}
}
