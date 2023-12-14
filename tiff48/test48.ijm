
/*for(x=5;x<21;x++){
	selectWindow("0020.tif");
	//selectWindow("test.tif");
	makeRectangle(x*64.9, 117.7*3, 64, 118);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

for(x=0;x<16;x++){
	selectWindow("A1A0.tif");
	//selectWindow("test.tif");
	makeRectangle(x*96.4+325, 117.7*4, 96, 118);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

/*for(y=0;y<=15;y+=5){
	selectWindow("test.tif");
	makeRectangle(1, 117.7*y, 64, 118);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");	
}//*/

close("ROI Manager");
