<?php

namespace Models\SimpleFactory;

class SimpleFactory {
	public function createBicyle(): Bicyle {
		return new Bicyle();
	}
}