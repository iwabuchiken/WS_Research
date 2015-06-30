/*
 * test.c
 *
 *  Created on: 2015/06/29
 *      Author: kbuchi
 */

#include <stdio.h>

#include <zlib.h>
//#include <png.h>

#include "include/convert.h"
#include "include/openjpeg.h"
#include "include/convert.h"

//extern BITMAPFILEHEADER_t;
//extern typedef struct BITMAPFILEHEADER_t;

///////////////////////////////
//
// the below typedefs and structs
//		=> copied from convert.c
//
///////////////////////////////
#ifndef _CONVERT_C
#define _CONVERT_C

/* WORD defines a two byte word */
typedef unsigned short int WORD;

/* DWORD defines a four byte word */
typedef unsigned int DWORD;

typedef struct {
    WORD bfType;			/* 'BM' for Bitmap (19776) */
    DWORD bfSize;			/* Size of the file        */
    WORD bfReserved1;		/* Reserved : 0            */
    WORD bfReserved2;		/* Reserved : 0            */
    DWORD bfOffBits;		/* Offset                  */
} BITMAPFILEHEADER_t;

typedef struct {
    DWORD biSize;			/* Size of the structure in bytes */
    DWORD biWidth;		/* Width of the image in pixels */
    DWORD biHeight;		/* Heigth of the image in pixels */
    WORD biPlanes;		/* 1 */
    WORD biBitCount;		/* Number of color bits by pixels */
    DWORD biCompression;		/* Type of encoding 0: none 1: RLE8 2: RLE4 */
    DWORD biSizeImage;		/* Size of the image in bytes */
    DWORD biXpelsPerMeter;	/* Horizontal (X) resolution in pixels/meter */
    DWORD biYpelsPerMeter;	/* Vertical (Y) resolution in pixels/meter */
    DWORD biClrUsed;		/* Number of color used in the image (0: ALL) */
    DWORD biClrImportant;		/* Number of important color (0: ALL) */
} BITMAPINFOHEADER_t;

#endif	// up to here

///////////////////////////////
//
// protos
//
 ///////////////////////////////
opj_image_t* bmptoimage_TEST(const char *, opj_cparameters_t *);

int main() {

	///////////////////////////////
	//
	// test
	//
	 ///////////////////////////////
//	int tmp = int_floorlog2(3);
//	BITMAPFILEHEADER_t *header;	//=> n/w

	raw_comp_cparameters_t *t;

	printf("[%s:%d] raw_comp_cparameters_t => created\n", __FILE__, __LINE__);

	///////////////////////////////
	//
	// test: opj_cparameters_t
	//
	 ///////////////////////////////
	opj_cparameters_t param;
//	opj_cparameters_t *param;

	opj_set_default_encoder_parameters(&param);

	char *fpath_In = "C:/WORKS/WS/WS_Research/R.150-199/R.160_openjpeg/s-1/data/1.bmp";

	opj_image_t* image_t = bmptoimage_TEST(fpath_In, &param);
//	bmptoimage_TEST(fpath_In, param);

	printf("[%s:%d] image_t => %p\n", __FILE__, __LINE__, image_t);	//=> "opj_image_t*"


//	printf("[%s:%d] opj_cparameters_t => declared\n", __FILE__, __LINE__);
//
//	printf("[%s:%d] param.cp_fixed_alloc => %d\n", __FILE__, __LINE__, param.cp_fixed_alloc);
//
//	printf("[%s:%d] param.subsampling_dx => %d\n", __FILE__, __LINE__, param.subsampling_dx);
//
//	printf("[%s:%d] param.subsampling_dy => %d\n", __FILE__, __LINE__, param.subsampling_dy);

	printf("[%s:%d] done\n", __FILE__, __LINE__);

	return 0;

}

