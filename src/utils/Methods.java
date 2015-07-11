package utils;


import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.DataOutputStream;
import java.io.File;
import java.io.FileFilter;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.nio.channels.FileChannel;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Calendar;
import java.util.Collections;
import java.util.Comparator;
import java.util.Date;
import java.util.Iterator;
import java.util.List;
import java.util.Locale;
import java.util.concurrent.TimeUnit;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import org.apache.commons.lang.StringUtils;

//import org.apache.commons.net.ftp.FTPReply;

public class Methods {

	static int counter;		// Used => sortFileList()
	
	
	/****************************************
	 * Vars
	 ****************************************/
	public static final int vibLength_click = 35;

	static int tempRecordNum = 20;

	public static long getMillSeconds(int year, int month, int date) {
		// Calendar
		Calendar cal = Calendar.getInstance();
		
		// Set time
		cal.set(year, month, date);
		
		// Date
		Date d = cal.getTime();
		
		return d.getTime();
		
	}//private long getMillSeconds(int year, int month, int date)

	/****************************************
	 *	getMillSeconds_now()
	 * 
	 * <Caller> 
	 * 1. ButtonOnClickListener # case main_bt_start
	 * 
	 * <Desc> 1. <Params> 1.
	 * 
	 * <Return> 1.
	 * 
	 * <Steps> 1.
	 ****************************************/
	public static long getMillSeconds_now() {
		
		Calendar cal = Calendar.getInstance();
		
		return cal.getTime().getTime();
		
	}//private long getMillSeconds_now(int year, int month, int date)

	/*******************************
	 * format: yyyyMMdd_HHmmss
	 *******************************/
	public static String get_TimeLabel(long millSec) {
		
		 SimpleDateFormat sdf1 = new SimpleDateFormat("yyyyMMdd_HHmmss");
		 
		return sdf1.format(new Date(millSec));
		
	}//public static String get_TimeLabel(long millSec)

	public static String convert_intSec2Digits(int t) {
		
		int sec = t % 60;
		
		if (t / 60 < 1) {
			
//			return "00:00:" + String.valueOf(sec);
			return "00:00:" + Methods.convert_sec2digits(sec, 2);
			
		}//if (t / 60 < 1)
		
//		int min = (t - sec) % 60;
		int min = ((t - sec) % (60 * 60)) / 60;
		
		if ((t - sec) / (60 * 60) < 1) {
			
//			return "00:" + String.valueOf(min) + ":" + String.valueOf(sec);
			return "00:"
				+ Methods.convert_sec2digits(min, 2) + ":"
				+ Methods.convert_sec2digits(sec, 2);
			
		}//if (variable == condition)
		
//		int hour = (t - min) / 60;
		int hour = (t - sec) / (60 * 60);
				
//		return String.valueOf(hour) + ":"
//				+ String.valueOf(min) + ":"
//				+ String.valueOf(sec);

		return Methods.convert_sec2digits(min, 2) + ":"
			+ Methods.convert_sec2digits(min, 2) + ":"
			+ Methods.convert_sec2digits(sec, 2);

		
	}//public static String convert_intSec2Digits(int time)

	/***************************************
	 * 20130320_120437<br>
	 * @param t ... Value in seconds, <i>not</i> in mill seconds
	 ***************************************/
	public static String convert_intSec2Digits_lessThanHour(int t) {
		
		int sec = t % 60;
		
		if (t / 60 < 1) {
			
//			return "00:00:" + String.valueOf(sec);
//			return "00:00:" + Methods.convert_sec2digits(sec, 2);
			return "00:" + Methods.convert_sec2digits(sec, 2);
			
		}//if (t / 60 < 1)
		
//		int min = (t - sec) % 60;
		int min = ((t - sec) % (60 * 60)) / 60;
		
		return Methods.convert_sec2digits(min, 2) + ":"
			+ Methods.convert_sec2digits(sec, 2);
			
	}//public static String convert_intSec2Digits(int time)

