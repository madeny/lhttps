<?php 

use Madeny\lhttps\Test\CustomTestCase;
use Madeny\lhttps\TrustTheRootSSLCertificate;

class TrustTheRootSSLCertificateTest extends CustomTestCase {

	   /** @test */
	public function it_can_add_root_certificate_authority_to_host_trusted_list()
	    {
	    	$cheker = "OS";
	    	$option = null;
	    	
	    	$trusted = new TrustTheRootSSLCertificate($this->path, $cheker, $option);

	    	$this->assertEquals(1, $trusted->getError());
		}
}