opj_image_t* bmptoimage_TEST
(const char *filename, opj_cparameters_t *parameters) {

	///////////////////////////////
	//
	// vars
	//
	 ///////////////////////////////
    int subsampling_dx = parameters->subsampling_dx;
    int subsampling_dy = parameters->subsampling_dy;

    int i, numcomps, w, h;
    OPJ_COLOR_SPACE color_space;
    opj_image_cmptparm_t cmptparm[3];	/* maximum of 3 components */

	opj_image_t * image = NULL;

    FILE *IN;
    BITMAPFILEHEADER_t File_h;
    BITMAPINFOHEADER_t Info_h;
    unsigned char *RGB;
    unsigned char *table_R, *table_G, *table_B;
    unsigned int j, PAD = 0;

    unsigned int x, y;
	int index;
	int gray_scale = 1;
	int has_color;
	DWORD W, H;

	///////////////////////////////
	//
	// open: file
	//
	 ///////////////////////////////
    IN = fopen(filename, "rb");
    if (!IN)
    {
        fprintf(stderr, "Failed to open %s for reading !!\n", filename);
        return NULL;
    }

    else {

    	printf("[%s:%d] file opened: %s\n", __FILE__, __LINE__, filename);

    }

    File_h.bfType = (WORD)getc(IN);

//    printf("[%s:%d] File_h.bfType => %x\n", __FILE__, __LINE__, File_h.bfType);

    WORD tmp = (WORD)getc(IN);
//    WORD tmp = (WORD)(getc(IN) << 8);

//    printf("[%s:%d] next char => %x\n", __FILE__, __LINE__, tmp);

//    tmp = tmp << 8;

    File_h.bfType = (WORD)((tmp << 8) + File_h.bfType);
//    File_h.bfType = (WORD)(tmp << 8 + File_h.bfType);
//    File_h.bfType = (WORD)(tmp + File_h.bfType);
//    File_h.bfType = (WORD)((getc(IN) << 8) + File_h.bfType);

//    printf("[%s:%d] File_h.bfType => %d\n", __FILE__, __LINE__, File_h.bfType);
//    printf("[%s:%d] File_h.bfType => %d\n", __FILE__, __LINE__, File_h.bfType);

    ///////////////////////////////
	//
	// validate
	//
	 ///////////////////////////////
    if (File_h.bfType != 19778)
    {
        fprintf(stderr,"Error, not a BMP file!\n");
        fclose(IN);
        return NULL;
    }

    else {

    	printf("[%s:%d] input file => a bitmap image\n", __FILE__, __LINE__);

    }

    ///////////////////////////////
	//
	// get data: file header
	//
	 ///////////////////////////////
    /* FILE HEADER */
    /* ------------- */
    File_h.bfSize = (DWORD)getc(IN);
    File_h.bfSize = (DWORD)(getc(IN) << 8) + File_h.bfSize;
    File_h.bfSize = (DWORD)(getc(IN) << 16) + File_h.bfSize;
    File_h.bfSize = (DWORD)(getc(IN) << 24) + File_h.bfSize;

    File_h.bfReserved1 = (WORD)getc(IN);
    File_h.bfReserved1 = (WORD)((getc(IN) << 8) + File_h.bfReserved1);

    File_h.bfReserved2 = (WORD)getc(IN);
    File_h.bfReserved2 = (WORD)((getc(IN) << 8) + File_h.bfReserved2);

    File_h.bfOffBits = (DWORD)getc(IN);
    File_h.bfOffBits = (DWORD)(getc(IN) << 8) + File_h.bfOffBits;
    File_h.bfOffBits = (DWORD)(getc(IN) << 16) + File_h.bfOffBits;
    File_h.bfOffBits = (DWORD)(getc(IN) << 24) + File_h.bfOffBits;

    printf("[%s:%d] file header data => obtained\n", __FILE__, __LINE__);

    printf("[%s:%d] file size => %d\n", __FILE__, __LINE__, File_h.bfSize);


    ///////////////////////////////
	//
	// close
	//
	 ///////////////////////////////
	fclose(IN);

	///////////////////////////////
	//
	// return
	//
	 ///////////////////////////////
	printf("[%s:%d] bmptoimage_TEST: returning image...\n", __FILE__, __LINE__);

	return image;

}
