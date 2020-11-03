<?php

namespace Router\Plug;

use Router\Plug\Body\Body;
use Router\Plug\Body\Content;
use Router\Plug\Globals\GlobalFile;
use Router\Plug\Globals\GlobalGet;
use Router\Plug\Globals\GlobalServer;
use Router\Plug\Globals\GlobalRequest;

class Request
{
	public static function create()
	{
		$get 		= Get::create();
		$file 		= File::create();
		$server 	= Server::create();
		$content 	= (new Content($server))->getBody();
		return self::createRequest($get, $content, $server, $file);
	}

	public static function createRequest(
		GlobalGet $get,
		$content,
		GlobalServer $server,
		GlobalFile $file
	)
	{
		return new GlobalRequest($content, $get, $file, $server);
	}
}
