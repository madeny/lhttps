<?php

use Madeny\lhttps\Test\CustomTestCase;
use Madeny\lhttps\CreateDomainCertificate;

class CreateDomainCertificateTest extends CustomTestCase{

	   /** @test */
	public function it_can_create_domain_certificate()
	    {
	    	$domainCertificate = 
	    	new CreateDomainCertificate($this->path, $this->domain->getdomain());

	    	$this->assertEquals(0, $domainCertificate->getError());
		}

	   /** @test */
	public function it_can_report_an_error()
	    {
	    	$domainCertificate = new CreateDomainCertificate("fake/path", "fake_domain");

	    	$this->assertEquals(2, $domainCertificate->getError());
		}
		/** @test */
	public function it_can_return_array_of_output()
	{
		$domainCertificate = new CreateDomainCertificate($this->path, $this->domain->getdomain());

		$this->assertEquals(0, count($domainCertificate->getOutput()));
	}
}