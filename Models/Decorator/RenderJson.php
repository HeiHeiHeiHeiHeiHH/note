<?php

namespace Models\Decorator;

class RenderJson extends Decorator {
	public function renderData(): string {
		return json_encode($this->wrapped->renderdata());
	}
}