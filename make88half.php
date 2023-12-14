<?php

date_default_timezone_set('Etc/UCT');
require 'tiffReader.php';
require 'createArray.php';

define("X_BASE",245.0);
define("X_STEP",48.69);
define("WIDTH",48);
define("Y_BASE",0.0);
define("Y_STEP",88.3);
define("HEIGHT",88);

$fname='./half88.bin';
file_put_contents($fname,'');

$result=create(new TiffReader('tiff36/0020.tif'),0x0020,0,0,$fname);
file_put_contents('./result.txt',$result);
