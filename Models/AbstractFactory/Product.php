<?php

namespace Models\AbstractFactory;

interface Product {
	public function calculatePrice(): int;
}