  		  	{counter start=0 skip=1 print=FALSE}
	  	
	  	<table class="main" border="1" id="histo">

	  		<tr>
	  		
	  			<th>
	  				SN!!
	  			</th>
	  		
	  			<th>
	  				Sum
	  			</th>
	  		
	  			<th>
	  				Histo
	  			</th>

	  			<th>
	  				Expec
	  			</th>

  			</tr>
  			
	  		<!-- header -->
	  		<!-- REF http://www.smarty.net/docsv2/en/language.function.foreach -->
	  		{foreach from=$histo key=i item=h}
	  		
  			<tr>
	  		
	  			<td>
	  			
	  				{counter}
	  			
	  			</td>
	  			
	  			<td>
	  			
	  				{$i}
	  			
	  			</td>

	  			<td>
	  			
	  				{$h}
	  			
	  			</td>

	  			<td>
	  			
	  				<!-- REF assign http://www.smarty.net/docs/en/language.function.assign.tpl -->
	  				{assign "expec" $h/36*100}
	  				
	  				<!-- REF format http://smarty.incutio.com/?page=commify -->
	  				<!-- REF referer http://www.smarty.net/forums/viewtopic.php?p=39149 Posted: Mon Sep 25, 2006 1:37 pm -->
	  				{$expec|number_format:2}
	  			
	  			</td>

  			</tr>
  			
	  		{/foreach}
	  	
	  		<tr>
	  		
	  			<td>
	  			
	  			</td>
	  		
	  			<td>
	  			
	  			</td>
	  		
	  			<td>
	  			
	  			</td>
	  		
	  		</tr>
	  	
	  	</table>
