<?php

namespace Models\Strategy;

interface ComparaInterface {
	public function compare($a, $b): int;
}