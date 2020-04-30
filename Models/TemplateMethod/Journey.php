<?php

namespace Models\TemplateMethod;

abstract class Journey {
	private $thingsToDo = [];

	final public function takeATrip() {
		$this->thingsToDo[] = $this->buyAFight();
		$this->thingsToDo[] = $this->takePlane();
		$this->thingsToDo[] = $this->enjoyVacation();
		$bugGift = $this->bugGift();

		if ($bugGift !== null) {
			$this->thingsToDo[] = $bugGift;
		}

		$this->thingsToDo[] = $this->takePlane();
	}

	abstract protected function enjoyVacation(): string;

	protected function bugGift() {
		return null;
	}

	private function buyAFight(): string {
		return 'Buy a fight ticket';
	}

	private function takePlane(): string {
		return 'Taking the plane';
	}

	public function getThingsToDo(): array{
		return $this->thingsToDo;
	}

}