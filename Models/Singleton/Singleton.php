<?php

namespace Models\Singleton;

final class Singleton {
	private static $instance;

	/*避免被直接实例化*/
	protected function __construct() {

	}

	public static function getInstance(): Singleton {
		if (!self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/*防止被clone*/
	protected function __clone() {

	}

	/*防止被序列化*/
	protected function __wakeup() {

	}
}