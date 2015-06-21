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

	$smarty->setTemplateDir('templates');	//=>

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
test_Injection() {

// 	$db = new PDO('sqlite:../libs/development.sqlite3');
	$db = new PDO('sqlite:../../libs/development.sqlite3');
	
	/*******************************
		test: injec 1
	*******************************/
	$tname = "tokens";
	$col_name = "hin_1";
	
	$name = "空白";
// 	$name = "記号";
	$query = "SELECT * FROM $tname WHERE $col_name = '$name'";
// 	$query = "SELECT * FROM customers WHERE username = '$name'";
	echo "Normal: " . $query . "<br />";

// 	$name_bad = "'' OR 1";
	$name_bad = "' OR 1'";	//=> result --> 0
// 	$name_bad = "'' OR 1";	//=> "Allowed memory size of 134217728 bytes exhausted"
	
	// our MySQL query builder, however, not a very safe one
	$query_bad = "SELECT * FROM $tname WHERE $col_name = $name_bad";
// 	$query_bad = "SELECT * FROM $tname WHERE $col_name = '$name_bad'";
// 	$query_bad = "SELECT * FROM customers WHERE username = '$name_bad'";
	
	// display what the new query will look like, with injection
	echo "Injection: " . $query_bad;
	
	echo "<br>"; echo "<br>";
	
	// query
	//REF http://php.net/manual/en/pdostatement.fetchall.php
// 	$sth = $dbh->prepare("SELECT name, colour FROM fruit");
// 	$sth = $dbh->prepare($query);
	$sth = $db->prepare($query);
	$sth_2 = $db->prepare($query_bad);
	
	$sth->execute();
	$sth_2->execute();
	
	$res = $sth->fetchAll();
	$res_2 = $sth_2->fetchAll();
// 	$res = $db->query($query);
	
	if ($res !== false) {
// 	if ($res == true) {
		
		printf("[%s : %d] query => result obtained (res = %d, res_2 = %d)", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__,
// 						$res->rowCount()
// 						count($res->fetchAll())
						count($res), count($res_2)
	
		);
		
		echo "<br>"; echo "<br>";
		
// 		print_r($res);
		
// 		echo "<br>"; echo "<br>";

// 		// show rows
// 		foreach ($res as $row) {
		
// 			print_r($row);

// 			echo "<br>"; echo "<br>";
			
// 		}//foreach ($res as $row)
		
		
		
	} else {
		
		printf("[%s : %d] query => FALSE", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
		
		echo "<br>"; echo "<br>";
		
	}
	
	/*******************************
		close
	*******************************/
	$db = null;

	printf("[%s : %d] pdo => done", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	echo "<br>"; echo "<br>";
	
}//test_Injection()

function 
test_Injection_2__DELETE() {

// 	$db = new PDO('sqlite:../libs/development.sqlite3');
	$db = new PDO('sqlite:../../libs/development.sqlite3');
	
	/*******************************
		test: injec 1
	*******************************/
	$tname = "tokens";
	$col_name = "hin_1";
	
	$name = "空白";
	$query = "SELECT * FROM $tname WHERE $col_name = '$name'";
	echo "Normal: " . $query . "<br />";

// 	$name_bad = "'' OR 1";
	$name_bad = "' OR 1'";	//=> result --> 0
// 	$name_bad = "'' OR 1";	//=> "Allowed memory size of 134217728 bytes exhausted"

	$name_bad_Escaped = mysql_real_escape_string($name_bad);	//=> "A link to the server could not be established"
	
	$query_bad = "SELECT * FROM $tname WHERE $col_name = '$name_bad'";
	$query_bad_Escaped = "SELECT * FROM $tname WHERE $col_name = '$name_bad_Escaped'";
	
	$name_evil = "'; DELETE FROM $tname WHERE 1 or $col_name = '";
	$name_evil_Escaped = mysql_real_escape_string($name_evil);
	
	// our MySQL query builder, however, not a very safe one
	$query_evil = "SELECT * FROM $tname WHERE $col_name = '$name_evil'";
	$query_evil_Escaped = "SELECT * FROM $tname WHERE $col_name = '$name_evil_Escaped'";
	
	// display what the new query will look like, with injection
	echo "Injection: " . $query_bad;
	
	echo "<br>"; echo "<br>";
	
	echo "Injection (Escaped): " . $query_bad_Escaped;
	
	echo "<br>"; echo "<br>";
	
	echo "Injection: " . $query_evil;
	
	echo "<br>"; echo "<br>";
	
	echo "Injection (Escaped): " . $query_evil_Escaped;
	
	echo "<br>"; echo "<br>";
	
	// query
	//REF http://php.net/manual/en/pdostatement.fetchall.php
	$sth = $db->prepare($query);
	$sth_2 = $db->prepare($query_bad);
	
	$sth_delete = $db->prepare($query_evil);
	
// 	$sth->execute();
// 	$sth_2->execute();

	$sth_delete->execute();
	
// 	$res = $sth->fetchAll();
// 	$res_2 = $sth_2->fetchAll();
	
	$res_delete = $sth_delete->execute();
// 	$res_delete = $sth_delete->fetchAll();
// 	$res = $db->query($query);
	
	if ($res_delete !== false) {
// 	if ($res !== false) {
// 	if ($res == true) {
		
		printf("[%s : %d] query delete => done", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__
// 						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__,
// 						$res->rowCount()
// 						count($res->fetchAll())
// 						count($res), count($res_2)
	
		);
		
		echo "<br>"; echo "<br>";
		
		print_r($res_delete);
		
		echo "<br>"; echo "<br>";
		
	} else {
		
		printf("[%s : %d] query => FALSE", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
		
		echo "<br>"; echo "<br>";
		
	}
	
	/*******************************
		close
	*******************************/
	$db = null;

	printf("[%s : %d] pdo => done", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	echo "<br>"; echo "<br>";
	
}//test_Injection()

function 
test_Injection_3__SQLite() {

// 	$db = new PDO('sqlite:../libs/development.sqlite3');
	$db = new PDO('sqlite:../../libs/development.sqlite3');

	$fpath = "../../libs/development.sqlite3";
	
// 	$db_2 = new SQLiteDatabase($fpath);
	
// 	new SQLiteDatabase('filename');
	
	/*******************************
		test: injec 1
	*******************************/
	$tname = "tokens";
	$col_name = "hin_1";
	
	$name = "空白";
	$query = "SELECT * FROM $tname WHERE $col_name = '$name'";
	echo "Normal: " . $query . "<br />";

	$name_bad = "Qadir'; DELETE FROM $tname;";	//=> result --> 0
// 	$name_bad = "Qadir'; DELETE FROM users;";	//=> result --> 0
// 	$name_bad = "' OR 1'";	//=> result --> 0

	$query_bad = "SELECT * FROM $tname WHERE $col_name = '$name_bad'";
	
	// display what the new query will look like, with injection
	echo "Injection: " . $query_bad;
	
	echo "<br>"; echo "<br>";

	$res = $db->query($query_bad);
	
	if ($res !== false) {
// 	if ($res == true) {
		
		printf("[%s : %d] query delete => done", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__
// 						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__,
// 						$res->rowCount()
// 						count($res->fetchAll())
// 						count($res), count($res_2)
	
		);
		
		echo "<br>"; echo "<br>";
		
		print_r($res);
// 		print_r($res_delete);
		
		echo "<br>"; echo "<br>";
		
	} else {
		
		printf("[%s : %d] query => FALSE", 
						Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
		
		echo "<br>"; echo "<br>";
		
	}
	
	/*******************************
		close
	*******************************/
	$db = null;

	printf("[%s : %d] pdo => done", 
					Utils::get_Dirname(__FILE__, CONS::$proj_Name), __LINE__);
	
	echo "<br>"; echo "<br>";
	
}//test_Injection_3__SQLite

function execute() {

	/*******************************
	 setup: smarty
	*******************************/
	$smarty = new SmartyBC();
	
	smarty_Setup($smarty);

	test_Injection_3__SQLite();
// 	test_Injection_2__DELETE();
// 	test_Injection();
	
}

execute();
