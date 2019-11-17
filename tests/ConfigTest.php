<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Madeny\lhttps\Path;
use Madeny\lhttps\Config;
use Madeny\lhttps\Init;
class ConfigTest extends TestCase {

	/** @test */
	public function it_can_generate_v3 () {

		$path = Path::all();

		$init = new Init("madeny.dev");

		$v3 = new Config($path, "madeny.test");

			$this->assertEquals(1, file_exists($path."/cnf/v3.ext"));

	}


	   /** @test */
	   function  it_can_generate_openssl_config()
	   {

	   	$path = Path::all();

	   	$init = new Config($path, "madeny.dev");

	   		$this->assertEquals(1, file_exists($path."/cnf/openssl.cnf"));

		}

} 
