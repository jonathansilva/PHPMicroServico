<?php

namespace Router\Http;

use Router\Plug\Body\Content;
use Router\Plug\File;
use Router\Plug\Get;
use Router\Plug\Globals\GlobalFile;
use Router\Plug\Globals\GlobalGet;
use Router\Plug\Globals\GlobalServer;
use Router\Plug\Server;

class RequestCreator extends \Router\Plug\Request
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
		return new Request($content, $get, $file, $server);
	}
}
