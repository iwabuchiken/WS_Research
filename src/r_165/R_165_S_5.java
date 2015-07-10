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

		s_8_Gradation();
//		s_7_Epand_Array();
		
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

	private static void 
	s_8_Gradation() {
		// TODO Auto-generated method stub

		///////////////////////////////////
		//
		// prep: data
		//
		///////////////////////////////////
		int[] data = new int[256];
		
		for (int i = 0; i < 256; i++) {
			
			data[i] = i;
			
		}
		
		int len = data.length;
		
		int x = 480;
		int y = 400;
		
		int[] data_New = Methods.expand_Array(data, len, x, y);
		
		String msg;
		msg = String.format(Locale.JAPAN, 
				"[%s : %d] data_New.length => %d\ns_8_Gradation => done", 
				Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber()
				
				, data_New.length
		);

		System.out.println(msg);

		///////////////////////////////////
		//
		// report
		//
		///////////////////////////////////
		int tmp = data_New.length;
		
		for (int i = tmp - 50; i < tmp; i++) {
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] data_New[%d] => %d", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), i, data_New[i]);

			System.out.println(msg);
			
		}
		
		///////////////////////////////////
		//
		// build: PPM
		//
		///////////////////////////////////
		int[][][] ppm_Data = Methods.build_PPM_Data(data_New, x, y);
		
		// validate
		if (ppm_Data == null) {
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] ppm_Data => null", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber());

			System.out.println(msg);
			
			
		} else {//if (ppm_Data == null)
			
//			String msg;
			msg = String.format(Locale.JAPAN, 
					"[%s : %d] ppm_Data[0].length => %d", 
					Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), 
					ppm_Data[0].length);

			System.out.println(msg);
			
			// 1st line
			for (int i = 0; i < 3; i++) {
				
//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] ppm_Data[%d][0][%d] => %d", 
						Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber(), 
						0, i, ppm_Data[0][0][i]);

				System.out.println(msg);
				
			}

			// last line, first column
			for (int i = 0; i < 3; i++) {
				
//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] ppm_Data[%d][0][%d] => %d", 
						Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber(), 
						(y - 1), i, ppm_Data[y - 1][0][i]);

				System.out.println(msg);
				
			}
			
			// last line, last column
			for (int i = 0; i < 3; i++) {
				
//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] ppm_Data[%d][%d][%d] => %d", 
						Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber(), 
								(y - 1), (x - 1), i, ppm_Data[y - 1][(x - 1)][i]);
				
				System.out.println(msg);
				
			}
			
		}//if (ppm_Data == null)

		///////////////////////////////////
		//
		// ppm file
		//
		///////////////////////////////////
//		String dpath_Dst = "C:/WORKS/WS/WS_Research/R.150-199/R.165_image-proccessing/data/s-5";
//		
//		String fname = "test_java." 
////				String fname = "test_java" 
//					+ Methods.get_TimeLabel(Methods.getMillSeconds_now()) 
//					+ ".ppm";
////		String fname = "test_java.ppm";
//
//		// create
//		Methods.create_PPM_File(dpath_Dst + "/" + fname, ppm_Data, x, y);
////		Methods.create_PPM_File(fname, ppm_Data, x, y);
		
	}//s_8_Gradation()

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
