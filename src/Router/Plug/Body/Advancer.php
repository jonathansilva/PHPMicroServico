<?php

namespace Router\Plug\Body;

interface Advancer
{
	public function next(Handler $handler);
}
