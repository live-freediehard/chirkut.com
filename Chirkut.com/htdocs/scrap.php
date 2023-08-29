<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Life's beautiful with ChirKut !</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>

<body>
<div id="wrap">
	<div id="header">
		<h1>ChirKut</h1>
		<h2>Life's beautiful with ChirKut !</h2>
	</div>
	<div id="nav">
		<ul>
		        <li><a href="/profile.php">Profile</a></li>
			<li><a href="/scrap.php?id=1">Scrap Book</a></li>
			<li><a href="/album.php">Album</a></li>
			<li><a href="/search.php">Search</a></li>
			<li><a href="/adfriend.php">Add Friend`s</a></li>
			<li><a href="/rmfriend.php">Remove Friend`s</a></li>
			<li><a href="/home.php">Home</a></li>
			<li><a href="/logout.php">Logout</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="page">
		<h3>Scrapbook</h3>
<?php
//check user

// Start the login session 
session_start(); 

if (!$_SESSION['user'] || !$_SESSION['pass']) { 
// What to do if the user hasn't logged in 
// We'll just redirect them to the login page. 
header('Location: /index.php'); 

}

mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error());


$result = mysql_query("SELECT count(*) FROM users WHERE userPass='$_SESSION[pass]' AND userName='$_SESSION[user]'"); 
$num = mysql_result($result,0); 


if (!$num) { 
header('Location: /index.php'); 
}

//main code
session_start();
mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error());

session_start(); 

$fuser=$_SESSION['user'];
$tuser=$_SESSION['disp_user'];
$msg=$_POST['mess'];

if($_POST['mess'])
	{

$r = mysql_query("SELECT count(*) FROM friend_list WHERE username='$fuser' AND friendName='$tuser'"); 
$n = mysql_fetch_array($r); 
$nos=$n[0];

if($nos)
{
$stmt = "INSERT INTO messages (tuserName,fuserName,message) VALUES ('$tuser','$fuser','$msg') ";
$res = mysql_query($stmt);
	if($res) { echo "<B>Successfully Posted !</B>"; }
} else { echo "<B>You cannot post scrap !... </B>"; }
	} 

echo "<form action='$_SERVER[PHP_SELF]' method='post'> 
Message:<br> <textarea name='mess' cols='55' rows='5'></textarea><br> 
<input type='submit' value='Post it!'> 
</form>"; 



$c="select count(*) from messages,user_info WHERE tuserName='$_SESSION[disp_user]' and messages.fuserName=user_info.userName";
$cr=mysql_query($c);
$cnt = mysql_fetch_array($cr);

$no_of_scrap=$cnt[0];

$link=$no_of_scrap/10;

$link=intval($link+1);


echo "<B>Page : ";

$val=1;
while($link>0)
{
echo "<a href='/scrap.php?id=$val'><B>$val</B></a>";
$val=$val+1;
$link=$link-1;
}

echo "</b><BR>";
$off=($_GET['id']-1)*10;

if($_GET['id']==''){$off=0;}

$query = "select messages.message,user_info.Name from messages,user_info WHERE tuserName='$_SESSION[disp_user]' and messages.fuserName=user_info.userName order by messages.id desc LIMIT $off,10"; 
$result = mysql_query($query) or die(mysql_error());


while($myrow = mysql_fetch_array($result))
{
$tt=wordwrap($myrow[0],55,"<br />\n",TRUE);
echo "----------------------------------------------------------------------------------------";
echo "<br><b>From:</b> $myrow[1]<br> <b>Message: </b> $tt <br>";
echo "----------------------------------------------------------------------------------------<br>";
}




?>
		</div>
		<div id="sidebar">
			<h4>About Friendship</h4>
			<p>A brief candle; both ends burning 
				An endless mile; a bus wheel turning 
				A friend to share the lonesome times 
				A handshake and a sip of wine 
				So say it loud and let it ring 
				We are all a part of everything 
				The future, present and the past 
				Fly on proud bird 
				You're free at last.
			</p>
			<h4>Friend List</h4>
			<ul>
<?PHP 

mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error());


session_start(); 

$flistof=$_SESSION['disp_user'];

$query = "select user_info.Name,friend_list.friendName from friend_list,user_info where friend_list.friendName=user_info.userName and friend_list.username='$flistof'"; 
$result = mysql_query($query) or die(mysql_error());

while($myrow = mysql_fetch_array($result))
{
echo "<li><a href='/set_val.php?user=$myrow[1]'>$myrow[0]</a></li>"; 
}
?>
			</ul>
		</div>
		<div id="footer">
			<p>&copy; 2008 Mohit. <a href="/logout.php" >Logout</a> 
		</div>
	</div>
</div>
<br><br><br><br><br><br><br><br>
</body>
</html>
