<?php

namespace Models\ServiceLocator;

class ServiceLocator {
	private $services = [];

	private $instantiated = [];

	private $shared = [];

	public function addInstance(string $class, $service, bool $shared = true) {
		$this->services[$class] = $service;
		$this->instantiated[$class] = $service;
		$this->shared[$class] = $shared;
	}

	public function addClass(string $class, array $params, bool $shared = true) {
		$this->services[$class] = $params;
		$this->shared[$class] = $shared;
	}

	public function has(string $interface): bool {
		return isset($this->services[$interface]) || isset($this->instantiated[$interface]);
	}

	public function get(string $class) {
		if (isset($this->instantiated[$class]) && $this->shared[$class]) {
			return $this->instantiated[$class];
		}

		$args = $this->services[$class];

		switch (count($args)) {
		case 0:
			$obj = new $class();
			break;
		case 1:
			$obj = new $class($args[0]);
			break;
		case 2:
			$obj = new $class($args[0], $args[1]);
			break;
		case 3:
			$obj = new $class($args[0], $args[1], $args[2]);
			break;
		default:
			throw new \OutOfRangeException('too many arguments given');
		}

		if ($this->shared[$class]) {
			$this->instantiated[$class] = $obj;
		}

		return $obj;
	}
}