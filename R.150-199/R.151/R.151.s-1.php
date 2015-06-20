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

function execute() {

	/*******************************
	 setup: smarty
	*******************************/
	$smarty = new SmartyBC();
	
	smarty_Setup($smarty);

}

execute();
