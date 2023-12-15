
for(x=5;x<21;x++){
	selectWindow("0020.tif");
	//selectWindow("test.tif");
	makeRectangle(x*47.25, 88.3*3, 47, 88);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

/*for(x=0;x<16;x++){
	selectWindow("A1A0.tif");
	//selectWindow("test.tif");
	makeRectangle(x*70.9+236, 88.3*4, 71, 88);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

/*for(y=0;y<=15;y+=5){
	selectWindow("test.tif");
	makeRectangle(1, 88.3*y, 48, 88);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");	
}//*/

close("ROI Manager");
