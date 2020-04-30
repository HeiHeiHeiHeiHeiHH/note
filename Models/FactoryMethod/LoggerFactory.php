<?php

namespace Models\FactoryMethod;

interface LoggerFactory {
	public function createLogger(): Logger;
}