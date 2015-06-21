<?php

require('../../libs/Smarty.class.php');	//=> works
require('../../libs/SmartyBC.class.php');	//=>

require '../../utils_php/utils.php';
require '../../utils_php/DB.php';
// require 'utils/utils.php';
// require 'utils/DB.php';

function smarty_Setup($smarty) {

	$smarty->setCaching(true);

	/*
	 * "../libs"	=> "../" needed
	* 					to use templates dir under ".../Smarty/libs/templates"
	*/
	// 		$smarty->setTemplateDir('../libs/templates');
	$smarty->setCompileDir('templates_c');
	
	$smarty->setCacheDir('../../libs/cache');
	$smarty->setConfigDir('../../libs/configs');
// 	$smarty->setCacheDir('../libs/cache');
// 	$smarty->setConfigDir('../libs/configs');

	$smarty->setTemplateDir('templates');	//=>
	// 		$smarty->setTemplateDir('/templates');	//=> no
	// 		$smarty->setTemplateDir('templates');	//=> no
	// 		$smarty->setTemplateDir('libs/templates');
	// 		$smarty->setCompileDir('libs/templates_c');
	// 		$smarty->setCacheDir('libs/cache');
	// 		$smarty->setConfigDir('libs/configs');

	/*******************************
	 cache: clear
	*******************************/
	$smarty->clearAllCache();

}

function
execute_View($smarty, $tpl_name) {

	$smarty->assign('title', CONS::$proj_Name);

	/*******************************
	 assign: css file, js
	*******************************/
	$server_name = Utils::get_ServerName();

	if ($server_name == 'localhost') {

		$css_file_path = "/".CONS::$proj_Name."/main/templates/rsc/css/main.css";	// w
// 		$css_file_path = CONS::$proj_Name."/main/templates/rsc/css/main.css";	//=> n/w
		// 			$css_file_path = "/Smarty/main/libs/templates/rsc/css/main.css";

		$js_file_path = "/".CONS::$proj_Name."/main/templates/rsc/js/main.js";	//
		
// 		$js_jquery = "http://code.jquery.com/jquery-2.1.4.min.js";	//
		
	} else {

		$css_file_path = "/Labs/".CONS::$proj_Name."/main/templates/rsc/css/main.css";

		$js_file_path = "/Labs/".CONS::$proj_Name."/main/templates/rsc/js/main.js";	//
		
// 		$js_jquery = "http://code.jquery.com/jquery-2.1.4.min.js";	//
		
	}//if ($server_name == 'localhost')

	/*******************************
		js: commons
	*******************************/
	$js_jquery = "http://code.jquery.com/jquery-2.1.4.min.js";	//

	$js_d3 = "http://d3js.org/d3.v3.min.js";

	/*******************************
		assign
	*******************************/
	$smarty->assign('path_css', $css_file_path);
	
	$smarty->assign('path_js_jquery', $js_jquery);
	
	$smarty->assign('path_js', $js_file_path);

	$smarty->assign('path_js_d3', $js_d3);



	$smarty->display("templates/$tpl_name");	//=> w
	// 		$smarty->display("../templates/$tpl_name");	//=> w

}//execute_View($smarty, $tpl_name)

