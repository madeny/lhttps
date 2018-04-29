<?php 
namespace Madeny\lhttps;
/**
* @clean
*/
class TestCleaner
{
	protected  $error;
	function __construct($path)
	{
		exec("rm {$path}/cnf/* ; rm {$path}/live/*; rm {$path}/keys/*; rm {$path}/csr/*", $output, $error);

		$this->error = $error;

	}

	public function getError()
	{
		return $this->error;
	}
}