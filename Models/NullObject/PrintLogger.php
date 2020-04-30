<?php

namespace Models\NullObject;

class PrintLogger implements LoggerInterface {
	public function log(string $string) {
		echo $string;
	}
}