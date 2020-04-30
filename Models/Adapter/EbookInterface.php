<?php

namespace Models\Adapter;

interface EbookInterface {
	public function unlock();

	public function pressNext();

	public function getPage(): array;
}