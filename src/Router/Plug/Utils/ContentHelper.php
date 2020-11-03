<?php

namespace Router\Plug\Utils;

use Router\Plug\Globals\GlobalServer;

class ContentHelper
{
	public static function contentIs(GlobalServer $server, $type)
	{
		return strpos($server->getContentType(), $type) !== false;
	}
}
