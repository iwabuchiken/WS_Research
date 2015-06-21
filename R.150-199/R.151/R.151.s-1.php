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
s_1__Meteorite_Falls() {

	/*******************************
		open
	*******************************/
	$fname_In = "data/meteorite-falls.txt";
	
	$file_In = fopen($fname_In, "r");

	$line = fgetcsv($file_In, 1000, "\t");
	
	$row = 1;
	
	$years = array();
	
	while ($line !== FALSE) {
		
		$num = count($line);
		
		$date = $line[1];
		
		$len_years_string = strlen($date);
		
		$year = $len_years_string > 4 ? substr($date, strlen($date) - 4): $date;
// 		$year = substr($date, strlen($date) - 4);
		
		array_push($years, $year);
		
// 		echo "<p> $num fields in line $row: "
// 				.$line[1]
// 				."($year)"
// 				."<br /></p>\n";
		
		
		
// 		$row++;
		
		$line = fgetcsv($file_In, 1000, "\t");
		
// 		for ($c=0; $c < $num; $c++) {
			
// 			echo $data[$c] . "<br />\n";
			
// 		}
		
	}//while ($line !== FALSE)
	
	printf("[%s : %d] years => %d", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, count($years));
// 					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $years);
	
	echo "<br>"; echo "<br>";
	
	/*******************************
		close
	*******************************/
	fclose($file_In);
	
	/*******************************
		build: data
	*******************************/
	$data = array();
	
// 	$start = 1600;
	$start = 1700;
	
	$end = 2015;
	
	$range = $end - $start;
	
	$tick = 50;
	
	$numOf_Slots = $range / $tick;
	
	printf("[%s : %d] numOf_Slots => %d", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $numOf_Slots);
	
	echo "<br>"; echo "<br>";
	
// 	$tick = 100;
	
	$histo = array();
	
	$year_Start = $start;
	$year_End = $start;
	
	for ($i = 0; $i < $numOf_Slots; $i++) {
// 	for ($i = 0; $i < 8; $i++) {
		
// 		$tmp = array(
			
// 				$start + $tick * $i => 0
				
// 		);
		
// 		array_push($data, $tmp);
		
		$data[$start + $tick * $i] = 0;

		$year_Start = $start + $tick * $i;
		$year_End = $year_Start + $tick;
		
		$tmp = array(
		
				$year_Start, $year_End - 1
// 				$start * $i, $start + $tick * ($i + 1),
// 				$start, $start + $tick * 1,
					
		);
		
		array_push($histo, $tmp);
		
	}
// 	$data[$start] = 0;
// 	$data[$start + $tick * 1] = 0;
// 	$data[$start + $tick * 2] = 0;
// 	$data[$start + $tick * 3] = 0;
// 	$data[1900] = 0;
// 	$data[2000] = 0;
// 	$data[1700] = 0;
// 	$data[1800] = 0;
// 	$data[1900] = 0;
// 	$data[2000] = 0;

	$total = count($years);
	
	foreach ($years as $y) {
	
		
		
		if ($y >= $start && $y < $start + $tick * 1) {
		
			$data[$start] ++;
			
		} else if ($y >= $start + $tick * 1 && $y < $start + $tick * 2) {
			
			$data[$start + $tick * 1] ++;
			
		} else if ($y >= $start + $tick * 2 && $y < $start + $tick * 3) {
			
			$data[$start + $tick * 2] ++;
			
		} else if ($y >= $start + $tick * 3 
					&& $y < $start + $tick * 4) {
			
			$data[$start + $tick * 3] ++;
			
		} else if ($y >= $start + $tick * 4 
					&& $y < $start + $tick * 5) {
			
			$data[$start + $tick * 4] ++;
			
		} else if ($y >= $start + $tick * 5 
					&& $y < $start + $tick * 6) {
			
			$data[$start + $tick * 5] ++;
			
		} else if ($y >= $start + $tick * 6 
					&& $y < $start + $tick * 7) {
			
			$data[$start + $tick * 6] ++;
			
		} else {
		
			
		}//if ($y >= 1800 && $y < 1900)
		
		;
		
	}//foreach ($years as $y)

	// report
	printf("[%s : %d] distributed", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	echo "<br>"; echo "<br>";

	foreach ($data as $k => $v) {
	
		printf("[%s : %d] %d => %d (%.4f)", 
// 		printf("[%s : %d] %d => %d (%f)", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, 
					$k, $v, number_format($v / (float)$total, 4, ".", ","));
// 					$k, $v, number_format($v / (float)$total, 4, ".", ","));

		echo "<br>"; echo "<br>";
		
	}//foreach ($data as $k => $v)

	/*******************************
		build: histo
	*******************************/
	foreach ($data as $k => $v) {

// 		printf("[%s : %d] data: k = %d, v = %d", 
// 						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $k, $v);
		
// 		echo "<br>"; echo "<br>";
		
		foreach ($histo as $k2 => $v2) {
		
			if ($v2[0] == $k) {
// 			if ($v2 == $k) {
				
				array_push($histo[$k2], $v);
				
			};
			
		}//foreach ($histo as $k2 => $v2)
		
	}//foreach ($data as $value)
	
	printf("[%s : %d] histo =>", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	
	echo "<br>"; echo "<br>";
	
	print_r($histo);
	
// 	print_r($data);
	
	echo "<br>"; echo "<br>";
	
	/*******************************
		save: histo
	*******************************/
	$fname_Out = "data/meteorite-falls.histo.txt";
	
	$file_Out = fopen($fname_Out, "w");
	
	// header
	fwrite($file_Out, "Meteorite falls\n");
	fwrite($file_Out, sprintf("start=%d\tend=%d\ttotal=%d\n", $start, $end, $total));
	fwrite($file_Out, "start\tend\tnum\tratio\n");
	
	$count = 0;
	
	$decimal = 4;
	
	for ($i = 0; $i < count($histo); $i++) {
		
		$h = $histo[$i];
		
		$res = fwrite($file_Out, 
					sprintf("%d\t%d\t%d\t%.".$decimal."f\n", 
// 					sprintf("%d\t%d\t%d\t%f\n", 
							$h[0], $h[1], $h[2], 
							number_format($h[2]/(float)$total, $decimal, ".", ",")));
		
		if ($res !== false) {
			
			$count ++;
			
		}
		
	}
	
	// close
	fclose($file_Out);
	
	// report
	printf("[%s : %d] file written => %d lines", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__, $count);
	
	
	echo "<br>"; echo "<br>";
	
}//s_1__Meteorite_Falls()

function execute() {

	/*******************************
	 setup: smarty
	*******************************/
	$smarty = new SmartyBC();
	
	smarty_Setup($smarty);

	s_1__Meteorite_Falls();
	
}

execute();
