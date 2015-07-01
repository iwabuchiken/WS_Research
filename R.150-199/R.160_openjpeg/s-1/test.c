/*
 * test.c
 *
 *  Created on: 2015/06/29
 *      Author: kbuchi
 */

#include <stdio.h>

#include <stdlib.h>


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

	printf("[%s:%d] offset size => %d\n", __FILE__, __LINE__, File_h.bfOffBits);

	/* INFO HEADER */
	/* ------------- */

	Info_h.biSize = (DWORD)getc(IN);
	Info_h.biSize = (DWORD)(getc(IN) << 8) + Info_h.biSize;
	Info_h.biSize = (DWORD)(getc(IN) << 16) + Info_h.biSize;
	Info_h.biSize = (DWORD)(getc(IN) << 24) + Info_h.biSize;

	if(Info_h.biSize != 40)
	{
	    fprintf(stderr,"Error, unknown BMP header size %d\n", Info_h.biSize);
	    fclose(IN);
	    return NULL;
	}

	printf("[%s:%d] header size => %d\n", __FILE__, __LINE__, Info_h.biSize);

	Info_h.biWidth = (DWORD)getc(IN);
	Info_h.biWidth = (DWORD)(getc(IN) << 8) + Info_h.biWidth;
	Info_h.biWidth = (DWORD)(getc(IN) << 16) + Info_h.biWidth;
	Info_h.biWidth = (DWORD)(getc(IN) << 24) + Info_h.biWidth;
	w = (int)Info_h.biWidth;

	Info_h.biHeight = (DWORD)getc(IN);
	Info_h.biHeight = (DWORD)(getc(IN) << 8) + Info_h.biHeight;
	Info_h.biHeight = (DWORD)(getc(IN) << 16) + Info_h.biHeight;
	Info_h.biHeight = (DWORD)(getc(IN) << 24) + Info_h.biHeight;
	h = (int)Info_h.biHeight;

	printf("[%s:%d] bmp width => %d\n", __FILE__, __LINE__, Info_h.biWidth);

	printf("[%s:%d] bmp width => %d\n", __FILE__, __LINE__, Info_h.biHeight);

	printf("[%s:%d] bmp total => %d(3x = %d)\n", __FILE__, __LINE__,
					Info_h.biWidth * Info_h.biHeight,
					Info_h.biWidth * Info_h.biHeight * 3);

	Info_h.biPlanes = (WORD)getc(IN);
	Info_h.biPlanes = (WORD)((getc(IN) << 8) + Info_h.biPlanes);

	Info_h.biBitCount = (WORD)getc(IN);
	Info_h.biBitCount = (WORD)((getc(IN) << 8) + Info_h.biBitCount);

	Info_h.biCompression = (DWORD)getc(IN);
	Info_h.biCompression = (DWORD)(getc(IN) << 8) + Info_h.biCompression;
	Info_h.biCompression = (DWORD)(getc(IN) << 16) + Info_h.biCompression;
	Info_h.biCompression = (DWORD)(getc(IN) << 24) + Info_h.biCompression;

	Info_h.biSizeImage = (DWORD)getc(IN);
	Info_h.biSizeImage = (DWORD)(getc(IN) << 8) + Info_h.biSizeImage;
	Info_h.biSizeImage = (DWORD)(getc(IN) << 16) + Info_h.biSizeImage;
	Info_h.biSizeImage = (DWORD)(getc(IN) << 24) + Info_h.biSizeImage;

	printf("[%s:%d] bit count => %d\n", __FILE__, __LINE__, Info_h.biBitCount);

	printf("[%s:%d] bit compression => %d\n", __FILE__, __LINE__, Info_h.biCompression);

	printf("[%s:%d] image size => %d (residue = %d)\n", __FILE__, __LINE__,
						Info_h.biSizeImage, File_h.bfSize - Info_h.biSizeImage);

	Info_h.biXpelsPerMeter = (DWORD)getc(IN);
	Info_h.biXpelsPerMeter = (DWORD)(getc(IN) << 8) + Info_h.biXpelsPerMeter;
	Info_h.biXpelsPerMeter = (DWORD)(getc(IN) << 16) + Info_h.biXpelsPerMeter;
	Info_h.biXpelsPerMeter = (DWORD)(getc(IN) << 24) + Info_h.biXpelsPerMeter;

	Info_h.biYpelsPerMeter = (DWORD)getc(IN);
	Info_h.biYpelsPerMeter = (DWORD)(getc(IN) << 8) + Info_h.biYpelsPerMeter;
	Info_h.biYpelsPerMeter = (DWORD)(getc(IN) << 16) + Info_h.biYpelsPerMeter;
	Info_h.biYpelsPerMeter = (DWORD)(getc(IN) << 24) + Info_h.biYpelsPerMeter;

	Info_h.biClrUsed = (DWORD)getc(IN);
	Info_h.biClrUsed = (DWORD)(getc(IN) << 8) + Info_h.biClrUsed;
	Info_h.biClrUsed = (DWORD)(getc(IN) << 16) + Info_h.biClrUsed;
	Info_h.biClrUsed = (DWORD)(getc(IN) << 24) + Info_h.biClrUsed;

	Info_h.biClrImportant = (DWORD)getc(IN);
	Info_h.biClrImportant = (DWORD)(getc(IN) << 8) + Info_h.biClrImportant;
	Info_h.biClrImportant = (DWORD)(getc(IN) << 16) + Info_h.biClrImportant;
	Info_h.biClrImportant = (DWORD)(getc(IN) << 24) + Info_h.biClrImportant;

	printf("[%s:%d] pixels per meter (X) => %d\n", __FILE__, __LINE__, Info_h.biXpelsPerMeter);

	printf("[%s:%d] pixels per meter (Y) => %d\n", __FILE__, __LINE__, Info_h.biYpelsPerMeter);

	printf("[%s:%d] colors used => %d\n", __FILE__, __LINE__, Info_h.biClrUsed);

	printf("[%s:%d] colors used (important) => %d\n", __FILE__, __LINE__, Info_h.biClrImportant);

	///////////////////////////////
	//
	// read data
	//
	 ///////////////////////////////
	if (Info_h.biBitCount == 24)
	{

	    numcomps = 3;
	    color_space = OPJ_CLRSPC_SRGB;
	    /* initialize image components */
	    memset(&cmptparm[0], 0, 3 * sizeof(opj_image_cmptparm_t));

	    for(i = 0; i < numcomps; i++)
	    {
	        cmptparm[i].prec = 8;
	        cmptparm[i].bpp = 8;
	        cmptparm[i].sgnd = 0;
	        cmptparm[i].dx = (OPJ_UINT32)subsampling_dx;
	        cmptparm[i].dy = (OPJ_UINT32)subsampling_dy;
	        cmptparm[i].w = (OPJ_UINT32)w;
	        cmptparm[i].h = (OPJ_UINT32)h;
	    }

	    ///////////////////////////////
		//
		// create: image
		//
		 ///////////////////////////////
        image = opj_image_create((OPJ_UINT32)numcomps, &cmptparm[0], color_space);
        if(!image)
        {
            fclose(IN);
            return NULL;
        }

        /* set image offset and reference grid */
        image->x0 = (OPJ_UINT32)parameters->image_offset_x0;
        image->y0 = (OPJ_UINT32)parameters->image_offset_y0;
        image->x1 =	!image->x0 ? (OPJ_UINT32)(w - 1) * (OPJ_UINT32)subsampling_dx + 1 : image->x0 + (OPJ_UINT32)(w - 1) * (OPJ_UINT32)subsampling_dx + 1;
        image->y1 =	!image->y0 ? (OPJ_UINT32)(h - 1) * (OPJ_UINT32)subsampling_dy + 1 : image->y0 + (OPJ_UINT32)(h - 1) * (OPJ_UINT32)subsampling_dy + 1;

        printf("[%s:%d] image->x0 = %d\n", __FILE__, __LINE__, image->x0);
        printf("[%s:%d] image->y0 = %d\n", __FILE__, __LINE__, image->y0);

        printf("[%s:%d] image->x1 = %d\n", __FILE__, __LINE__, image->x1);
        printf("[%s:%d] image->y1 = %d\n", __FILE__, __LINE__, image->y1);

        /* set image data */

        /* Place the cursor at the beginning of the image information */
        fseek(IN, 0, SEEK_SET);
        fseek(IN, (long)File_h.bfOffBits, SEEK_SET);

        printf("[%s:%d] File_h.bfOffBits = %d\n", __FILE__, __LINE__, File_h.bfOffBits);


        W = Info_h.biWidth;
        H = Info_h.biHeight;

        printf("[%s:%d] Info_h.biWidth = %d / Info_h.biHeight = %d\n", __FILE__, __LINE__,

        		Info_h.biWidth, Info_h.biHeight

        );


        /* PAD = 4 - (3 * W) % 4; */
        /* PAD = (PAD == 4) ? 0 : PAD; */
        PAD = (3 * W) % 4 ? 4 - (3 * W) % 4 : 0;

        printf("[%s:%d] PAD = %d\n", __FILE__, __LINE__, PAD);


        RGB = (unsigned char *)
                malloc((3 * W + PAD) * H * sizeof(unsigned char));

        printf("[%s:%d] RGB size => %d\n", __FILE__, __LINE__, sizeof(RGB));

        if ( fread(RGB, sizeof(unsigned char), (3 * W + PAD) * H, IN) != (3 * W + PAD) * H )
        {
            free(RGB);
            opj_image_destroy(image);
            fprintf(stderr, "\nError: fread return a number of element different from the expected.\n");
            return NULL;
        }

        //debug
        else {

        	printf("[%s:%d] RGB validation => done\n", __FILE__, __LINE__);

        }


	    ///////////////////////////////
		//
		// report
		//
		 ///////////////////////////////
		printf("[%s:%d] read data => done\n", __FILE__, __LINE__);

	}//if (Info_h.biBitCount == 24)



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
