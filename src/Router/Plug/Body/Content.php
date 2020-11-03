<?php

namespace Router\Plug\Body;

use Router\Plug\Factory\FormDataFactory;
use Router\Plug\Factory\FormUrlEncodedFactory;
use Router\Plug\Factory\JsonFactory;
use Router\Plug\Factory\PostFactory;
use Router\Plug\Factory\TextPlainFactory;
use Router\Plug\Factory\XmlFactory;
use Router\Plug\Globals\GlobalServer;

class Content
{
	private $server;

	public function __construct(GlobalServer $server)
	{
		$this->server = $server;
	}

	public function getBody()
	{
		$json 		= JsonFactory::create();
		$post 		= PostFactory::create();
		$formData 	= FormDataFactory::create();
		$urlEncode 	= FormUrlEncodedFactory::create();
		$textPlain  = TextPlainFactory::create();
		$xml        = XmlFactory::create();

		$json->next($formData);
		$formData->next($urlEncode);
		$urlEncode->next($textPlain);
		$textPlain->next($xml);
		$xml->next($post);

		return $json->handle($this->server);
	}
}
