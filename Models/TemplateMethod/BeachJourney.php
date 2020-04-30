<?php

namespace Models\TemplateMethod;

class BeachJourney extends Journey {
	protected function enjoyVacation(): string {
		return "Swimming and sun-bathing";
	}
}