<?php

namespace Models\Composite\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Composite;
use \PHPUnit\Framework\TestCase;

class CompositeTest extends TestCase {
	public function testRender() {
		$form = new Composite\Form();
		$form->addElement(new Composite\TextElement("Email:"));
		$form->addElement(new Composite\InputElement());

		$embed = new Composite\Form();
		$embed->addElement(new Composite\TextElement("Password:"));
		$embed->addElement(new Composite\InputElement());
		$form->addElement($embed);

		$this->assertEquals(
			'<form>Email:<input type="text" /><form>Password:<input type="text" /></form></form>',
			$form->render()
		);
	}
}