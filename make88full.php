<?php

date_default_timezone_set('Etc/UCT');
require 'tiffReader.php';
require 'createArray.php';

define("X_BASE",244.5);
define("X_STEP",72.25);
define("X_BASE_H",245.0);
define("X_STEP_H",48.69);
define("WIDTH",72);
define("Y_BASE",0.0);
define("Y_STEP",88.3);
define("HEIGHT",88);

$fname='./full88.bin';
file_put_contents($fname,'');

file_put_contents('./result.txt','');
$result=create(new TiffReader('tiff36/A1A0.tif'),0xA1A0,0xA2A0,0xA3A0,$fname);
file_put_contents('./result.txt',$result,FILE_APPEND );
$result=create(new TiffReader('tiff36/A4A0.tif'),0xA4A0,0xA5A0,0xA6A0,$fname);
file_put_contents('./result.txt',$result,FILE_APPEND );
$result=create(new TiffReader('tiff36/A7A0.tif'),0xA7A0,0xA8A0,0xB0A0,$fname);
file_put_contents('./result.txt',$result,FILE_APPEND );
for($a=0xB1A0;$a<=0xF0A0;$a+=0x0300){
	$result=create(new TiffReader('tiff36/'.strtoupper(dechex($a)).'.tif'),$a,$a+0x100,$a+0x200,$fname);
	file_put_contents('./result.txt',$result,FILE_APPEND );
}
$result=create(new TiffReader('tiff36/F3A0.tif'),0xF3A0,0xF4A0,0,$fname);
file_put_contents('./result.txt',$result,FILE_APPEND );
