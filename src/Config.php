<?php 
namespace Madeny\lhttps;

use Madeny\lhttps\Openssl;
use Madeny\lhttps\Path;

class Config{

function __construct()
{

$folders = ['cnf', 'config', 'csr', 'keys', 'live', 'logs'];
$i = 0;

foreach ($folders as $key => $value) {
	
	if (file_exists(Path::all()."/".$value)) {
		echo "Folder already exist";
		return;
	}else{
		while ($i < 6) {

  mkdir(Path::all()."/".$folders[$i]);
  $i++;
}
	}
}

// die();
}

public static function file($path, $domainOne, $domainTwo)
{
	return new Openssl($path, $domainOne, $domainTwo);
}
}
