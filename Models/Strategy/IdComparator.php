<?php

namespace Models\Strategy;

class IdComparator implements ComparaInterface {
	public function compare($a, $b): int {
		return $a['id'] <=> $b['id'];
	}
}