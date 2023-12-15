<?php

date_default_timezone_set('Etc/UCT');
require 'tiffReader.php';
require 'createArray.php';

define("X_BASE",158.0);
define("X_STEP",47.35);
define("X_BASE_H",157.0);
define("X_STEP_H",31.55);
define("WIDTH",47);
define("Y_BASE",0.0);
define("Y_STEP",58.8);
define("HEIGHT",58);

$fname='./full58p.bin';
file_put_contents($fname,'');

$result='';
$result.=create(new TiffReader('tiff24p/A1A0.tif'),0xA1A0,0xA2A0,0xA3A0,$fname);
$result.=create(new TiffReader('tiff24p/A4A0.tif'),0xA4A0,0xA5A0,0xA6A0,$fname);
$result.=create(new TiffReader('tiff24p/A7A0.tif'),0xA7A0,0xA8A0,0xB0A0,$fname);
for($a=0xB1A0;$a<=0xF0A0;$a+=0x0300){
	$result.=create(new TiffReader('tiff24p/'.strtoupper(dechex($a)).'.tif'),$a,$a+0x100,$a+0x200,$fname);
}
$result.=create(new TiffReader('tiff24p/F3A0.tif'),0xF3A0,0xF4A0,0,$fname);
file_put_contents('./result.txt',$result);