	private static String convert_sec2digits(int sec, int i) {
		
		int current_len = String.valueOf(sec).length();
		
		if (current_len < i) {
			
			StringBuilder sb = new StringBuilder();
			
			for (int j = 0; j < i - current_len; j++) {
				
				sb.append("0");
			}
			
			sb.append(String.valueOf(sec));
			
			return sb.toString();
			
		}//if (current_len == condition)
		
		return String.valueOf(sec);
		
	}//private static String convert_sec2digits(int sec, int i)

	public static int getArrayIndex(String[] targetArray, String targetString) {
		int index = -1;
		
		for (int i = 0; i < targetArray.length; i++) {
			
			if (targetArray[i].equals(targetString)) {
				
				index = i;
				
				break;
				
			}//if (targetArray[i] == )
			
		}//for (int i = 0; i < targetArray.length; i++)
		
		return index;
	}//public static int getArrayIndex(String[] targetArray, String targetString)

	/******************************
		Format => yyyy/MM/dd hh:mm:ss.SSS
	 ******************************/
	public static String
	conv_MillSec_to_TimeLabel(long millSec)
	{
		//REF http://stackoverflow.com/questions/7953725/how-to-convert-milliseconds-to-date-format-in-android answered Oct 31 '11 at 12:59
		String dateFormat = CONS.Admin.format_Date;
//		String dateFormat = "yyyy/MM/dd hh:mm:ss.SSS";
		
		DateFormat formatter = new SimpleDateFormat(dateFormat);

		// Create a calendar object that will convert the date and time value in milliseconds to date. 
		Calendar calendar = Calendar.getInstance();
		
		calendar.setTimeInMillis(millSec);
		
		return formatter.format(calendar.getTime());
		
	}//conv_MillSec_to_TimeLabel(long millSec)

	public static long
	conv_TimeLabel_to_MillSec(String timeLabel)
//	conv_MillSec_to_TimeLabel(long millSec)
	{
//		String input = "Sat Feb 17 2012";
		Date date;
		try {
			date = new SimpleDateFormat(
						CONS.Admin.format_Date, Locale.JAPAN).parse(timeLabel);
			
			return date.getTime();
//			long milliseconds = date.getTime();
			
		} catch (ParseException e) {
			// TODO Auto-generated catch block
//			e.printStackTrace();
			return -1;
			
		}
		
	}//conv_TimeLabel_to_MillSec(String timeLabel)
	
	/******************************
		REF http://stackoverflow.com/questions/625433/how-to-convert-milliseconds-to-x-mins-x-seconds-in-java answered Mar 9 '09 at 10:01
	 ******************************/
	public static String
	conv_MillSec_to_ClockLabel(long millSec)
	{
		return String.format(
			Locale.JAPAN,
			CONS.Admin.format_Clock, 
//			"%02d:%02d", 
			TimeUnit.MILLISECONDS.toMinutes(millSec),
			TimeUnit.MILLISECONDS.toSeconds(millSec) - 
			TimeUnit.MINUTES.toSeconds(TimeUnit.MILLISECONDS.toMinutes(millSec))
		);
		
	}//conv_MillSec_to_ClockLabel(long millSec)
	
	public static long
	conv_ClockLabel_to_MillSec(String clockLabel)
	{
		
		String[] tokens = clockLabel.split(":");
		
		/******************************
			Validate
		 ******************************/
		if (tokens == null || tokens.length != 2) {

			return -1;
			
		}
		
		/******************************
			Build: long number
		 ******************************/
		long mill_Min = Integer.parseInt(tokens[0]) * (60 * 1000);
		long mill_Sec = Integer.parseInt(tokens[1]) * (1000);
		
		return mill_Min + mill_Sec;
		
//		SimpleDateFormat formatter = 
//				new SimpleDateFormat("mm:ss"); // I assume d-M, you may refer to M-d for month-day instead.
////		new SimpleDateFormat("d-M-yyyy hh:mm"); // I assume d-M, you may refer to M-d for month-day instead.
//		Date date;
//		try {
//			
//			date = formatter.parse(clockLabel);
//			return date.getTime();
//			
//		} catch (ParseException e) {
//			// TODO Auto-generated catch block
//			// Log
//			String msg_Log = "Exception: " + e.toString();
//			Log.e("Methods.java" + "["
//					+ Thread.currentThread().getStackTrace()[2].getLineNumber()
//					+ "]", msg_Log);
//			
//			return -1;
//			
//		} // You will need try/catch around this
//		long millis = date.getTime();
		
	}//conv_ClockLabel_to_MillSec(String clockLabel)

