<?php

function create($o,$addr1,$addr2,$addr3,$binfile=0){
	$result='';
	$bindata='';
	for($h=0;$h<18;$h++){
		if ($h<6) {
			if (!$addr1) continue;
			$y=(int)(Y_BASE+$h*Y_STEP);
			$addr=$addr1+$h*16;
		} elseif ($h<12) {
			if (!$addr2) continue;
			$y=(int)(Y_BASE+($h+1)*Y_STEP);
			$addr=$addr2+($h-6)*16;
		} else {
			if (!$addr3) continue;
			$y=(int)(Y_BASE+($h+2)*Y_STEP);
			$addr=$addr3+($h-12)*16;
		}
		for($l=0;$l<16;$l++){
			$x=(int)(X_BASE+$l*X_STEP);
			$result.="\n// 0x".dechex($addr+$l).'(';
			if ($addr<0x100) {
				$result.=chr($addr+$l);
			} elseif (mb_check_encoding(chr($addr>>8).chr(($addr&255)+$l),'EUC-JP')) {
				$result.=chr($addr>>8).chr(($addr&255)+$l);
			} else {
				$result.='??';
			}
			$result.=")\n";
			for($yy=0;$yy<HEIGHT;$yy++){
				$comment=' //';
				$byte=0;
				for($xx=0;$xx<WIDTH;$xx++){
					$dot=$o->binary($x+$xx,$y+$yy);
					if (0xa1b0==$addr+$l) {
						// Exception. Cut the protruding from right side character.
						if (WIDTH*4<$xx*5) $dot=0;
					} elseif (0xa1b1==$addr+$l) {
						// Exception. Cut the protruding from right side character.
						if (HEIGHT<$yy*2) $dot=0;
					} elseif (0xa1b2==$addr+$l) {
						// Exception. Cut the protruding from left side character.
						if ($yy*2<HEIGHT) $dot=0;
					} elseif (0xa1b3==$addr+$l) {
						// Exception. Cut the protruding from left side character.
						if (HEIGHT*4<$yy*5) $dot=0;
					} elseif (0xa1ef==$addr+$l) {
						// Exception. Cut the protruding from left side character.
						if ($xx<WIDTH/12) $dot=0;
					} elseif (0xa2e6==$addr+$l) {
						// Exception. Cut the protruding from left side character.
						if ($yy<HEIGHT/5) $dot=0;
					} elseif (0xbfd7==$addr+$l || 0xcdf3==$addr+$l) {
						// Exception. Cut the protruding from left side character.
						if ($xx<WIDTH/48+1) $dot=0;
					} elseif (0xa8a0<=$addr && $addr<=0xa8c0) {
						// Exception. The left and right sides must be the same as a little inside.
						if ($xx<WIDTH/8) $dot=$o->binary($x+$xx+WIDTH/8,$y+$yy);
						if (WIDTH*7<$xx*8) $dot=$o->binary($x+$xx-WIDTH/8,$y+$yy);
					} elseif (0xA6A0<=$addr && $addr<=0xA8F0) {
						// Exception. Convert half size to full size
						$xh=(int)(X_BASE_H+$l*X_STEP_H);
						switch($xx%3){
							case 0:
								$dot=$o->binary($xh+2*$xx/3,$y+$yy);
								break;
							case 1:
								$dot=$o->binary($xh+2*$xx/3,$y+$yy) | $o->binary($xh+2*$xx/3+1,$y+$yy);
								break;
							case 2:
							default:
								$dot=$o->binary($xh+2*$xx/3+1,$y+$yy);
								break;
						}
						if ($xx==WIDTH-1) $dot=0;
					}
					if ($dot) {
						$comment.='#';
						$byte=$byte*2+1;
					} else {
						$comment.='.';
						$byte=$byte*2;
					}
					if (7==($xx&7)) {
						if ($byte<16) $result.='0x0'.dechex($byte).',';
						else $result.='0x'.dechex($byte).',';
						$bindata.=chr($byte);
						$byte=0;
					}
				}
				if (WIDTH&7) {
					$byte<<=8-(WIDTH&7);
					if ($byte<16) $result.='0x0'.dechex($byte).',';
					else $result.='0x'.dechex($byte).',';
					$bindata.=chr($byte);
				}
				$result.=$comment."\n";
			}
		}
	}
	if ($binfile) file_put_contents($binfile,$bindata,FILE_APPEND);
	return $result;
}
