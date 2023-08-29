<?PHP 

$rmuser=$_GET['id'];

session_start(); 

$listof=$_SESSION['user'];  

mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());

mysql_select_db("htm_2353897_db") or die(mysql_error());  

$result = mysql_query("delete FROM tbl_images WHERE username='$listof' AND id=$rmuser");


header('Location: /album.php'); 

?>