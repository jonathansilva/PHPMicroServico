<?php

namespace Router\Plug;

use Router\Plug\Globals\GlobalFile;

class File implements CreatorInterface
{
	public static function create()
	{
		return new GlobalFile($_FILES);
	}
}
