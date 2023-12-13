
/*for(x=0;x<21;x++){
	selectWindow("0020.tif");
	makeRectangle(x*16.2+1, 29.4*3, 16, 29);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

/*for(x=0;x<16;x++){
	selectWindow("A1A0.tif");
	makeRectangle(x*24+82, 29.4*19, 24, 29);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");
}//*/

for(y=0;y<20;y+=19){
	selectWindow("A1A0.tif");
	makeRectangle(1, 29.4*y, 16, 29);
	roiManager("add");
	roiManager("select", 0);
	roiManager("delete");
	run("Duplicate..."," ");	
}//*/

close("ROI Manager");
