package utils;

import java.io.File;
import java.util.ArrayList;
import java.util.List;

public class CONS {

//	// Sort order
//	public static enum SORT_ORDER {
//			ASC, DEC,
//			CREATED_AT,
//	};

	
	

	// Table => show_history
//	public static String tname_show_history = "show_history";
	
	public static class Intent {
		
		////////////////////////////////

		// commons

		////////////////////////////////
		public final static long dflt_LongExtra_value = -1;
		
		public final static int dflt_IntExtra_value = -1;
		
		
		////////////////////////////////
		
		// PlayActv
		
		////////////////////////////////
		// Used in Service_ShowProgress
		public static String iKey_PlayActv_TaskPeriod
								= "iKey_PlayActv_TaskPeriod";
		
		
		////////////////////////////////

		// MainActv

		////////////////////////////////
		public static String iKey_CurrentPath_MainActv = "current_path";

		
		////////////////////////////////

		// ALActv

		////////////////////////////////
		public static String iKey_AI_FilePath_Full = "iKey_AI_FilePath_Full";
		
		public static String iKey_AI_Db_Id = "iKey_AI_Db_Id";
		
		public static String iKey_AI_TableName = "iKey_AI_TableName";
		
		////////////////////////////////

		// BMActv

		////////////////////////////////
		public static String iKey_BMActv_AI_Id = "bmactv_key_ai_id";
//		public static String bmactv_key_ai_id = "bmactv_key_ai_id";
		
		public static String iKey_BMActv_TableName = "bmactv_key_table_name";
		
		public static String iKey_BMActv_Position = "bmactv_key_position";
//		public static String bmactv_key_position = "bmactv_key_position";
		
		/***************************************
		 * Request codes
		 ***************************************/
		public final static int REQUEST_CODE_SEE_BOOKMARKS = 0;
		
		public final static int REQUEST_CODE_HISTORY = 1;
		
		/***************************************
		 * Result code
		 ***************************************/
		public final static int RESULT_CODE_SEE_BOOKMARKS_OK = 1;
		
		public final static int RESULT_CODE_SEE_BOOKMARKS_CANCEL = 0;
		
		////////////////////////////////

		// ShowLogActv

		////////////////////////////////
		public static final String iKey_LogActv_LogFileName =
													"iKey_LogActv_LogFileName";

	}//public static class Intent
	
	public static class Admin {
		////////////////////////////////

		// commons

		////////////////////////////////
		public static final float DLG_WIDTH_RATIO = 0.8f;
		
		public static final String dName_backup = "cm5_backup";
		
		public static final String dirString_UpperDir	= "..";
		
		public static final String char_Space_Half	= " ";
		
		public static final String char_Space_Whole	= "　";
		
		////////////////////////////////

		// MainActv.java

		////////////////////////////////
		public static String fname_List = "list.txt";
		
		////////////////////////////////

		// Utilities

		////////////////////////////////
		public static final String format_Date = "yyyy/MM/dd HH:mm:ss.SSS";
//		public static final String date_Format = "yyyy/MM/dd hh:mm:ss.SSS";
		
		public static final String format_Clock = "%02d:%02d";
		
	}//public static class Admin

	public static class Retval {
		////////////////////////////////

		// Errors

		////////////////////////////////
		/******************************
			Refresh DB
		 ******************************/
		public static int CantCreateTable =		-10;
		
		public static int CantRefreshAudioDir=	-11;
		
		public static int NoNewFiles =			-12;
		
		
		
	}

	public static class Enums {
		
		public static enum SortType {
			
			FileName, POSITION, WORD, CREATED_AT,
			
		}

		// Sort order
		public static enum SortOrder {
				ASC, DEC,
				CREATED_AT, DESC,
		};

		public static enum ListType {
			
			STANDARD, SEARCH, HISTORY, ANY,
			
		}

		public static enum MoveMode {
			// TIListAdapter.java
			ON, OFF,
			
		}//public static enum MoveMode

	}

}//public class CONS
