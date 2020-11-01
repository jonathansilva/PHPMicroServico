<?php

namespace Plug;

use Plug\Body\Body;
use Plug\Body\Content;
use Plug\Globals\GlobalFile;
use Plug\Globals\GlobalGet;
use Plug\Globals\GlobalServer;

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
		return new \PlugHttp\Globals\GlobalRequest($content, $get, $file, $server);
	}
}
