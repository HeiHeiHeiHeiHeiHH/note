<?php

namespace Models\Composite;

class Form implements RenderInterface {
	private $elements;

	public function render(): string{
		$formCode = "<form>";
		foreach ($this->elements as $element) {
			$formCode .= $element->render();
		}

		$formCode .= "</form>";

		return $formCode;
	}

	public function addElement(RenderInterface $element) {
		$this->elements[] = $element;
	}
}