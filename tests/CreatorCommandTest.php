<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Madeny\lhttps\CreatorCommand;
use Madeny\lhttps\Config;
class CreatorCommandTest extends TestCase {

	/** @test */
	public function it_can_instance_CreatorCommand () {
		$this->assertInstanceOf(CreatorCommand::class, (new CreatorCommand()));
	}


	/** @test7 */
	public function it_can_run_execute_method () {

		$path  = Config::path();

		exec("php lh create madeny.dev", $output, $error);

		$this->assertEquals(0, $error);
  
	}

	

} 
