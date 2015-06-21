//alert("main.js");

//REF http://d3js.org/#properties
function get_Color_HSL() {
	
	  return "hsl(" + Math.random() * 360 + ",100%,50%)";
	  
}

function test_d3() {
	
//	alert("d3");
	
	//REF http://d3js.org/#properties
//	d3.selectAll("p").style("color", function() {
//		  return "hsl(" + Math.random() * 360 + ",100%,50%)";
//	});
	
	d3.select("body").style("background", get_Color_HSL());
	
	d3.selectAll("p").style("color", function(d, i) {
		return i % 2 ? "#fff" : "#eee";
	});
	
	d3.selectAll("p")
	    .data([4, 8, 15, 16, 23, 42])
	    .style("font-size", function(d) { return d + "px"; });
	
	d3.selectAll("td")
		.data([4, 8, 15, 16, 23, 42])
		.style("font-size", function(d) { return d + "px"; });
	
	d3.select("table#histo").style("color", function() {
		  return "hsl(" + Math.random() * 360 + ",100%,50%)";
	});
	
}

function message() {
	
	alert("message");
	
}

function expectations() {

	var hostname = window.location.hostname;
	
	var url = "";
	
	if (hostname == "localhost") {
		
		url = "http://localhost/Smarty_Research/main/main_D-2_Stat.php";
		
	} else {
		
		url = "http://benfranklin.chips.jp/Labs/Smarty_Research/main/main_D-2_Stat.php";
		
	}
	
	//REF http://stackoverflow.com/questions/12674422/receive-json-with-jquery asked Oct 1 '12 at 13:37
	
//	jQuery.ajax({
//		
//		url: url,
////		url: 'http://api.master18.tiket.com/search/autocomplete/hotel?q=mah&token=90d2fad44172390b11527557e6250e50&secretkey=83e2f0484edbd2ad6fc9888c1e30ea44&output=json',
//		
////		beforeSend: function(x) {
////			
////			if(x && x.overrideMimeType) {
////			 x.overrideMimeType("application/j-son;charset=UTF-8");
////			}
////		},
//		
//		type:"get",
//		dataType: 'json',
//		crossDomain: true,
//		
//		success: function(data) { 
//			
//			alert("json => done");
//			
////			console.log(data); 
//			
//		}
//	
//	});
	
	$.ajax({
		
	    url: url,
	    type: "GET",
	    //REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
	    data: {method: "v-1.1"},
//	    data: {id: id},
	    
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {

		//REF parse http://stackoverflow.com/questions/9098649/jquery-ajax-request-with-json-response-how-to answered Feb 1 '12 at 16:11
		var json = $.parseJSON(data);
		
//		var keys = "";
		
		var count = 0;
		
//		alert(data);
		
		alert(json);
		
		//REF each http://stackoverflow.com/questions/7073837/how-to-get-json-key-and-value answered Aug 16 '11 at 5:33
		$.each(json, function(key, value){
//			$.each(data, function(key, value){
			
//			keys += "/" + key;
			
			count ++;
			
		});
		
//		alert(keys);
//		alert(json);
//		alert(data);
		
//		alert("done");

		/***************************
			array
		 ***************************/
//		//REF array https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array?redirectlocale=en-US&redirectslug=JavaScript%2FReference%2FGlobal_Objects%2FArray
//		var keys = new Array(count);
//
//		//REF length vs size() http://stackoverflow.com/questions/14202601/array-size-vs-array-length answered Jan 7 '13 at 19:32
//		alert("keys => " + keys.length);
		
//		alert($.map(json, function(element,index) {return index}));
		
		//REF http://stackoverflow.com/questions/1254227/how-to-fetch-array-keys-with-jquery answered Mar 20 '13 at 12:15
//		var keys = $.map(json, function(element,index) {return index});
		//REF http://stackoverflow.com/questions/1254227/how-to-fetch-array-keys-with-jquery answered Mar 28 '12 at 17:58
		var keys = Object.keys(json);
		
		alert(keys + "(" + keys.length + ")");
		
	}).fail(function(xhr, status, error) {
		
		alert(xhr.status);
		
	});

	
}

$(document).ready(function(){
	
//	alert("ready");
//
//	var txt = $("#tmp").text();
//	
//	alert(txt);
	
	/***************************
		d3-related
	 ***************************/
	
//	d3.select("body").style("background-color", "black");
	
})//$(document).ready(function(){

//var txt = $("#tmp").text();
//
//alert(txt);