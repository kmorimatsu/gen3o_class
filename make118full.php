<?php

date_default_timezone_set('Etc/UCT');
require 'tiffReader.php';
require 'createArray.php';

define("X_BASE",326.0);
define("X_STEP",96.4);
define("X_BASE_H",325.0);
define("X_STEP_H",64.9);
define("WIDTH",96);
define("Y_BASE",0.0);
define("Y_STEP",117.7);
define("HEIGHT",118);

$fname='./full118.bin';
file_put_contents($fname,'');

file_put_contents('./result.txt','');
$result=create(new TiffReader('tiff48/A1A0.tif'),0xA1A0,0xA2A0,0xA3A0,$fname);
file_put_contents('./result.txt',$result,FILE_APPEND );
$result=create(new TiffReader('tiff48/A4A0.tif'),0xA4A0,0xA5A0,0xA6A0,$fname);
file_put_contents('./result.txt',$result,FILE_APPEND );
$result=create(new TiffReader('tiff48/A7A0.tif'),0xA7A0,0xA8A0,0xB0A0,$fname);
file_put_contents('./result.txt',$result,FILE_APPEND );
for($a=0xB1A0;$a<=0xF0A0;$a+=0x0300){
	$result=create(new TiffReader('tiff48/'.strtoupper(dechex($a)).'.tif'),$a,$a+0x100,$a+0x200,$fname);
	file_put_contents('./result.txt',$result,FILE_APPEND );
}
$result=create(new TiffReader('tiff48/F3A0.tif'),0xF3A0,0xF4A0,0,$fname);
file_put_contents('./result.txt',$result,FILE_APPEND );
