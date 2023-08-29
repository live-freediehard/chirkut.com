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

echo "<h3>User Login</h3> 
<form action='$_SERVER[PHP_SELF]' method='post'> 
Username: <input type='text' name='user'><br> 
Password: <input type='password' name='pass'><br><br> 
<input type='submit' value='Login'> 
</form>"; 

} else { 

// Start the login session 
session_start(); 

// We've already added slashes and MD5'd the password 
$_SESSION['user'] = $_POST['user']; 
$_SESSION['pass'] = $_POST['pass']; 

// All output text below this line will be displayed 
// to the users that are authenticated. Since no text 
// has been output yet, you could also use redirect 
// the user to the next page using the header() function. 
// header('Location: page2.php'); 

echo "<h1>Congratulations</h1>"; 
echo "You're now logged in. Try visiting <a href='page2.php'>Page 2</a>."; 

} 

?> 





