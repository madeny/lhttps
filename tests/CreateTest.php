<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
// use Path\Create;
class CreateTest extends TestCase {

	/** @test */
	public function create_test() {

		exec("php lh create test.dev", $output, $error);


		var_dump($error);

		$this->assertEquals(1, $error());

		
	} 
}