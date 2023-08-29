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
		<h3>Album</h3><br>

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

// main code
echo "<form enctype='multipart/form-data' action='$_SERVER[PHP_SELF]' method='post' name='changer'> 
<input name='MAX_FILE_SIZE' value='999999' type='hidden'>
<input name='image' accept='image/jpeg'  type='file'>
<input type=text name=txt size=30 value='Pic won`t upload wt out Comment '></input>
<br> <input type='submit' value='Submit'> </form>"; 

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
      $query = "INSERT INTO tbl_images ";
      $query .= "(image,username,comment) VALUES ('$data','$usrinp','$com')";
      $results = mysql_query($query, $link);
	} else { echo "<B> This isn`t your album you cannot upload </b>"; }
 }

echo "<br>";

//

$c="select count(*) from tbl_images where username='$usrinp'";

$cr=mysql_query($c);

$cnt = mysql_fetch_array($cr); 

$no_of_pic=$cnt[0]; 

$link=$no_of_pic/5; 

$link=intval($link+1);  

echo "<B>Page : "; 

$val=1;

while($link>0)

{
echo "<a href='/album.php?id=$val'><B>$val</B></a>";

$val=$val+1;

$link=$link-1;

} echo "</b><BR>";

if($_GET['id']!='')
{ $off=($_GET['id']-1)*5; }
else { $off=0; }

$qry = "SELECT id FROM tbl_images WHERE username='$usrinp' ORDER BY id DESC LIMIT $off , 5"; 
$res = mysql_query($qry) or die(mysql_error()); 

while($myro = mysql_fetch_array($res))
{
$q = "select comment from tbl_images where username='$usrinp' and id=$myro[0]";
$r = mysql_query($q);
$rw = mysql_fetch_array($r);
$tt=wordwrap($rw[0],55,"<br />\n",TRUE);
echo "<B>$tt</B><br>";
echo "<a href='/getimage.php?idx=$myro[0]'><img src='/getimage.php?idx=$myro[0]' height=120 width=120></a>";
if($_SESSION['user']==$_SESSION['disp_user'])
	{echo "<a href='/rmpic.php?id=$myro[0]'>Delete it..</a>";}
echo "<br><br>";
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
