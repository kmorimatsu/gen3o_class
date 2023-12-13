
/*for(x=0;x<21;x++){
	selectWindow("0020.tif");
	makeRectangle(x*24.3+1, 44.11*3, 24, 44);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

for(x=0;x<16;x++){
	selectWindow("A1A0.tif");
	makeRectangle(x*36.125+122, 44.11*7, 36, 44);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

/*for(y=0;y<20;y+=19){
	selectWindow("test.tif");
	makeRectangle(1, 44.11*y, 24, 44);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");	
}//*/

close("ROI Manager");
