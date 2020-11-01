<?php

namespace Plug\Utils;

use Plug\Globals\GlobalServer;

class ContentHelper
{
	public static function contentIs(GlobalServer $server, $type)
	{
		return strpos($server->getContentType(), $type) !== false;
	}
}
