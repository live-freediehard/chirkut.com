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
		<h3>Edit Your Profile</h3><br>

<?php
// some php
// check user
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

echo "<b>Your Image is</b><br><br>";
// main code
echo "<form enctype='multipart/form-data' action='$_SERVER[PHP_SELF]' method='post' name='changer'> 
<input name='MAX_FILE_SIZE' value='999999' type='hidden'>
<input name='image' accept='image/jpeg'  type='file'>
<br> <input type='submit' value='Upload'> </form>"; 

$username = "htm_2353897";
$password = "091728";
$host = "sql105.os9.co.uk";
$database = "htm_2353897_db";

session_start();

$usrinp=$_SESSION['disp_user'];
$link = mysql_connect($host, $username, $password);

mysql_select_db ($database);  

if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { 

      // Temporary file name stored on the server
      $tmpName  = $_FILES['image']['tmp_name'];  
       
      // Read the file 
      $fp      = fopen($tmpName, 'r');
      $data = fread($fp, filesize($tmpName));
      $data = addslashes($data);
      fclose($fp);
      
      $com=$_POST['txt'];	
      // Create the query and insert
      // into our database.

      $valuser=$_SESSION['user'];
      
	if($valuser==$usrinp)
	{
      $query = "UPDATE user_images ";
      $query .= "set image = '$data' where username='$valuser'";
      $results = mysql_query($query, $link);
      echo "<br><B>Updated !</b>";	
	} else { echo "<B> illegal updation reported ! </b>"; }
 }

mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error()); 
// Display the user profile


session_start();
$valuser=$_SESSION['user'];
$query = "select Name,userbday,userph,userem,place from user_info WHERE userName='$valuser'"; 

$result = mysql_query($query) or die(mysql_error());

echo "<br><b>Your Profile Is</b><br>";
while($myrow = mysql_fetch_array($result))
{
$N=$myrow[0];
$B=$myrow[1];
$C=$myrow[2];
$E=$myrow[3];
$P=$myrow[4];
}


echo "<form action='/update.php' method='post'>
<p align='center'><label for='Name'>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type='text' name='Name' value='$N'/></p>
<p align='center'><label for='Phone'>Phone;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type='text' name='Phone' value='$C'/></p>
<p align='center'><label for='UserBday'>Birthday&nbsp;&nbsp;:</label><input type='text' name='Bday' value='$B'/></p>
<p align='center'><label for='Useremail'>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type='text' name='Email' value='$E'/></p>		
<p align='center'><label for='Place'>Place&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type='text' name='Place' value='$P'/></p>		
<p align='center'><input type='submit' value='Update' class='button' /></p>		
</form>";
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
		</div>
		<div id="footer">
			<p>&copy; 2008 Mohit. <a href="/logout.php" >Logout</a> 
		</div>
	</div>
</div>
<br><br><br><br><br><br><br><br><br>
</body>
</html>
