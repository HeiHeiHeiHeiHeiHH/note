<?php

namespace Models\Memento\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Memento\State;
use Models\Memento\Ticket;
use \PHPUnit\Framework\TestCase;

class MementoTest extends TestCase {
	public function testOpenTicketAssingAndSetBackToOpen() {
		$ticket = new Ticket();

		$ticket->open();
		$openState = $ticket->getState();
		$this->assertEquals(State::STATE_OPENED, (string) $ticket->getState());

		$memento = $ticket->saveToMemento();

		$ticket->assign();
		$this->assertEquals(State::STATE_ASSIGNED, (string) $ticket->getState());

		$ticket->restoreFromMemento($memento);

		$this->assertEquals(State::STATE_OPENED, (string) $ticket->getState());
		$this->assertNotSame($openState, $ticket->getState());
	}
}