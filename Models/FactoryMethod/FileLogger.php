<?php

namespace Models\FactoryMethod;

class FileLogger implements Logger {
	private $logPath;

	public function __construct(string $path) {
		$this->logPath = $path;
	}

	public function log(string $message) {
		file_put_contents($this->logPath, $message . PHP_EOL, FILE_APPEND);
	}
}