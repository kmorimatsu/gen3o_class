
/*for(x=5;x<21;x++){
	//selectWindow("0020.tif");
	selectWindow("test.tif");
	makeRectangle(x*31.55, 58.8*3, 31, 58);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

for(x=0;x<16;x++){
	//selectWindow("A1A0.tif");
	selectWindow("test.tif");
	makeRectangle(x*47.35+158, 58.8*4, 47, 58);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

/*for(y=0;y<=15;y+=5){
	selectWindow("test.tif");
	makeRectangle(0, 58.8*y, 32, 58);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");	
}//*/

close("ROI Manager");
