<?PHP 
$user=$_GET['user'];


mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error());

$query="Select userName,userbday,userph,userem,place from user_info where username='$user'";  
$result = mysql_query($query) or die(mysql_error());

while($myrow = mysql_fetch_array($result))
{
echo "-------------------------------------------------------------------------------------";
echo "<br><b>Name</b>&nbsp;&nbsp;&nbsp;: $myrow[0]<br><b>BornOn&nbsp: </b>$myrow[1]<br><b>Callme&nbsp;&nbsp;: </b>$myrow[2]<br><b>Email&nbsp;&nbsp;&nbsp;&nbsp;: </b>$myrow[3]<br><b>Place&nbsp;&nbsp;&nbsp;&nbsp;: </b>$myrow[4]<br>";
echo "-------------------------------------------------------------------------------------<br>";
}

?>