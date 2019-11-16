<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Madeny\lhttps\Path;
class PathTest extends TestCase {

	/** @test */
	public function init_cert_directory () {
		
	$path = Path::all();

	$dir = file_exists($path);

	$this->assertEquals(1, $dir);

	}

}