function do_D_2_V_1_0() {

	$d1 = array(1,2,3,4,5,6);
	$d2 = array(1,2,3,4,5,6);
	
	$res = array();
// 	$res = new Array(36);
	
	for ($i = 0; $i < 6; $i++) {
		
		for ($j = 0; $j < 6; $j++) {
			
			array_push($res, $d1[$i] + $d2[$j]);
// 			array_push($res, $d1[$i]*$d2[$j]);
			
		}
	}
	
	
	$len_res = count($res);

	sort($res);
	
// 	printf("[%s : %d] res =>", 
// 					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
// 	for ($i = 0; $i < $len_res; $i++) {
		
// 		printf("[%s : %d] res[%d] = %d", 
// 						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $i, $res[$i]);
		
// 		echo "<br>"; echo "<br>";
		
// 	}
	
	/*******************************
		unique
	*******************************/
	printf("[%s : %d] **************** unique ****************", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	
	echo "<br>"; echo "<br>";
	
	$res_uniq = array_values(array_unique($res));
// 	$res = array_unique($res);

// 	print_r($res);
	
	$len_res = count($res_uniq);
	
// 	for ($i = 0; $i < $len_res; $i++) {
	
// 		printf("[%s : %d] res[%d] = %d",
// 		Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $i, $res_uniq[$i]);
	
// 		echo "<br>"; echo "<br>";
	
// 	}
	
	/*******************************
		histo
	*******************************/
	$histo = array();
	
	// init
	for ($i = 0; $i < $len_res; $i++) {
		
		$histo[$res_uniq[$i]] = 0;
		
	}
	
	$len_histo = count($histo);
	
	printf("[%s : %d] len_histo => %d", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $len_histo);
	
	echo "<br>"; echo "<br>";
	
	printf("[%s : %d] histo => ", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	
	print_r($histo);
	
	echo "<br>"; echo "<br>";
	
// 	printf("[%s : %d] len_res => ", 
// 					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	
// 	print_r($len_res);
	
// 	echo "<br>"; echo "<br>";
	
	$len_res = count($res);
	
	// count
// 	for ($i = 0; $i < $len_histo; $i++) {

		for ($j = 0; $j < $len_res; $j++) {
			
			$histo[$res[$j]] ++;
			
		}
		
// 	}

	// show
	
// 	print_r($histo);
	
	for ($i = 0; $i < $len_histo; $i++) {
		
		printf("[%s : %d] histo[%d] = %d", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $i, $histo[$res_uniq[$i]]);
// 						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $i, $histo[$i]);
		
		echo "<br>"; echo "<br>";
		
	}
		
	
	/*******************************
		save: data
	*******************************/
	$fpath_dst = "../data/R.143.histo.txt";
	
	$f_dst = fopen($fpath_dst, "w");
	
	for ($i = 0; $i < $len_histo; $i++) {
		
		$data = $histo[$res_uniq[$i]];
		
		
		
		fwrite($f_dst, ($i+1)."\t$data\n");
		
	}
	
	fclose($f_dst);
	
	printf("[%s : %d] data => saved", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	echo "<br>"; echo "<br>";
	
	
		
}//do_D_2_V_1_0

function do_D_2_V_1_1($smarty) {

	
	$d1 = array(1,2,3,4,5,6);
	$d2 = array(1,2,3,4,5,6);
	
	$histo = Utils::get_Histo_stat($d1, $d2);
	
// 	printf("[%s : %d] histo =>", 
// 					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	
// 	echo "<br>"; echo "<br>";
	
// 	print_r($histo);

	/*******************************
		assigns
	*******************************/
	$smarty->assign("histo", $histo);
		
}//do_D_2_V_1_0

function do_D_2_V_1_1__Expectations($smarty) {

	
	$d1 = array(1,2,3,4,5,6);
	$d2 = array(1,2,3,4,5,6);
	
	$histo = Utils::get_Histo_stat($d1, $d2);
	
	echo json_encode($histo);
	
// 	printf("[%s : %d] histo =>", 
// 					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	
// 	echo "<br>"; echo "<br>";
	
// 	print_r($histo);
	
		
}//do_D_2_V_1_1__Expectations

function 
s_6_9__Bank_Rate_Chart() {

	/*******************************
	 open
	*******************************/
	$fname_In = "data/bank_rates.raw.txt";
	
	$file_In = fopen($fname_In, "r");

	/*******************************
		get: num of lines
	*******************************/
	$numOf_Chunk = 11;
	
// 	$max_Len_Line = 100;
	
	$res = fgets($file_In);
	
	$cnt_Lines = 0;
	
	// read off: header
	for ($i = 0; $i < $numOf_Chunk; $i++) {
		
		fgets($file_In);
		
	}
	
	// data section
	$data = fgets($file_In);
	
	while($data != false) {
// 	while($data !== false) {
		
// 		fgets($file_In);
		
		$cnt_Lines ++;
		
		$data = fgets($file_In);
		
	}
	
	printf("[%s : %d] data lines => %d (%d chunks)", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, 
					$cnt_Lines,
					(int)($cnt_Lines / (float) $numOf_Chunk)
	);
	
	
	echo "<br>"; echo "<br>";
	
	$numOf_Data_Chunks = (int)($cnt_Lines / (float) $numOf_Chunk);
	
	/*******************************
	 close
	*******************************/
	fclose($file_In);
	
	
	/*******************************
		open
	*******************************/
// 	$fname_In = "data/bank_rates.raw.txt";
	
	$file_In = fopen($fname_In, "r");

	/*******************************
		read off:
	*******************************/
	$numOf_Chunk = 11;
	
	$max_Len_Line = 100;
	
	$res = fgets($file_In);
// 	$res = fgets($file_In, $max_Len_Line);
// 	$res = fread($file_In, $max_Len_Line);
	
	printf("[%s : %d] first line =>", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	
	echo "<br>"; echo "<br>";
	
	print_r($res);
	
	echo "<br>"; echo "<br>";
	
	/*******************************
		read: header
	*******************************/
	$header = array();
	
	for ($i = 0; $i < $numOf_Chunk; $i++) {
		
		$data = fgets($file_In, $max_Len_Line);
// 		$data = fread($file_In, $max_Len_Line);
		
		array_push($header, trim($data));
// 		array_push($header, $data);
		
	}
	
	printf("[%s : %d] fread => done", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	echo "<br>"; echo "<br>";

	// report
	print_r($header);
	
	echo "<br>"; echo "<br>";
	
	print_r(implode("/", $header));
	
	echo "<br>"; echo "<br>";

	/*******************************
		read: data
	*******************************/
	$lines = array();
	
	$count = 0;
	
	$tmp = array();
	
	for ($j = 0; $j < $numOf_Data_Chunks; $j++) {
		
		for ($i = 0; $i < $numOf_Chunk; $i++) {
			
			$data = fgets($file_In, $max_Len_Line);
	// 		$data = fread($file_In, $max_Len_Line);
			
			array_push($tmp, trim($data));
// 			array_push($tmp, $data);
			
		}
		
		array_push($lines, $tmp);
		
		$tmp = array();
		
	}
	
	printf("[%s : %d] line => read (%d lines)", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__,
					count($lines)
	
		);
	
	
	echo "<br>"; echo "<br>";

// 	print_r($lines);
// 	print_r(implode("*", $lines[0]));
	
	echo "<br>"; echo "<br>";
	
	/*******************************
		close
	*******************************/
	fclose($file_In);
	
	/*******************************
	 write: header
	*******************************/
	$fname_Out = "data/bank_rates.raw.out.txt";;
	
	$file_Out = fopen($fname_Out, "w");

	fwrite($file_Out, implode("\t", $header)."\n");
// 	fwrite($file_Out, implode("\t\n", $header));
	
	/*******************************
		write: lines
	*******************************/
	$len = count($lines);
	
	for ($i = 0; $i < $len; $i++) {
		
		$line = $lines[$i];
		
		fwrite($file_Out, implode("\t", $line)."\n");
		
	}
	
	/*******************************
		close
	*******************************/
	fclose($file_Out);
	
	printf("[%s : %d] file out => written", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	
	echo "<br>"; echo "<br>";
	
	
// 	$str_Header = "";
	
// 	for ($i = 0; $i < count($header); $i++) {
		
// 	}
	
	
// 	// header
// 	fwrite($file_Out, "Meteorite falls\n");
// 	fwrite($file_Out, sprintf("start=%d\tend=%d\ttotal=%d\n", $start, $end, $total));
// 	fwrite($file_Out, "start\tend\tnum\tratio\n");
	
// 	$count = 0;
	
// 	$decimal = 4;
	
// 	for ($i = 0; $i < count($histo); $i++) {
		
// 		$h = $histo[$i];
		
// 		$res = fwrite($file_Out, 
// 					sprintf("%d\t%d\t%d\t%.".$decimal."f\n", 
// // 					sprintf("%d\t%d\t%d\t%f\n", 
// 							$h[0], $h[1], $h[2], 
// 							number_format($h[2]/(float)$total, $decimal, ".", ",")));
		
// 		if ($res !== false) {
			
// 			$count ++;
			
// 		}
		
// 	}
	
// 	// close
// 	fclose($file_Out);
	
// 	// report
// 	printf("[%s : %d] file written => %d lines", 
// 					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $count);
	
	
// 	echo "<br>"; echo "<br>";
	
}//s_1__Meteorite_Falls()


function execute() {

	/*******************************
	 setup: smarty
	*******************************/
	$smarty = new SmartyBC();
	
	smarty_Setup($smarty);

	s_6_9__Bank_Rate_Chart();
	
}

execute();
