<?php

namespace Models\FactoryMethod;

class StdoutLogger implements Logger {
	public function log(string $message) {
		echo $message;
	}
}