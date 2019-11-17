<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Madeny\lhttps\Config;
use Madeny\lhttps\Init;
class InitTest extends TestCase {

	/** @test */
	public function init_cert_directory () {

		$path = Config::path();

		$init = new Init("madeny.dev");

		$dirs = $init->dirs;

		foreach ($dirs  as $d) {

			$this->assertEquals(1, file_exists($path."/".$d));
		
		}

	}

	
	   /** @test */
	   function it_can_generate_root_key()
	   {

	   	$path = Config::path();

	   	$init = new Init("madeny.dev");

	   	$init->keygen($path);

	   	$this->assertEquals(1, file_exists($path."/keys/root.key")); 
	   		
		}

		/** @test */
		function it_can_create_ca()
		{
			$path = Config::path();

			$init = new Init("madeny.dev");

			$init->ca($path);

			$this->assertEquals(1, file_exists($path."/csr/root.pem")); 
		}

		/** @test */
		function it_can_generate_domain_cert_key()
		{
			$domain = "madeny.dev";
			$path = Config::path();

			$init = new Init($domain);

			$init->domain($path, $domain);

			$this->assertEquals(1, file_exists($path."/live/$domain.ssl.key")); 
			
		}

		/** @test */
		function it_can_sign_domain_ssl_key()
		{
			$domain = "madeny.dev";
			$path = Config::path();

			$init = new Init($domain);

			$init->sign($path, $domain);

			$this->assertEquals(1, file_exists($path."/live/$domain.ssl.crt")); 
			
		}

	   /** @test */
	   function  it_can_create_and_sign_domain()
	   {

	   	$domain = "madeny.dev";

	   	$path = Config::path();

	   	$init = new Init($domain);

	   	$init->make($domain);

	   	$file = ['madeny.dev.ssl.crt', 'madeny.dev.ssl.key'];

	   	foreach ($file as $f) {
	   		$this->assertEquals(1, file_exists($path."/live/".$f));
	   	}

		}

} 
