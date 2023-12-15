<?php

date_default_timezone_set('Etc/UCT');
require 'tiffReader.php';
require 'createArray.php';

define("X_BASE",315.0);
define("X_STEP",63.06);
define("WIDTH",63);
define("Y_BASE",0.0);
define("Y_STEP",117.7);
define("HEIGHT",118);

$fname='./half118p.bin';
file_put_contents($fname,'');

$result=create(new TiffReader('tiff48p/0020.tif'),0x0020,0,0,$fname);
file_put_contents('./result.txt',$result);
