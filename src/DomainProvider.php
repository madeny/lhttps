<?php 
namespace Madeny\lhttps;
class DomainProvider
{

	protected  $domain;

	public function getdomain()
	{
		$this->domain = trim(preg_replace('/\s\s+/', ' ', $this->domain));
		
		return $this->domain;
	}

	public function setdomain($domain)
	{

		!$domain ? $this->domain = "localhost" : $this->domain = $domain;  
	}
}