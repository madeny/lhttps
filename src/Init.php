<?php  
namespace Madeny\lhttps;
use Madeny\lhttps\Path;
use Madeny\lhttps\Openssl;
use Symfony\Component\Dotenv\Dotenv;

//  Init the necessary file and folder
class Init {

	public $dirs = ['cnf', 'config', 'csr', 'keys', 'live', 'logs'];

	function __construct($domain) {
		$i = 0;
		$path = Path::all();

		foreach ($this->dirs as $value) {

			if (file_exists($path."/".$value)) {

				return;
		}else {
				while ($i < 6) {

					mkdir($path."/".$this->dirs[$i]);
					$i++;
				}
			}
		}
	}


	public function execute($domain)
	{
		$path = Path::all();

		(new Openssl($path, $domain));
		echo shell_exec(__DIR__."/bash/script.sh $path $domain");
	}

}