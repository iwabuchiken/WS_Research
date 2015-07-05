/*
 * lib.h
 *
 *  Created on: 2015/07/05
 *      Author: kbuchi
 */

#ifndef LIB_H_
#define LIB_H_



///////////////////////////////
//
// protos
//
 ///////////////////////////////
//int init_Image(char *, unsigned char[][][3], int, int);
int init_Image(char *, int, int);

int init_Image_Colors
(char *, int, int, int, int, int);

int init_Image_Gradation
(char *, int, int);

int init_Image_Gradation_2
(char *, int, int);

int isnumeric(char *);

int* expand_Array(int*, int);

#endif /* LIB_H_ */
