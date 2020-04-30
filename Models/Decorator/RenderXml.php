<?php

namespace Models\Decorator;

class RenderXml extends Decorator {
	public function renderData(): string{
		$doc = new \DOMDocument();
		$data = $this->wrapped->renderData();
		$doc->appendChild($doc->createElement('content', $data));

		return $doc->saveXML();
	}
}