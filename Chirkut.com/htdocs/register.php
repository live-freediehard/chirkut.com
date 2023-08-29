<? // code for register.php


mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error());

$email = $_POST["email"];
$uname = $_POST["user"];
$upass = $_POST["pass"];
$ubday = $_POST["bday"];
$phone = $_POST["phone"];
$name = $_POST["name"];
$place = $_POST["place"];
$res=0;

if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
{ 
echo "<center>Invalid email</center>"; 
}
else {echo "<BR><center>Valid Email</center>";} 
 
$strdate=$ubday;

//Check the length of the entered Date value 
if((strlen($strdate)<10)OR(strlen($strdate)>10))
{
echo("<BR>Enter the date in 'dd/mm/yyyy' format");$res=1;
}

else
{

if((substr_count($strdate,"/"))<>2){echo("<BR>Enter the date in 'dd/mm/yyyy' format");$res=1;}

	else
	{

	$pos=strpos($strdate,"/");
	$date=substr($strdate,0,($pos));
	$result=ereg("^[0-9]+$",$date,$trashed);
	if(!($result)){echo "<BR>Enter a Valid Date";$res=1;}
		else
		{
			if(($date<=0)OR($date>31)){echo "<BR>Enter a Valid Date";$res=1;}
		}


$month=substr($strdate,($pos+1),($pos));

		if(($month<=0)OR($month>12)){echo "<BR>Enter a Valid Month";$res=1;}
		else
		{
		$result=ereg("^[0-9]+$",$month,$trashed);
		if(!($result)){echo "<BR>Enter a Valid Month";$res=1;}
		}

		$year=substr($strdate,($pos+4),strlen($strdate));
		$result=ereg("^[0-9]+$",$year,$trashed);
		if(!($result)){echo "<BR>Enter a Valid year";$res=1;}
		else
		{
		if(($year<1900)OR($year>2200)){echo "<BR>Enter a year between 1900-2200";$res=1;}
		}

	}
}


//validation over


if (!empty($_SERVER['HTTP_CLIENT_IP']))
  //check ip from share internet
  {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  //to check ip is pass from proxy
  {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ip=$_SERVER['REMOTE_ADDR'];
  }


echo "<br>You IP address is ::";
echo "$ip<br>";
//after this everything is valid store in DB
mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error());
mysql_select_db("htm_2353897_db") or die(mysql_error());


$result = mysql_query("SELECT count(*) FROM users WHERE userName='$uname'"); 
$num = mysql_result($result, 0); 

echo "<br>number of records ";
echo "$num<br>";

if($name!='' and $place!='' and $phone!='' and $num==0 and $res==0)
{

$result = mysql_query("insert into  users (username,userpass) values ('$uname',md5('$upass'))"); 
$result = mysql_query("insert into user_info(username,userbday,userph,userem,name,place) values ('$uname','$ubday','$phone','$email','$name','$place')"); 
$result = mysql_query("insert into user_images (username) values ('$uname')");

echo "<BR>REGISTERED !<BR>";
echo "<a href='/index.php'><B>LOGIN</B></a>";

}
else
{
echo "<BR>Username exits or invalid data !<BR>";
echo "<a href='/index.php'><B>GO BACK AGAIN</B></a>";
}
?>

