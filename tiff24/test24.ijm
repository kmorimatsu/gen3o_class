
/*
for(x=0;x<21;x++){
	selectWindow("0020.tif");
	//makeRectangle(x*32.5, 0, 32, 58);
	makeRectangle(x*32.5+0.5, 58.8*14, 32, 58);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

for(x=0;x<16;x++){
	//selectWindow("B1A0.tif");
	selectWindow("A1A0.tif");
	//makeRectangle(x*48.25+163, 0, 48, 58);
	makeRectangle(x*48.25+163.5, 58.8*1, 48, 58);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}

close("ROI Manager");
