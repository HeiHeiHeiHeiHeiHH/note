<?php

namespace Models\Command;

class Receiver {
	private $enableData = false;

	private $output = [];

	public function write(string $str) {
		if ($this->enableData) {
			$str .= ' [' . date('Y-m-d') . ']';
		}

		$this->output[] = $str;
	}

	public function getOutput(): string {
		return join('\n', $this->output);
	}

	public function enableData() {
		$this->enableData = true;
	}

	public function disableData() {
		$this->enableData = false;
	}
}