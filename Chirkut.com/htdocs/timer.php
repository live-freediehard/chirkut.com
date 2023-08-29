<html>
<body>
<H3 align=center> This page is beta version of integration of different API`s</H3>
<?php 

mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error()); 
session_start(); 


$i=0;

    		$query = "select count(Name) from user_info"; 
  		$result = mysql_query($query) or die(mysql_error());
  		while($myrow = mysql_fetch_array($result))
  		{
		//echo "$myrow[0]<br>";
  		$i=$myrow[0];
		}
		//header('Location: /timer.php');		
	

?>
<TABLE align=center><TR height=300>
<TD width="300">
____ Login Using Ebuddy ___ <BR><BR>
       <iframe src="http://www.ebuddy.com/widgets/loginbox/custom_login.html?version=small&language=en-GB" scrolling="no" frameborder="0" style="width: 200px; height: 250px;"></iframe>
<BR><BR>_________________________
<BR><BR></TD><TD width="528">
____________________ Location Using Gmap API ______________________
<BR><BR>
<iframe src ="/draw_map.php" SCROLLING=NO width="528" height="300" FRAMEBORDER=0></iframe>
<BR><BR>_________________________________________________________________</TD>
</TABLE>

<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
</body>
</html>