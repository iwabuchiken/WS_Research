package r_165;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Locale;

import utils.Methods;

public class R_165_S_5 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		s_7_Epand_Array();
		
//		///////////////////////////////////
//		//
//		// ppm file
//		//
//		///////////////////////////////////
//		String dpath_Dst = "C:/WORKS/WS/WS_Research/R.150-199/R.165_image-proccessing/data/s-5";
//		
//		String fname = "test_java." 
////				String fname = "test_java" 
//					+ Methods.get_TimeLabel(Methods.getMillSeconds_now()) 
//					+ ".ppm";
////		String fname = "test_java.ppm";
//		
//		Methods.create_PPM_File(dpath_Dst + "/" + fname);
////		R_165_S_5.create_PPM_File(dpath_Dst + "/" + fname);
////		R_165_S_5.create_PPM_File(fname);
//		
//		String msg;
//		msg = String.format(Locale.JAPAN, "[%s : %d] done", Thread
//				.currentThread().getStackTrace()[1].getFileName(), Thread
//				.currentThread().getStackTrace()[1].getLineNumber(), args);
//
//		System.out.println(msg);
		
		
	}

	private static void s_7_Epand_Array() {
		// TODO Auto-generated method stub
		
		int[] data = {1,2,3,4,5,6,7,8,9,10};
//		int[] data = {1,2,3,4};
		
		int len = data.length;
		
		int x = 100;
//		int x = 5;
		int y = 2;
		
//		int x = 480;
//		int y = 400;
		
		int[] data_New = Methods.expand_Array(data, len, x, y);
		
		String msg;
		msg = String.format(Locale.JAPAN, 
				"[%s : %d] data_New.length => %d\ns_7_Epand_Array => done", 
				Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber()
				
				, data_New.length
		);

		System.out.println(msg);
		
		
	}

	public static void create_PPM_File(String fname) {
		
		File fout = new File(fname);
		
		try {
			
			FileWriter fw = new FileWriter(fout.getAbsoluteFile());
			
			BufferedWriter bw = new BufferedWriter(fw);
			
			bw.write("yes!!!");
			
			bw.close();
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] file => closed: %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), fout.getAbsolutePath());

			System.out.println(msg);
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
		
	}
}
