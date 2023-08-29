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
		<h3>Search your mates !</h3>
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


$fuser=$_SESSION['user'];
$tuser=$_SESSION['disp_user'];


echo "<form action='$_SERVER[PHP_SELF]' method='post'> 
Enter friends Name:<br> <input type=text name='nm' size=68 value=></input><br> 
<input type='submit' value='Find it!'> 
</form>"; 
$srch=$_POST['nm'];

if($srch==''){$srch='XXXXXXXXXXXX';}

$query = "select users.username,user_info.name from users,user_info where user_info.name like '%$srch%' and users.username=user_info.username and users.username!='$fuser' and users.username not in (select friendname from friend_list where username='$fuser') and users.username not in (select username from pending_list where friendname='$fuser')"; 

$result = mysql_query($query) or die(mysql_error());

while($myrow = mysql_fetch_array($result))
{
echo "----------------------------------------------------------------------------------------";
echo "<br><b>Send Friendship request :<a href='/addreq.php?reqto=$myrow[0]'>$myrow[1]</a></b><br>";
echo "<b>View Profile :<a href='/set_val.php?user=$myrow[0]'>$myrow[1]</a></b><br>"; 
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
<br><br><br><br><br><br><br><br><br>
</body>
</html>
