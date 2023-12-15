
for(x=5;x<21;x++){
	selectWindow("0020.tif");
	//selectWindow("test.tif");
	makeRectangle(x*23.62, 44.11*1, 24, 44);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

/*for(x=0;x<16;x++){
	selectWindow("A1A0.tif");
	//selectWindow("test.tif");
	makeRectangle(x*35.44+118, 44.11*4, 36, 44);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

/*for(y=0;y<=15;y+=5){
	selectWindow("test.tif");
	makeRectangle(0, 44.11*y+0.5, 24, 44);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");	
}//*/

close("ROI Manager");
