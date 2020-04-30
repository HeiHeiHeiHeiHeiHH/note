<?php

namespace Models\DependencyInjection;

class DatabaseConnection {
	private $configuration;

	public function __construct(DatabaseConfiguration $configuration) {
		$this->configuration = $configuration;
	}

	public function getDsn(): string {
		return sprintf(
			'%s:%s@%s:%d',
			$this->configuration->getUsername(),
			$this->configuration->getPassword(),
			$this->configuration->getHost(),
			$this->configuration->getPort()
		);
	}
}