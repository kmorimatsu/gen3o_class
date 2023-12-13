<?php

class TiffReader{
	private $width,$length,$image;
	function __construct($filename) {
		$tiff=file_get_contents($filename);
		if (substr($tiff,0,4)!="\x49\x49\x2A\x00") exit('Not suported file format!');

		// Read IFD pointer
		$pifd=read32($tiff,4);

		// Read IFD
		$tifd=substr($tiff,$pifd);
		$ifd=array();
		$num=ord($tifd[0]);
		$num|=ord($tifd[1])<<8;
		$tifd=substr($tifd,2);
		//echo $num;exit;
		// Read IFDs
		for($i=0;$i<$num;$i++){
			//for ($j=0;$j<12;$j++) echo hex8(ord($tifd[$i*12+$j]));
			//echo "\n";continue;
			switch(substr($tifd,$i*12,2)){
				case "\x00\x01": //echo "ImageWidth\n";
					$width=read32($tifd,$i*12+8);
					break;
				case "\x01\x01": //echo "ImageLength\n";
					$length=read32($tifd,$i*12+8);
					break;
				case "\x02\x01": //echo "BitsPerSample\n";
					break;
				case "\x03\x01": //echo "Compression\n";
					$comp=read32($tifd,$i*12+8);
					break;
				case "\x06\x01": //echo "PhotometricInterpretation\n";
					$phint=read32($tifd,$i*12+8);
					break;
				case "\x11\x01": //echo "StripOffsets\n";
					break;
				case "\x16\x01": //echo "RowsPerStrip\n";
					break;
				case "\x17\x01": //echo "StripByteCounts\n";
					break;
				case "\x1a\x01": //echo "Xresolution\n";
					break;
				case "\x1b\x01": //echo "Yresolution\n";
					break;
				case "\x28\x01": //echo "ResolutionUnit\n";
					break;
				case "\x40\x01": //echo "ColorMap\n";
					break;
				default: //echo "Other tag\n";
					break;
			}
			//for ($j=0;$j<12;$j++) echo hex8(ord($tifd[$i*12+$j])); echo "\n";
		}
		if (!isset($width) || !isset($length) || !isset($comp) || !isset($phint) ) exit('Format error');
		echo "$filename: Width $width, Length $length, Compression $comp, Photometric Interpretation $phint \n";
		if (1!=$comp) exit('Compression is not supported');
		if (2!=$phint) exit('Must be RGB');
		//if ($width*$length*3+8!=$pifd) exit('Strange format '.($width*$length*3+8).' vs '.($pifd));
		$this->width=$width;
		$this->length=$length;
		$this->image=substr($tiff,8,$width*$length*3);
	}
	
	function RGB($x,$y){
		$addr=(int)(($y*$this->width+$x)*3);
		if (!isset($this->image[$addr])) return 0xffffff;
		$rgbd=ord($this->image[$addr])<<16;
		$rgbd|=ord($this->image[$addr+1])<<8;
		$rgbd|=ord($this->image[$addr+2]);
		return $rgbd;
	}
	
	function binary($x,$y,$threshold=0x808080){
		return $this->RGB($x,$y)>$threshold ? 0:1;
	}
}

function hex8($byte){
	if ($byte<16) return '0'.dechex($byte);
	else return dechex($byte);
}

function read32($data,$position){
	$res=ord($data[$position]);
	$res|=ord($data[$position+1])<<8;
	$res|=ord($data[$position+2])<<16;
	$res|=ord($data[$position+3])<<24;
	return $res;
}
function read16($data,$position){
	$res=ord($data[$position]);
	$res|=ord($data[$position+1])<<8;
	return $res;
}
function read8($data,$position){
	return ord($data[$position]);
}
