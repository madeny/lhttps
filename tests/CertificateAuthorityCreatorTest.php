<?php 
use Madeny\lhttps\Test\CustomTestCase;
use Madeny\lhttps\CertificateAuthorityCreator;
use Madeny\lhttps\CertificateKeyCreator;

class CertificateAuthorityCreatorTest extends CustomTestCase{

	   /** @test */
	public function it_can_create_certificate_authority()
	    {
	    	(new CertificateKeyCreator($this->path));
	    	$certificateAuthority = new CertificateAuthorityCreator($this->path);


	    	$this->assertEquals(0, $certificateAuthority->getError());
		}

	   /** @test */
	public function it_can_return_an_error()
	    {
	    	$certificateAuthority = new CertificateAuthorityCreator("fake/path");

	    	$this->assertEquals(2, $certificateAuthority->getError());
		}

	   /** @test */
	public function it_can_return_array_of_output()
	    {
	    	$certificateAuthority = new CertificateAuthorityCreator($this->path);

	    	$this->assertEquals(0, count($certificateAuthority->getOutput()));
		}

}