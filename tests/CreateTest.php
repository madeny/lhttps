<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
// use Path\Create;
class CreateTest extends TestCase {

	/** @test */
	public function single_create_command () {

	exec("php lh create test.dev", $output, $error);

	$this->assertEquals(0, $error);

	}

}
