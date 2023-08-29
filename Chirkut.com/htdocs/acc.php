<?PHP 

$rmuser=$_GET['rmfd'];

session_start(); 

$listof=$_SESSION['user'];  

mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());

mysql_select_db("htm_2353897_db") or die(mysql_error());  

$result = mysql_query("insert into friend_list(username,friendname) values ('$rmuser','$listof')"); 
$result = mysql_query("insert into friend_list(username,friendname) values ('$listof','$rmuser')"); 

$result = mysql_query("delete from pending_list where username='$listof' and friendname='$rmuser' "); 

header('Location: /adfriend.php'); 

?>