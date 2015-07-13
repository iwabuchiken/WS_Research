package r_165;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Locale;

import utils.Methods;

public class R_165_S_10_Edges {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		s_10_Edges();
		
	}

	private static void 
	s_10_Edges() {

		int[] data = {1,1,1,1,1,1, 9,9,9,9,9,9};
		
		String d2 = "123213897969";
		
		String[] tokens = d2.split("");
		
		int len_d2 = tokens.length - 1;
//		int len_d2 = tokens.length;
		
		int[] data_2 = new int[len_d2];
		
		for (int i = 0; i < len_d2; i++) {
			
			data_2[i] = Integer.parseInt(tokens[i+1]);
//			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] tokens[%d] => %s", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), i, tokens[i]);
//
//			System.out.println(msg);
			
			
		}
		
		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] tokens => %d", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), tokens.length);

		System.out.println(msg);
		
		
//		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] data.len => %d", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), data.length);

		System.out.println(msg);
		
		// inspect
		int len = data.length;
		
		int n1, n2, n3;
		
		for (int i = 1; i < len - 1; i++) {
//			for (int i = 1; i < len - 2; i++) {
			
			n1 = data[i - 1];
			n2 = data[i];
			n3 = data[i + 1];
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] i = %d => diff = %d", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), i, (n3 - n1));

			System.out.println(msg);
			
			
		}
		
		///////////////////////////////////
		//
		// data_2
		//
		///////////////////////////////////
//		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] *********** data_2 ***********", 
				Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber());

		System.out.println(msg);
		
		int diff;
		
		for (int i = 1; i < len_d2 - 1; i++) {
//			for (int i = 1; i < len - 2; i++) {
			
			n1 = data_2[i - 1];
			n2 = data_2[i];
			n3 = data_2[i + 1];
			
			diff = Math.abs((n3 - n1));
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] i = %d => diff = %d", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), 
					i, diff);
//			i, (n3 - n1));
			
			System.out.println(msg);
			
			
		}
		
		///////////////////////////////////
		//
		// data_2: threshold
		//
		///////////////////////////////////
//		String msg;
		msg = String.format(Locale.JAPAN, 
				"[%s : %d] *********** data_2 threshold ***********", 
				Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber());
		
		System.out.println(msg);
		
		int threshold = 5;
		
//		int diff;
		
		for (int i = 1; i < len_d2 - 1; i++) {
//			for (int i = 1; i < len - 2; i++) {
			
			n1 = data_2[i - 1];
			n2 = data_2[i];
			n3 = data_2[i + 1];
			
			diff = Math.abs((n3 - n1)) <= 5 ? 0 : 9;
//			diff = Math.abs((n3 - n1));
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] i = %d => diff = %d", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), 
					i, diff);
//			i, (n3 - n1));
			
			System.out.println(msg);
			
			
		}
		
		
	}//s_9_Circle()
	
}
