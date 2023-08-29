<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ChirKut ! Life's beautiful with ChirKut (BETA v1.0)</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>

<body>
<div id="wrap">
	<div id="header">
		<h1>ChirKut&#8482 ;-)</h1>
		<h2>Life's beautiful with ChirKut&#8482 !</h2>
	</div>
<?PHP 

mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error());

$_POST['user'] = addslashes($_POST['user']); 
$_POST['pass'] = md5($_POST['pass']); 

$result = mysql_query("SELECT count(*) FROM users WHERE userPass='$_POST[pass]' AND userName='$_POST[user]'"); 
$num = mysql_result($result, 0); 

if (!$num) { 

// When the query didn't return anything, 
// display the login form. 

echo "<div id='content'><div id='page'><h3 align='center'>Login here</h3> 
<form action='$_SERVER[PHP_SELF]' method='post'> 
<p align='center'><label for='UserName'>Username:</label> <input type='text' name='user'><br> 
<p align='center'><label for='Password'>Password:</label> <input type='password' name='pass'><br><br> 
<p align='center'><input type='submit' value='Login'> </p>
</form></div>"; 

} else { 

// Start the login session 
session_start(); 

// We've already added slashes and MD5'd the password 
$_SESSION['user'] = $_POST['user']; 
$_SESSION['pass'] = $_POST['pass']; 
header('Location: /page2.php'); 
} 

?> 


		<div id="sidebar">
			<h4>About</h4>
			<p>Hi,<br>
Welcome to ChirKut&#8482;. Its a busy place where people can
share their ideas, snaps, memories and lot`s more.Since
it`s a new born baby it isn`t blocked by any web filter. So
grab an account and start ChiKutting&#8482; today !</p>
		</div>
		<div id="footer">
			<p align="center">&copy; 2008 Mohit. <a href="/signup.htm" >Sign Up!</a> 
		</div>
	</div>
</div>
<br><br><br><br><br><br><br><br><br>
</body>
</html>
