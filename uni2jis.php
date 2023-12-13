<?php
/*
	Unicode -> JIS and Shift-JIS -> JIS conversion table generator
	
	Unicode - JIS table was obtained from: http://www.unicode.org/Public/MAPPINGS/OBSOLETE/EASTASIA/JIS/JIS0208.TXT

	Note that each data contain 2 bytes little endian JIS code 
*/


$tabletxt=file_get_contents('./JIS0208.TXT');
if (!preg_match_all('/[\r\n]0x([0-9A-F]{4})[\s]+0x([0-9A-F]{4})[\s]+0x([0-9A-F]{4})/i',$tabletxt,$m)) exit('Unknown error');
//print_r($m[1]);

$sjis2jis=array();
$uni2jis=array();
for($i=0;$i<count($m[0]);$i++){
	$sjis2jis[hexdec($m[1][$i])]=hexdec($m[2][$i]);
	$uni2jis[hexdec($m[3][$i])]=hexdec($m[2][$i]);
}

$sjis2jisBin='';
$uni2jisBin='';
for($i=0;$i<65536;$i++){
	if (!isset($sjis2jis[$i])) $sjis2jis[$i]=0x2129; // "?" of full-width
	if (!isset($uni2jis[$i])) $uni2jis[$i]=0x2129;   // "?" of full-width
	$sjis2jisBin.=chr($sjis2jis[$i]&255);
	$sjis2jisBin.=chr($sjis2jis[$i]>>8);
	$uni2jisBin.=chr($uni2jis[$i]&255);
	$uni2jisBin.=chr($uni2jis[$i]>>8);
}

//file_put_contents('./sjis2jis.bin',$sjis2jisBin);
file_put_contents('./uni2jis.bin',$uni2jisBin);
