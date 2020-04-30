<?php

/*多例模式(jm-db组件，redis组件都实现了)*/
namespace Models\Multiton;

final class Multiton {
	const INSTANCE_1 = "1";
	const INSTANCE_2 = "2";

	private static $instances = [];

	/*私有构造函数防止被用户随意的创造*/
	private function __construct() {

	}

	public static function getInstance(string $instanceString): Multiton {
		if (!isset(self::$instances[$instanceString])) {
			self::$instances[$instanceString] = new self();
		}

		return self::$instances[$instanceString];
	}

	/*防止实例被clone*/
	private function __clone() {

	}

	/*防止实例被序列化*/
	private function __wakeup() {

	}
}