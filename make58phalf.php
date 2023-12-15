<?php

date_default_timezone_set('Etc/UCT');
require 'tiffReader.php';
require 'createArray.php';

define("X_BASE",157.0);
define("X_STEP",31.55);
define("WIDTH",31);
define("Y_BASE",0.0);
define("Y_STEP",58.8);
define("HEIGHT",58);

$fname='./half58p.bin';
file_put_contents($fname,'');

$result=create(new TiffReader('tiff24p/0020.tif'),0x0020,0,0,$fname);
file_put_contents('./result.txt',$result);
