<?php

date_default_timezone_set('Etc/UCT');
require 'tiffReader.php';
require 'createArray.php';

define("X_BASE",123.5);
define("X_STEP",24.3);
define("WIDTH",24);
define("Y_BASE",0.0);
define("Y_STEP",44.11);
define("HEIGHT",44);

$fname='./half44.bin';
file_put_contents($fname,'');

$result=create(new TiffReader('tiff18/0020.tif'),0x0020,0,0,$fname);
file_put_contents('./result.txt',$result);
