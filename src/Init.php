<?php  
namespace Madeny\lhttps;
use Madeny\lhttps\Path;
use Madeny\lhttps\Config;
use Symfony\Component\Dotenv\Dotenv;

//  Init the necessary file and folder
class Init {

	public $dirs = ['cnf', 'config', 'csr', 'keys', 'live', 'logs'];

	function __construct($domain) {
		$i = 0;

		$path = Config::path();

		foreach ($this->dirs as $value) {

			if (!file_exists($path."/".$value)) {
				while ($i < 6) {
					mkdir($path."/".$this->dirs[$i]);
					$i++;
				}
				return;
			}

		}
	}


	public function keygen($path)
	{
		echo shell_exec(__DIR__."/../scripts/keygen.sh $path");
	}


	public function ca($path)
	{
		echo shell_exec(__DIR__."/../scripts/ca.sh $path");
	}

	public function domain($path, $domain)
	{
		echo shell_exec(__DIR__."/../scripts/domain.sh $path $domain");
	}

	public function sign($path, $domain)
	{
		echo shell_exec(__DIR__."/../scripts/sign.sh $path $domain");
	}


	public function make($domain)
	{

		$path = Config::path();
		
		$rootkey = !file_exists($path."/keys/root.key") ? $this->keygen($path) :  0;
		$ca = !file_exists($path."/csr/root.pem") ? $this->ca($path) :  0;
		$dom = !file_exists($path."/live/$domain.ssl.key") ? $this->domain($path, $domain) :  0;

		$sign = !file_exists($path."/live/$domain.ssl.crt") ? $this->sign($path, $domain) :  0;
	}

}