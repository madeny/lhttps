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

		$rootkey = $path."/keys/root.key";

		$ca = $path."/csr/root.pem";

		$dom = $path."/live/$domain.ssl.key";

		$sign = $path."/live/$domain.ssl.crt";

		!file_exists($rootkey) ? $this->keygen($path) :  0;

		!file_exists($ca) ? $this->ca($path) :  0;

		!file_exists($dom) ? $this->domain($path, $domain) :  0;

		return !file_exists($sign) ? $this->sign($path, $domain) :  0;
	}

}