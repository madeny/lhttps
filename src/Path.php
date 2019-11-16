<?php namespace Madeny\lhttps;
class Path{

	public static function all()
	{
		$dir = __DIR__.'/../cert';
		if (!file_exists($dir)) {
			mkdir($dir);
		}
		return $dir;
	}

}



