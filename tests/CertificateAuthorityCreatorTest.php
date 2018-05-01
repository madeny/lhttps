<?php 
use Madeny\lhttps\Test\CustomTestCase;
use Madeny\lhttps\CertificateAuthorityCreator;

class CertificateAuthorityCreatorTest extends CustomTestCase{

	   /** @test */
	public function it_can_create_certificate_authority()
	    {
	    	$certificateAuthority = new CertificateAuthorityCreator($this->path);


	    	$this->assertEquals(0, $certificateAuthority->getError());
		}

	   /** @test */
	public function it_can_return_an_error()
	    {
	    	$certificateAuthority = new CertificateAuthorityCreator("fake/path");

	    	$this->assertEquals(1, $certificateAuthority->getError());
		}

	   /** @test */
	public function it_can_return_array_of_output()
	    {
	    	$certificateAuthority = new CertificateAuthorityCreator($this->path);

	    	$this->assertEquals(0, count($certificateAuthority->getOutput()));
		}

}