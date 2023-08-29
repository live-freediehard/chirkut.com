<?PHP 

mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error());


session_start(); 

$flistof=$_SESSION['disp_user'];

$query = "select user_info.Name,friend_list.friendName from friend_list,user_info where friend_list.friendName=user_info.userName and friend_list.username='$flistof'"; 
$result = mysql_query($query) or die(mysql_error());

while($myrow = mysql_fetch_array($result))
{
echo "-------------------------------------------------------------------------------------------------------------------------------------------";
echo "<br><b>value 1:</b> $myrow[0]<br><b>value 2:</b> $myrow[1]<br>";
echo "<a href='/set_val.php?user=$myrow[1]'>$myrow[0]</a>"; 
echo "-------------------------------------------------------------------------------------------------------------------------------------------<br>";
}


?>