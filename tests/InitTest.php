<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Madeny\lhttps\Config;
use Madeny\lhttps\Init;
class InitTest extends TestCase {


	/** @test */
	public function it_can_instance_CreatorCommand () {
		$this->assertInstanceOf(Init::class, (new Init("madeny.dev")));
	}

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

	   	$log = $init->keygen($path);

	   	$this->assertEquals(1, file_exists($path."/keys/root.key")); 

	   	$this->assertEquals(0, $log); 
	   		
		}

		/** @test */
		function it_can_create_ca()
		{
			$path = Config::path();

			$init = new Init("madeny.dev");

			$log = $init->ca($path);

			$this->assertEquals(1, file_exists($path."/csr/root.pem")); 

			$this->assertEquals(0, $log); 
		}

		/** @test */
		function it_can_generate_domain_cert_key()
		{
			$domain = "madeny.dev";

			$path = Config::path();

			$init = new Init($domain);

			$log = $init->domain($path, $domain);

			$this->assertEquals(1, file_exists($path."/live/$domain.ssl.key")); 

			$this->assertEquals(0, $log); 
			
		}

		/** @test */
		function it_can_sign_domain_ssl_key()
		{
			$domain = "madeny.dev";

			$path = Config::path();

			$init = new Init($domain);

			$log = $init->sign($path, $domain);

			$this->assertEquals(1, file_exists($path."/live/$domain.ssl.crt")); 

			$this->assertEquals(0, $log); 
			
		}

	   /** @test */
	   function  it_can_create_and_sign_domain()
	   {

	   	$domain = "madeny.dev";

	   	$init = new Init($domain);

	   	$config = new Config($domain);

	   	$path = $config->path();

	   	$log = $init->make($domain);

	   	$file = ['madeny.dev.ssl.crt', 'madeny.dev.ssl.key'];

	   	foreach ($file as $f) {
	   		$this->assertEquals(1, file_exists($path."/live/".$f));
	   	}

	   	$sign = file_exists($path."/live/$domain.ssl.crt");

	   	if ($sign == false) {
	   		$this->assertEquals(0, $log);
	   	} else {
	   		$this->assertEquals(1, $log);
	   	}

	   	

		}

} 
