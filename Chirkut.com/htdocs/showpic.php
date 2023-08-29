<?php
mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error()); 
session_start(); 
$usr=$_SESSION['disp_user'];
$query = mysql_query("SELECT * FROM user_images WHERE username='$usr'");
$row = mysql_fetch_array($query); 
if($row) 
{ 
$content = $row['image']; 
echo $content;
}  
?> 