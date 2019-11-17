<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Madeny\lhttps\Path;
use Madeny\lhttps\Init;
class InitTest extends TestCase {

	/** @test */
	public function init_cert_directory () {

		$path = Path::get();

		$init = new Init("madeny.dev");

		$dirs = $init->dirs;

		foreach ($dirs  as $d) {

			$this->assertEquals(1, file_exists($path."/".$d));
		
		}

	}


	   /** @test */
	   function  it_can_create_and_sign_domain()
	   {

	   	$path = Path::get();

	   	$domain = "madeny.test";

	   	$init = new Init($domain);

	   	$init->execute($domain);

	   	$file = ['madeny.test.ssl.crt', 'madeny.test.ssl.key'];

	   	foreach ($file as $f) {
	   		$this->assertEquals(1, file_exists($path."/live/".$f));
	   	}

		}

} 
