/*
 * lib.c
 *
 *  Created on: 2015/07/05
 *      Author: kbuchi
 */

#ifndef LIB_H_
#include "lib.h"
#endif

#ifndef STDIO_H_
#include <stdio.h>
#endif

#ifndef STDLIB_H_
#include <stdlib.h>
#endif

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
// init_Image_Colors
//	@param
//		fname_Out	output file name
//		image		image data
//		x			width of the image
//		y			height of the image
//
//	gradation => from x0 to xlast
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

///////////////////////////////
//
// init_Image
//	@param
//		fname_Out	output file name
//		x			width of the image
//		y			height of the image
//
///////////////////////////////
//void init_Image(char *fname_Out, unsigned char image[][][3]) {
int init_Image_Gradation
(char *fname_Out, int x, int y) {

	unsigned char image[y][x][3];

	char header[100];	// ppm header string

	FILE *fp;

	fp=fopen(fname_Out,"wb");

	// validate
	if (fp == NULL) {

		printf("[%s:%d] can't open the file: %s\n", __FILE__, __LINE__, fname_Out);

		return -1;

	}

	// prep: header
	sprintf(header, "P6\n#←シャープでコメントも入れられる\n%d %d\n255\n", x, y);


	// write header
	fprintf(fp, header); //ヘッダの書き込み

	// init pixels
	int i,j;

	int val;

	for(j=0; j < y; j++){

	  for(i=0; i < x; i++){

	    image[j][i][0] = (float)i / x * 255;
	    image[j][i][1] = (float)i / x * 255;
	    image[j][i][2] = (float)i / x * 255;

	  }

	}

	fwrite(image,sizeof(char),x*y*3,fp); //データの書き込み

	fclose(fp);

	///////////////////////////////
	//
	// return
	//
	 ///////////////////////////////
	return 1;

}//int init_Image_Gradation

///////////////////////////////
//
// init_Image_Gradation_2
//	@param
//		fname_Out	output file name
//		x			width of the image
//		y			height of the image
//
//	gradation from: x0, y0 to xlast, ylast
//
///////////////////////////////
//void init_Image(char *fname_Out, unsigned char image[][][3]) {
int init_Image_Gradation_2
(char *fname_Out, int x, int y) {

	unsigned char image[y][x][3];

	char header[100];	// ppm header string

	FILE *fp;

	fp=fopen(fname_Out,"wb");

	// validate
	if (fp == NULL) {

		printf("[%s:%d] can't open the file: %s\n", __FILE__, __LINE__, fname_Out);

		return -1;

	}

	// prep: header
	sprintf(header, "P6\n#←シャープでコメントも入れられる\n%d %d\n255\n", x, y);


	// write header
	fprintf(fp, header); //ヘッダの書き込み

	// init pixels
	int i,j;

	int val;

	int cnt_X = 0, cnt_Y = 0, off_X = 0;

	int n1 = (x + y) - 1;

	int max_X = n1 - (y - 1);
	int max_Y = n1 - (x - 1);

	for(j=0; j < y; j++){

	  for(i=0; i < x; i++){

	    image[j][i][0] = cnt_X + off_X;
	    image[j][i][1] = cnt_X + off_X;
	    image[j][i][2] = cnt_X + off_X;

	    cnt_X ++;

	  }

	  // reset
	  cnt_X = 0;

	  // incre offset
	  off_X ++;

	}

	fwrite(image,sizeof(char),x*y*3,fp); //データの書き込み

	fclose(fp);

	///////////////////////////////
	//
	// return
	//
	 ///////////////////////////////
	return 1;

}//int init_Image_Gradation

///////////////////////////////
//
// init_Image_Gradation_3
//	@param
//		fname_Out	output file name
//		x			width of the image
//		y			height of the image
//
//	gradation from: x0, y0 to xlast, ylast
//
///////////////////////////////
//void init_Image(char *fname_Out, unsigned char image[][][3]) {
int init_Image_Gradation_3
(char *fname_Out, int x, int y) {


	///////////////////////////////
	//
	// return
	//
	 ///////////////////////////////
	return 1;

}//init_Image_Gradation_3


//REF http://www.linuxquestions.org/questions/programming-9/c-equivalent-of-java%27s-isnumeric-287888/ 02-08-2005, 07:36 PM
int isnumeric(char *str)
{
  while(*str)
  {
    if(!isdigit(*str))
      return 0;
    str++;
  }

  return 1;
}
