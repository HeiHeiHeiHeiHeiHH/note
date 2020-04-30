<?php

namespace Models\Composite;

class InputElement implements RenderInterface {
	public function render(): string {
		return '<input type="text" />';
	}
}