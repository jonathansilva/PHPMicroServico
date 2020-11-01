<?php

namespace Plug;

use Plug\Globals\GlobalFile;

class File implements CreatorInterface
{
	public static function create()
	{
		return new GlobalFile($_FILES);
	}
}
