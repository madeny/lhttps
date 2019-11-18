<?php 

use PHPUnit\Framework\TestCase;
use Madeny\lhttps\Config;
use Madeny\lhttps\TrustTheRootSSLCertificate;

class TrustTheRootSSLCertificateTest extends TestCase {

	   /** @test */
	public function it_can_add_root_certificate_authority_to_host_trusted_list()
	    {
	    	$cheker = "OS";
	    	$option = null;
	    	$path = Config::path();
	    	
	    	$trusted = new TrustTheRootSSLCertificate($path);

	    	$this->assertEquals(1, $trusted->getError());
		}
}