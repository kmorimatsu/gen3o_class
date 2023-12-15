<?php

date_default_timezone_set('Etc/UCT');
require 'tiffReader.php';
require 'createArray.php';

define("X_BASE",237.0);
define("X_STEP",47.25);
define("WIDTH",47);
define("Y_BASE",0.0);
define("Y_STEP",88.3);
define("HEIGHT",88);

$fname='./half88p.bin';
file_put_contents($fname,'');

$result=create(new TiffReader('tiff36p/0020.tif'),0x0020,0,0,$fname);
file_put_contents('./result.txt',$result);
