<?php

date_default_timezone_set('Etc/UCT');
require 'tiffReader.php';
require 'createArray.php';

define("X_BASE",80.0);
define("X_STEP",15.75);
define("WIDTH",15);
define("Y_BASE",0.0);
define("Y_STEP",29.4);
define("HEIGHT",29);

$fname='./half29p.bin';
file_put_contents($fname,'');

$result=create(new TiffReader('tiff12p/0020.tif'),0x0020,0,0,$fname);
file_put_contents('./result.txt',$result);
