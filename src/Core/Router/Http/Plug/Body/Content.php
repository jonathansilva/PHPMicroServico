<?php

namespace Plug\Body;

use Plug\Factory\FormDataFactory;
use Plug\Factory\FormUrlEncodedFactory;
use Plug\Factory\JsonFactory;
use Plug\Factory\PostFactory;
use Plug\Factory\TextPlainFactory;
use Plug\Factory\XmlFactory;
use Plug\Globals\GlobalServer;

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
