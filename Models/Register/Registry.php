<?php

namespace Models\Register;

abstract class Registry {
	const LOGGER = "logger";

	private static $storedValues = [];

	private static $allowKeys = [
		self::LOGGER,
	];

	public static function set(string $name, $value) {
		if (!in_array($name, self::$allowKeys)) {
			throw new \InvalidArgumentException("Invalid key given");
		}

		self::$storedValues[$name] = $value;
	}

	public static function get(string $name) {
		if (!in_array($name, self::$allowKeys) || !isset(self::$storedValues[$name])) {
			throw new \InvalidArgumentException("Invalid key given");
		}

		return self::$storedValues[$name];
	}
}