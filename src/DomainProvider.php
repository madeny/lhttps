<?php 
namespace Madeny\lhttps;
class DomainProvider
{

	protected  $domainOne;
	protected  $domainTwo;

	public function getDomainOne()
	{
		$this->domainOne = trim(preg_replace('/\s\s+/', ' ', $this->domainOne));
		
		return $this->domainOne;
	}

		public function getDomainTwo()
	{
		$this->domainTwo = 'www.'.$this->domainOne;
		
		return $this->domainTwo;
	}

	public function setDomainOne($domainOne)
	{
			if (!$domainOne) {
				$this->domainOne = "localhost";
			}else{
				$this->domainOne = $domainOne;
			}
	}
}