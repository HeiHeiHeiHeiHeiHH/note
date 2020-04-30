<?php

namespace Models\Bridge;

class PlainTextFormatter implements FormatterInterface {
	public function format(string $text) {
		return $text;
	}
}