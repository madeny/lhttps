<?php namespace Madeny\lhttps;
class Path{

	public static function get()
	{
		$dir = __DIR__.'/../cert';
		if (!file_exists($dir)) {
			mkdir($dir);
		}
		return $dir;
	}

}



