
/*for(x=5;x<21;x++){
	selectWindow("0020.tif");
	//selectWindow("test.tif");
	makeRectangle(x*15.75+1, 29.4*3, 15, 29);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

for(x=0;x<16;x++){
	selectWindow("A1A0.tif");
	makeRectangle(x*23.625+80, 29.4*4, 23, 29);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

/*for(y=0;y<=15;y+=5){
	selectWindow("test.tif");
	makeRectangle(1, 29.4*y, 16, 29);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");	
}//*/

close("ROI Manager");
