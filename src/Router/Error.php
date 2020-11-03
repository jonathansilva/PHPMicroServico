<?php

namespace Router;

class Error
{
	public static function throwException(string $message)
	{
		throw new \Exception($message);
	}
}
