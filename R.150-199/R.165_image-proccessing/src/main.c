/*
 * test.c
 *
 *  Created on: 2015/06/29
 *      Author: kbuchi
 */

//#include <windows.h>

#ifndef STDIO_H_
#include <stdio.h>
#endif

#ifndef STDLIB_H_
#include <stdlib.h>
#endif

#include <zlib.h>

#ifndef LIB_H_

#include "lib.h"

#endif

/////////////////////////////////
////
//// protos
////
// ///////////////////////////////
////int init_Image(char *, unsigned char[][][3], int, int);
//int init_Image(char *, int, int);
//
//int init_Image_Colors
//(char *, int, int, int, int, int);

void exec_Gradation(int argc, char *argv[]) {
//void exec_Gradation() {

	///////////////////////////////
	//
	// parameters
	//
	 ///////////////////////////////
//	printf("[%s:%d] argc => %d\n", __FILE__, __LINE__, argc);
//
//	// more than 1
//	if (argc > 1) {
//
//		printf("[%s:%d] argv[1] => %s\n", __FILE__, __LINE__, argv[1]);
//
//		int tmp = isnumeric(argv[1]);
//
//		if (tmp == 1) {
//
//			printf("[%s:%d] argv[1] => numeric (%d)\n", __FILE__, __LINE__, tmp);
//
//		} else {
//
//			printf("[%s:%d] argv[1] => NOT numeric (%d)\n", __FILE__, __LINE__, tmp);
//
//		}
//
//	}


	// s-3-2
	int x;
	int y;
//	int x = 450;
//	int y = 300;

	// set x, y
	if (argc == 3) {

//		int tmp = isnumeric(argv[1]);

		if (isnumeric(argv[1]) && isnumeric(argv[2])) {

			x = atoi(argv[1]);
			y = atoi(argv[2]);

		} else {

			x = 450;
			y = 300;

		}

	} else {

		x = 450;
		y = 300;

	}

	char fname_Out[50];

	sprintf(fname_Out, "grad_2_%d-%d.ppm", x, y);

	int result = init_Image_Gradation_3(fname_Out, x, y);
//	int result = init_Image_Gradation_2(fname_Out, x, y);
//	int result = init_Image_Gradation(fname_Out, x, y);


	printf("[%s:%d] exec_Gradation => result is %d\n", __FILE__, __LINE__, result);

}

//int main() {
int main(int argc, char *argv[]) {


	exec_Gradation(argc, argv);

////	printf("[%s:%d] main()\n", __FILE__, __LINE__);
//
//	///////////////////////////////
//	//
//	// vars
//	//
//	 ///////////////////////////////
//	char fname_In[] = "Pepper.bmp";
//	char fpath_In[] = "C:/WORKS/WS/WS_Research/R.150-199/R.165_image-proccessing/data/img_src";
//
//	char fpath_In_Full[100];
//
//	int result;	// result of init_Image()
//
//	int r = 100;
//	int g = 0;
//	int b = 0;
//
////	char fname_Out[] = "colors.ppm";
//	char fname_Out[50];
//	sprintf(fname_Out, "colors_%d-%d-%d.ppm", r, g, b);
//
////	char fname_Out[] = "red.ppm";
//
//	unsigned char image[480][440][3];
//
//	//REF http://www.cprogramminginfo.com/Functions/sprintf_Manual.php
//	sprintf(fpath_In_Full, "%s/%s", fpath_In, fname_In);
//
////	result = init_Image(fname_Out, image, 440, 480);
//	result = init_Image_Colors(fname_Out, 480, 440, r, g, b);
////	result = init_Image_Colors(fname_Out, 480, 440, 100, 100, 0);
////	result = init_Image(fname_Out, 480, 440);
////	result = init_Image("red.ppm", 480, 440);
//
//	if (result == 1) {
//
//		printf("[%s:%d] init image => done!!!: %s\n", __FILE__, __LINE__, fname_Out);
////		printf("[%s:%d] init image => done: %s\n", __FILE__, __LINE__, fname_Out);
////		printf("[%s:%d] init image => done: %s\n", __FILE__, __LINE__, "red.ppm");
//
//	} else {
//
//		printf("[%s:%d] init image => NOT done: %s\n", __FILE__, __LINE__, fname_Out);
////		printf("[%s:%d] init image => NOT done: %s\n", __FILE__, __LINE__, "red.ppm");
//
//	}
//
////	init_Image("red.ppm", 480, 640);
//
////	unsigned char image[480][640][3];
////	int x,y;
////	FILE *fp;
////
//////	fp=fopen(fpath_In_Full, "wb");
////	fp=fopen("white.ppm","wb");
////
////	fprintf(fp,"P6\n#←シャープでコメントも入れられる\n640 480\n255\n"); //ヘッダの書き込み
////
////	for(y=0;y<480;y++){
////	  for(x=0;x<640;x++){
////	    image[y][x][0]=image[y][x][1]=image[y][x][2]=0xff;
////	  }
////	}
////
////	fwrite(image,sizeof(char),640*480*3,fp); //データの書き込み
////	fclose(fp);

	return 0;

}

