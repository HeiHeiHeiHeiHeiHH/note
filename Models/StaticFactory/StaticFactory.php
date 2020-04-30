<?php

namespace Models\StaticFactory;

final class StaticFactory {
	public static function factory(string $type): FormatInterface {
		if ($type == "string") {
			return new FormatString();
		}

		if ($type == "number") {
			return new FormatNumber();
		}

		throw new \InvalidArgumentException("unknown format type");
	}
}