	public static void 
	create_PPM_File(String fname) {
		
		File fout = new File(fname);
		
		try {
			
			FileWriter fw = new FileWriter(fout.getAbsoluteFile());
			
			BufferedWriter bw = new BufferedWriter(fw);

			//REF http://stackoverflow.com/questions/6981555/how-to-output-binary-data-to-a-file-in-java answered Aug 8 '11 at 11:47
			DataOutputStream os = new DataOutputStream(new FileOutputStream(fout.getAbsoluteFile()));
//			DataOutputStream os = new DataOutputStream(new FileOutputStream("C:\\binout.dat"));
			
			///////////////////////////////////
			//
			// header
			//
			///////////////////////////////////
			int x = 480;
			int y = 400;
			
			String arg;
			arg = String.format(Locale.JAPAN, 
					"P6\n# OutputStream\n%d %d\n255\n", 
					x, y
			);
			
			os.writeBytes(arg);
			
//			bw.write(arg);

			int image[][][] = new int[y][x][3];
			
			for(int j=0; j < y; j++){

				  for(int i=0; i < x; i++){

				    image[j][i][0] = 0x00;
				    image[j][i][1] = 0x00;
//				    image[j][i][1] = 0xff;
				    image[j][i][2] = 0xff;

				  }

			}

			for(int j=0; j < y; j++){
				
				for(int i=0; i < x; i++){
					
					os.write(image[j][i][0]);
					os.write(image[j][i][1]);
					os.write(image[j][i][2]);
					
//					image[j][i][0] = 0x00;
//					image[j][i][1] = 0xff;
//					image[j][i][2] = 0xff;
					
				}
				
			}
			
			
			bw.close();
			os.close();
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] file => closed: %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), fout.getAbsolutePath());

			System.out.println(msg);
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}//create_PPM_File(String fname)

	public static void 
	create_PPM_File(String fname, int[][][] data, int x, int y) {
		
		File fout = new File(fname);
		
		try {
			
//			FileWriter fw = new FileWriter(fout.getAbsoluteFile());
//			
//			BufferedWriter bw = new BufferedWriter(fw);
			
			//REF http://stackoverflow.com/questions/6981555/how-to-output-binary-data-to-a-file-in-java answered Aug 8 '11 at 11:47
			DataOutputStream os = new DataOutputStream(new FileOutputStream(fout.getAbsoluteFile()));
//			DataOutputStream os = new DataOutputStream(new FileOutputStream("C:\\binout.dat"));
			
			///////////////////////////////////
			//
			// header
			//
			///////////////////////////////////
//			int x = 480;
//			int y = 400;
			
			String arg;
			arg = String.format(Locale.JAPAN, 
					"P6\n# OutputStream\n%d %d\n255\n", 
					x, y
					);
			
			os.writeBytes(arg);
			
//			bw.write(arg);
			
//			int image[][][] = new int[y][x][3];
//			
//			for(int j=0; j < y; j++){
//				
//				for(int i=0; i < x; i++){
//					
//					image[j][i][0] = 0x00;
//					image[j][i][1] = 0x00;
////				    image[j][i][1] = 0xff;
//					image[j][i][2] = 0xff;
//					
//				}
//				
//			}
			
			for(int j=0; j < y; j++){
				
				for(int i=0; i < x; i++){
					
					os.write(data[j][i][0]);
					os.write(data[j][i][1]);
					os.write(data[j][i][2]);
					
//					image[j][i][0] = 0x00;
//					image[j][i][1] = 0xff;
//					image[j][i][2] = 0xff;
					
				}
				
			}
			
			
//			bw.close();
			os.close();
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] file => closed: %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), fout.getAbsolutePath());
			
			System.out.println(msg);
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}//create_PPM_File(String fname)
	
	/*******************************
	 * 
	 * @param data		=> data to expand  e.g. {1,2,3,...,255}<br>
	 * @param len		=> length of <b>data</b><br>
	 * @param x		=> width of the new ppm image (in pixels)<br>
	 * @param y		=> height of the new ppm image (in pixels)<br>
	 * 
	 * @return
	 * An integer array of expanded data<br>
	 * 
	 * 		e.g. {1,1,1,2,2,2,3,3,3,..., 244,244,255,255}
	 * 
	 *******************************/
	public static int[]
	expand_Array(int data[], int len, int x, int y) {

		///////////////////////////////////
		//
		// vars
		//
		///////////////////////////////////
		// counter for for-loop
		int i,j;

		///////////////////////////////////
		//
		// len max: max cell sequence number of the new ppm file
		//	e.g. source is of 480 x 400
		//		=> max cell(i.e. 479, 399) value
		//
		///////////////////////////////////
//		int len_Max = (x + y);
		int len_Max = (x + y) - 1;
		
		// quo
		int quo = len_Max / len;
		  
		// residue
		int resi = len_Max - (len * quo);

		//debug
		String msg;
		msg = String.format(Locale.JAPAN, 
				"[%s : %d] len = %d / x = %d / y = %d\nlen_Max = %d / quo = %d / resi = %d", 
				Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), 
				
				len, x, y,
				len_Max, quo, resi
				
		);

		System.out.println(msg);
		


		///////////////////////////////
		//
		// expand
		//
		 ///////////////////////////////
		// new data array
		int[] data_New = new int[len_Max];

		///////////////////////////////////
		//
		// build: +1 items
		//
		//		length => quo + 1
		//
		///////////////////////////////////
		// counter for the new data array
		int cnt_New = 0;
		
		// counter for the original data array
		int cnt_Data = 0;
		
		// input numbers
		for (i = 0; i < resi; i++) {
			
			for (j = 0; j < (quo + 1); j++) {
				
				data_New[cnt_New] = data[cnt_Data];
				
				cnt_New ++;
				
			}//for (j = 0; j < (quo + 1); j++)
			
			cnt_Data ++;
			
		}//for (i = 0; i < resi; i++)

		///////////////////////////////////
		//
		// build: +0 items
		//
		//		length => quo
		//
		///////////////////////////////////
		// array length of the items
		//	which are to have the numbers of quo
		int len_PlusZero = data.length - resi;
		
		for (i = 0; i < len_PlusZero; i++) {
			
			for (j = 0; j < quo; j++) {
				
				data_New[cnt_New] = data[cnt_Data];
				
				cnt_New ++;
				
			}//for (j = 0; j < (quo + 1); j++)
			
			cnt_Data ++;
			
		}//for (i = 0; i < resi; i++)
		
		///////////////////////////////
		//
		// report
		//
		///////////////////////////////
