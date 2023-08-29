<?PHP 

$reqto=$_GET['reqto'];

session_start(); 

$reqper=$_SESSION['user'];  

mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());

mysql_select_db("htm_2353897_db") or die(mysql_error());  

$result = mysql_query("insert into pending_list (Username,friendname) values ('$reqto','$reqper')"); header('Location: /search.php'); 

?>