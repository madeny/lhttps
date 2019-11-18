<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Madeny\lhttps\Config;
use Madeny\lhttps\Init;
class ConfigTest extends TestCase {

	/** @test8 */
	public function it_can_instance_Config_class () {
		$this->assertInstanceOf(Config::class, (new Config("madeny.dev")));
	}

	/** @test */
	public function it_can_generate_v3 () {

		$path = Config::path();

		$init = new Init("madeny.dev");

		$v3 = new Config($path, "madeny.test");

			$this->assertEquals(1, file_exists($path."/cnf/v3.ext"));

	}


	   /** @test */
	   function  it_can_generate_openssl_config()
	   {

	   	$path = Config::path();

	   	$init = new Config($path, "madeny.dev");

	   		$this->assertEquals(1, file_exists($path."/cnf/openssl.cnf"));

		}


		/** @test */
		function it_can_return_a_path()
		{

			$this->assertEquals(1, file_exists(Config::path()));
			
		}



} 
