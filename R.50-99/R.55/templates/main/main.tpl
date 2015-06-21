<html>

	{include file="./header.tpl"}
	
  <body>

  	<div onclick="message()" class="blue">
  	
  		click
  	
  	</div>
  
  	<div onclick="expectations()" class="green">
  	
  		ajax
  	
  	</div>
  
  	<hr>

  		<!-- REF include http://www.smarty.net/docsv2/en/language.function.include -->
  		{include file="./table.tpl"}
  
  	<hr>
  	
  		{include file="./d3.tpl"}
  	
  </body>
</html>