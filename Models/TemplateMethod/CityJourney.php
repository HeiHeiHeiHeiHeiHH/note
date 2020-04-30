<?php

namespace Models\TemplateMethod;

class CityJourney extends Journey {
	protected function enjoyVacation(): string {
		return "Eat, drink, take photos and sleep";
	}

	protected function bugGift(): string {
		return "Buy a gift";
	}
}