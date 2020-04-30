<?php

namespace Models\Strategy;

class DateComparator implements ComparaInterface {
	public function compare($a, $b): int{
		$aDate = new \DateTime($a['date']);
		$bDate = new \DateTime($b['date']);

		return $aDate <=> $bDate;
	}
}