////		int tmp = (len_Max - 10 < 1) ? len_Max : 10;
//		
//		for (i = 0; i < len_Max; i++) {
////			for (i = 0; i < tmp; i++) {
////			for (i = 0; i < 10; i++) {
//			
////			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] data_New[%d] => %d", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), i, data_New[i]);
//
//			System.out.println(msg);
//			
//			
//		}
		
		
		///////////////////////////////////
		//
		// return
		//
		///////////////////////////////////
		return data_New;
//		return null;
		
	}//expand_Array(int data[])

	public static int[][][] 
	build_PPM_Data(int[] data_New, int x, int y) {
		
		int[][][] ppm_Data = new int[y][x][3];
		
		// offset: used for the index of data_New
		int x_Offset = 0;
		
		// height
		for (int i = 0; i < y; i++) {
			
			// width
			for (int j = 0; j < x; j++) {
			
				// set values
				ppm_Data[i][j][0] = data_New[j + x_Offset];
				ppm_Data[i][j][1] = data_New[j + x_Offset];
				ppm_Data[i][j][2] = data_New[j + x_Offset];
				
			}//for (int j = 0; j < x; j++)
			
			// increment the offset
			x_Offset ++;
			
		}//for (int i = 0; i < y; i++)
		
		
		return ppm_Data;
		
	}//build_PPM_Data(int[] data_New, int x, int y)

	public static int[][][] 
	build_PPM_Circle(int x, int y) {
		
		// ppm data
		int[][][] data = new int[y][x][3];

		// center coordinate
		int center_X = x / 2;
		int center_Y = y / 2;
		
		// array of radiuses
		int numOf_Circles = 6;
		
		int[] rs = new int[numOf_Circles];

		int unit = center_X / numOf_Circles;
		
		for (int i = 0; i < numOf_Circles; i++) {
			
			rs[i] = i * unit;
			
		}
		
		// array of color sets
		int[][] col_Set = Methods.get_ColSet(numOf_Circles);

		///////////////////////////////////
		//
		// build: ppm data
		//
		///////////////////////////////////
		int dist;
		
		int color_Num;
		
		int dist_x, dist_y;
		
		int dist_Quotient;
		
		for (int i = 0; i < y; i++) {
			
			for (int j = 0; j < x; j++) {
				
				///////////////////////////////////
				//
				// judge: distance
				//
				///////////////////////////////////
				dist_x = Math.abs(center_X - j);
				dist_y = Math.abs(center_Y - i);
				
				dist = (int) Math.sqrt(
								Math.pow((double) dist_x, 2) 
								+ Math.pow((double) dist_y, 2));
				
				dist_Quotient = dist / unit;
				
				switch (dist_Quotient) {
				case 0: color_Num = dist_Quotient; break;
				case 1: color_Num = dist_Quotient; break;
				case 2: color_Num = dist_Quotient; break;
				case 3: color_Num = dist_Quotient; break;
				case 4: color_Num = dist_Quotient; break;
//				case 5: color_Num = dist_Quotient + 1; break;
				case 5: color_Num = dist_Quotient; break;
//				case 6: color_Num = dist_Quotient - 1; break;

				default: color_Num = 6; break;
//				default: color_Num = 5; break;
				
				}
				
//				// judge
////				dist < (unit * 3) ? color_Num = 0 : color_Num = 1;
//				if (dist < (unit * 3)) {
//					
//					color_Num = 0;
//					
//				} else {//if (dist < (unit * 3))
//					
//					color_Num = 1;
//					
//				}//if (dist < (unit * 3))
				
				
				for (int k = 0; k < 3; k++) {
					
					data[i][j][k] = col_Set[color_Num][k];
//					data[i][j][k] = col_Set[0][k];
					
				}
				
			}
			
		}
		
		///////////////////////////////////
		//
		// report
		//
		///////////////////////////////////
		String msg;
		msg = String.format(Locale.JAPAN, 
				"[%s : %d] x = %d, y = %d / center_X = %d, center_Y = %d", 
				Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), 
				x, y, center_X, center_Y
		);

		System.out.println(msg);

		// radiuses
		for (int i = 0; i < numOf_Circles; i++) {
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] rs[%d] => %d", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), i, rs[i]);

			System.out.println(msg);
			;
			
		}
		
		return data;
		
	}//build_PPM_Circle(int x, int y)

	private static int[][] 
	get_ColSet(int numOf_Circles) {
		// TODO Auto-generated method stub
		int[][] col_Set = new int [numOf_Circles + 1][3];
//		int[][] col_Set = new int [numOf_Circles][3];

		// light blue: 33FFFF
		col_Set[0][0] = 0x33;
		col_Set[0][1] = 0xFF;
		col_Set[0][2] = 0xFF;
		
		// pink: FF66CC
		col_Set[1][0] = 0xff;
		col_Set[1][1] = 0x66;
		col_Set[1][2] = 0xcc;
		
		// yellow: ffff33
		col_Set[2][0] = 0xff;
		col_Set[2][1] = 0xff;
		col_Set[2][2] = 0x33;
		
		// blue: 0000ff
		col_Set[3][0] = 0x00;
		col_Set[3][1] = 0x00;
		col_Set[3][2] = 0xff;
		
		// green: 
		col_Set[4][0] = 0x00;
		col_Set[4][1] = 0xff;
		col_Set[4][2] = 0x00;
		
		// red: 
		col_Set[5][0] = 0xff;
		col_Set[5][1] = 0x00;
		col_Set[5][2] = 0x00;

		// blank: 
		col_Set[5][0] = 0x00;
		col_Set[5][1] = 0x00;
		col_Set[5][2] = 0x00;
		
		// return
		return col_Set;
		
	}

}//public class Methods

