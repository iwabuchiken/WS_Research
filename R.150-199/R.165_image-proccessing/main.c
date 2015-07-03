/*
 * test.c
 *
 *  Created on: 2015/06/29
 *      Author: kbuchi
 */

//#include <windows.h>

#include <stdio.h>

#include <stdlib.h>


#include <zlib.h>

///////////////////////////////
//
// protos
//
 ///////////////////////////////
//int init_Image(char *, unsigned char[][][3], int, int);
int init_Image(char *, int, int);

int init_Image_Colors
(char *, int, int, int, int, int);

int main() {

//	printf("[%s:%d] main()\n", __FILE__, __LINE__);

	///////////////////////////////
	//
	// vars
	//
	 ///////////////////////////////
	char fname_In[] = "Pepper.bmp";
	char fpath_In[] = "C:/WORKS/WS/WS_Research/R.150-199/R.165_image-proccessing/data/img_src";

	char fpath_In_Full[100];

	int result;	// result of init_Image()

	int r = 100;
	int g = 0;
	int b = 0;

//	char fname_Out[] = "colors.ppm";
	char fname_Out[50];
	sprintf(fname_Out, "colors_%d-%d-%d.ppm", r, g, b);

//	char fname_Out[] = "red.ppm";

	unsigned char image[480][440][3];

	//REF http://www.cprogramminginfo.com/Functions/sprintf_Manual.php
	sprintf(fpath_In_Full, "%s/%s", fpath_In, fname_In);

//	result = init_Image(fname_Out, image, 440, 480);
	result = init_Image_Colors(fname_Out, 480, 440, r, g, b);
//	result = init_Image_Colors(fname_Out, 480, 440, 100, 100, 0);
//	result = init_Image(fname_Out, 480, 440);
//	result = init_Image("red.ppm", 480, 440);

	if (result == 1) {

		printf("[%s:%d] init image => done: %s\n", __FILE__, __LINE__, fname_Out);
//		printf("[%s:%d] init image => done: %s\n", __FILE__, __LINE__, "red.ppm");

	} else {

		printf("[%s:%d] init image => NOT done: %s\n", __FILE__, __LINE__, fname_Out);
//		printf("[%s:%d] init image => NOT done: %s\n", __FILE__, __LINE__, "red.ppm");

	}

//	init_Image("red.ppm", 480, 640);

//	unsigned char image[480][640][3];
//	int x,y;
//	FILE *fp;
//
////	fp=fopen(fpath_In_Full, "wb");
//	fp=fopen("white.ppm","wb");
//
//	fprintf(fp,"P6\n#←シャープでコメントも入れられる\n640 480\n255\n"); //ヘッダの書き込み
//
//	for(y=0;y<480;y++){
//	  for(x=0;x<640;x++){
//	    image[y][x][0]=image[y][x][1]=image[y][x][2]=0xff;
//	  }
//	}
//
//	fwrite(image,sizeof(char),640*480*3,fp); //データの書き込み
//	fclose(fp);

	return 0;

}

///////////////////////////////
//
// init_Image
//	@param
//		fname_Out	output file name
//		image		image data
//		x			width of the image
//		y			height of the image
//
///////////////////////////////
//void init_Image(char *fname_Out, unsigned char image[][][3]) {
int init_Image
//(char *fname_Out, unsigned char *image, int x, int y) {
//(char *fname_Out, unsigned char image[][][3], int x, int y) {
(char *fname_Out, int x, int y) {

	unsigned char image[y][x][3];

	char header[100];	// ppm header string
//	char header[50];	// ppm header string

//	int x,y;

	FILE *fp;

	fp=fopen(fname_Out,"wb");
//	fp=fopen("white.ppm","wb");

	// validate
	if (fp == NULL) {

		printf("[%s:%d] can't open the file: %s\n", __FILE__, __LINE__, fname_Out);

		return -1;

	}

	// prep: header
	sprintf(header, "P6\n#←シャープでコメントも入れられる\n%d %d\n255\n", x, y);


	// write header
	fprintf(fp, header); //ヘッダの書き込み
//	fprintf(fp,"P6\n#←シャープでコメントも入れられる\n640 480\n255\n"); //ヘッダの書き込み

	// init pixels
	int i,j;

	for(j=0; j < y; j++){

	  for(i=0; i < x; i++){

	    image[j][i][0] = 0x00;
	    image[j][i][1] = 0xff;
	    image[j][i][2] = 0xff;

	  }

	}

	fwrite(image,sizeof(char),x*y*3,fp); //データの書き込み
//	fwrite(image,sizeof(char),640*480*3,fp); //データの書き込み

	fclose(fp);

	///////////////////////////////
	//
	// return
	//
	 ///////////////////////////////
	return 1;

}//int init_Image

///////////////////////////////
//
// init_Image
//	@param
//		fname_Out	output file name
//		image		image data
//		x			width of the image
//		y			height of the image
//
///////////////////////////////
//void init_Image(char *fname_Out, unsigned char image[][][3]) {
int init_Image_Colors
(char *fname_Out, int x, int y, int r, int g, int b) {

	unsigned char image[y][x][3];

	char header[100];	// ppm header string
//	char header[50];	// ppm header string

//	int x,y;

	FILE *fp;

	fp=fopen(fname_Out,"wb");
//	fp=fopen("white.ppm","wb");

	// validate
	if (fp == NULL) {

		printf("[%s:%d] can't open the file: %s\n", __FILE__, __LINE__, fname_Out);

		return -1;

	}

	// prep: header
	sprintf(header, "P6\n#←シャープでコメントも入れられる\n%d %d\n255\n", x, y);


	// write header
	fprintf(fp, header); //ヘッダの書き込み
//	fprintf(fp,"P6\n#←シャープでコメントも入れられる\n640 480\n255\n"); //ヘッダの書き込み

	// init pixels
	int i,j;

	for(j=0; j < y; j++){

	  for(i=0; i < x; i++){

	    image[j][i][0] = r;
	    image[j][i][1] = g;
	    image[j][i][2] = b;

	  }

	}

	fwrite(image,sizeof(char),x*y*3,fp); //データの書き込み
//	fwrite(image,sizeof(char),640*480*3,fp); //データの書き込み

	fclose(fp);

	///////////////////////////////
	//
	// return
	//
	 ///////////////////////////////
	return 1;

}//int init_Image

