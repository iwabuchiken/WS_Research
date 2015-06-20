<?php

require '../utils_php/utils.php';

function middle_square($num) {

	$a = $num;
// 	$a = 1763;
	
	$b = pow($a, 2);
// 	$b = $a^2;
	
	$b_s = (string)$b;
	
	$len_a = strlen((string)$a);

	$len_b = strlen((string)$b);
	
	$middle = (int)(ceil(($len_b - $len_a)/(float)2));
	
	$res = substr($b_s, ($middle - 1), $len_a);
	
// 	printf("[%s : %d] a = %d, b = %d, b_s = %s\n len_a = %d, len_b = %d"
// 				.", middle = %d, res = %s(%%d=%d)", 
// 				__FILE__, __LINE__, 
// 				$a, $b, $b_s, $len_a, $len_b, $middle, $res, (int)$res);
	
	return $res;
	
}//middle_square($num)

function get_Middle_Squares($iterate) {
	
	$randoms = array();
	
	for ($i = 0; $i < $iterate; $i++) {

// 		$t = time();
		$t = explode(" ", microtime())[0];
		
// 		printf("[%s : %d] t = %d\n", __FILE__, __LINE__, $t);
		printf("[%s : %d] t = %d, micro = %s\n", __FILE__, __LINE__, 
				$t, (string)explode(" ", microtime())[0]);
		
		$len_t = strlen((string)$t);
		
// 		$len = 5;
		$len = 4;
		
		$a = substr((string)$t, 2, $len);
// 		$a = substr((string)$t, ($len_t - $len));
		
		// 	$a = 1764;
		
		$res = middle_square($a);
		
		array_push($randoms, $res);

		// wait
		$e = pow(10, 6);
		
		for ($j = 0; $j < $e; $j++) {
// 		for ($j = 0; $j < pow(10,8); $j++) {
			
		}
		
	}
	
	print_r($randoms);
	
	// millsec
	echo "\n";

	$micro = explode(" ", microtime())[0];
// 	$micro = explode(" ", microtime());
	
	printf("[%s : %d] micro = %f\n", __FILE__, __LINE__, $micro);
	
	
	
	
	
	
	print_r(microtime());
// 	echo microtime();
	
// 	$t = time();
	
// 	$len_t = strlen((string)$t);
	
// 	$len = 4;
	
// 	$a = substr((string)$t, ($len_t - $len));
	
// // 	$a = 1764;
	
// 	$res = middle_square($a);
	
// 	printf("[%s : %d] a = %d, res = %d", __FILE__, __LINE__, $a, $res);
	
// 	echo "\n";
	
// 	echo time();
	
}

// middle_square();
get_Middle_Squares(5);
