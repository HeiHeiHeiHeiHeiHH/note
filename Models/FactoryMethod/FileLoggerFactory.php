<?php

namespace Models\FactoryMethod;

class FileLoggerFactory implements LoggerFactory {
	private $logPath;

	public function __construct(string $path) {
		$this->logPath = $path;
	}

	public function createLogger(): Logger {
		return new FileLogger($this->logPath);
	}
}