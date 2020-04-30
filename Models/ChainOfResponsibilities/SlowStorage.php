<?php

namespace Models\ChainOfResponsibilities;

use Psr\Http\Message\RequestInterface;

class SlowStorage extends Handler {
	protected function processing(RequestInterface $request) {
		return "Hello World!";
	}
}