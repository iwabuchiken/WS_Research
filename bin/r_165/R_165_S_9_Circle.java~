package r_165;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Locale;

import utils.Methods;

public class R_165_S_9_Circle {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		s_9_Circle();
		
	}

	private static void 
	s_9_Circle() {
		// TODO Auto-generated method stub
		
		int x = 480;
		int y = 400;

		///////////////////////////////////
		//
		// build: PPM
		//
		///////////////////////////////////
		int[][][] ppm_Data_Circle = Methods.build_PPM_Circle(x, y);

		///////////////////////////////////
		//
		// ppm file
		//
		///////////////////////////////////
		String dpath_Dst = "C:/WORKS/WS/WS_Research/R.150-199/R.165_image-proccessing/data/s-5";
		
		String fname = "circle." 
					+ Methods.get_TimeLabel(Methods.getMillSeconds_now()) 
					+ ".ppm";

		// create
		Methods.create_PPM_File(dpath_Dst + "/" + fname, ppm_Data_Circle, x, y);

	}//s_9_Circle()
	
}
