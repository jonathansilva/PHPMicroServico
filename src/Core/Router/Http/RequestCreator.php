<?php

namespace Router\Http;

use Plug\Body\Content;
use Plug\File;
use Plug\Get;
use Plug\Globals\GlobalFile;
use Plug\Globals\GlobalGet;
use Plug\Globals\GlobalServer;
use Plug\Server;
use Plug\Request;

class RequestCreator extends Request
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
