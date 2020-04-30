<?php

namespace Models\FactoryMethod;

class StdoutLoggerFactory implements LoggerFactory {
	public function createLogger(): Logger {
		return new StdoutLogger();
	}
}