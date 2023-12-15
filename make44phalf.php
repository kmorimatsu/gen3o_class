<?php

date_default_timezone_set('Etc/UCT');
require 'tiffReader.php';
require 'createArray.php';

define("X_BASE",119);
define("X_STEP",23.62);
define("WIDTH",23);
define("Y_BASE",0.0);
define("Y_STEP",44.11);
define("HEIGHT",44);

$fname='./half44p.bin';
file_put_contents($fname,'');

$result=create(new TiffReader('tiff18p/0020.tif'),0x0020,0,0,$fname);
file_put_contents('./result.txt',$result);
