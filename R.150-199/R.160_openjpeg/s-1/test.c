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

	printf("[%s:%d] opj_cparameters_t => declared\n", __FILE__, __LINE__);

	printf("[%s:%d] param.cp_fixed_alloc => %d\n", __FILE__, __LINE__, param.cp_fixed_alloc);

	printf("[%s:%d] done\n", __FILE__, __LINE__);

	return 0;

}