/////////////////////////////////
////
//// init_Image
////	@param
////		fname_Out	output file name
////		image		image data
////		x			width of the image
////		y			height of the image
////
/////////////////////////////////
////void init_Image(char *fname_Out, unsigned char image[][][3]) {
//int init_Image
////(char *fname_Out, unsigned char *image, int x, int y) {
////(char *fname_Out, unsigned char image[][][3], int x, int y) {
//(char *fname_Out, int x, int y) {
//
//	unsigned char image[y][x][3];
//
//	char header[100];	// ppm header string
////	char header[50];	// ppm header string
//
////	int x,y;
//
//	FILE *fp;
//
//	fp=fopen(fname_Out,"wb");
////	fp=fopen("white.ppm","wb");
//
//	// validate
//	if (fp == NULL) {
//
//		printf("[%s:%d] can't open the file: %s\n", __FILE__, __LINE__, fname_Out);
//
//		return -1;
//
//	}
//
//	// prep: header
//	sprintf(header, "P6\n#←シャープでコメントも入れられる\n%d %d\n255\n", x, y);
//
//
//	// write header
//	fprintf(fp, header); //ヘッダの書き込み
////	fprintf(fp,"P6\n#←シャープでコメントも入れられる\n640 480\n255\n"); //ヘッダの書き込み
//
//	// init pixels
//	int i,j;
//
//	for(j=0; j < y; j++){
//
//	  for(i=0; i < x; i++){
//
//	    image[j][i][0] = 0x00;
//	    image[j][i][1] = 0xff;
//	    image[j][i][2] = 0xff;
//
//	  }
//
//	}
//
//	fwrite(image,sizeof(char),x*y*3,fp); //データの書き込み
////	fwrite(image,sizeof(char),640*480*3,fp); //データの書き込み
//
//	fclose(fp);
//
//	///////////////////////////////
//	//
//	// return
//	//
//	 ///////////////////////////////
//	return 1;
//
//}//int init_Image
//
/////////////////////////////////
////
//// init_Image
////	@param
////		fname_Out	output file name
////		image		image data
////		x			width of the image
////		y			height of the image
////
/////////////////////////////////
////void init_Image(char *fname_Out, unsigned char image[][][3]) {
//int init_Image_Colors
//(char *fname_Out, int x, int y, int r, int g, int b) {
//
//	unsigned char image[y][x][3];
//
//	char header[100];	// ppm header string
////	char header[50];	// ppm header string
//
////	int x,y;
//
//	FILE *fp;
//
//	fp=fopen(fname_Out,"wb");
////	fp=fopen("white.ppm","wb");
//
//	// validate
//	if (fp == NULL) {
//
//		printf("[%s:%d] can't open the file: %s\n", __FILE__, __LINE__, fname_Out);
//
//		return -1;
//
//	}
//
//	// prep: header
//	sprintf(header, "P6\n#←シャープでコメントも入れられる\n%d %d\n255\n", x, y);
//
//
//	// write header
//	fprintf(fp, header); //ヘッダの書き込み
////	fprintf(fp,"P6\n#←シャープでコメントも入れられる\n640 480\n255\n"); //ヘッダの書き込み
//
//	// init pixels
//	int i,j;
//
//	for(j=0; j < y; j++){
//
//	  for(i=0; i < x; i++){
//
//	    image[j][i][0] = r;
//	    image[j][i][1] = g;
//	    image[j][i][2] = b;
//
//	  }
//
//	}
//
//	fwrite(image,sizeof(char),x*y*3,fp); //データの書き込み
////	fwrite(image,sizeof(char),640*480*3,fp); //データの書き込み
//
//	fclose(fp);
//
//	///////////////////////////////
//	//
//	// return
//	//
//	 ///////////////////////////////
//	return 1;
//
//}//int init_Image
//
