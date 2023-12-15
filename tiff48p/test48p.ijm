
for(x=5;x<21;x++){
	selectWindow("0020.tif");
	//selectWindow("test.tif");
	makeRectangle(x*63.06, 117.7*3, 63, 118);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

/*for(x=0;x<16;x++){
	selectWindow("A1A0.tif");
	//selectWindow("test.tif");
	makeRectangle(x*94.6+315, 117.7*4, 94, 118);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

/*for(y=0;y<=15;y+=5){
	selectWindow("test.tif");
	makeRectangle(1, 117.7*y, 63, 118);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");	
}//*/

close("ROI Manager");
