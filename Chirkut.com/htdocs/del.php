<?PHP 
$rmuser=$_GET['rmfd'];
session_start(); 
$listof=$_SESSION['user'];


mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error());


$result = mysql_query("delete FROM friend_list WHERE username='$listof' AND friendName='$rmuser'");
$result = mysql_query("delete FROM friend_list WHERE username='$rmuser' AND friendName='$listof'");

header('Location: /rmfriend.php');

?>