<?php

namespace Models\Prototype;

class FooBookPrototype extends BookPrototype {
	protected $category = "Foo";

	public function __clone() {

	}
}