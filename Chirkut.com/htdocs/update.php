<?PHP

$email = $_POST["Email"];
$name = $_POST["Name"];
$phone = $_POST["Phone"];
$bday = $_POST["Bday"]; 
$place = $_POST["Place"]; 


if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email))
{ 
echo "<center>Invalid email</center>"; 
}
else {echo "<center>Valid Email</center>";} 
 
$strdate=$bday;

//Check the length of the entered Date value 
if((strlen($strdate)<10)OR(strlen($strdate)>10))
{
header('Location: /edit.php');
}

else
{

if((substr_count($strdate,"/"))<>2){header('Location: /edit.php');}

	else
	{

	$pos=strpos($strdate,"/");
	$date=substr($strdate,0,($pos));
	$result=ereg("^[0-9]+$",$date,$trashed);
	if(!($result)){echo "Enter a Valid Date";}
		else
		{
			if(($date<=0)OR($date>31)){header('Location: /edit.php');}
		}


$month=substr($strdate,($pos+1),($pos));

		if(($month<=0)OR($month>12)){header('Location: /edit.php');}
		else
		{
		$result=ereg("^[0-9]+$",$month,$trashed);
		if(!($result)){echo "Enter a Valid Month";}
		}

		$year=substr($strdate,($pos+4),strlen($strdate));
		$result=ereg("^[0-9]+$",$year,$trashed);
		if(!($result)){header('Location: /edit.php');}
		else
		{
		if(($year<1900)OR($year>2200)){header('Location: /edit.php');}
		}

	}
}

if($name=='' or $phone=='' or $place=='') { header('Location: /edit.php'); }
else {

session_start();  
$listof=$_SESSION['user'];   
$dip=$_SESSION['disp_user'];   

mysql_connect("sql105.os9.co.uk", "htm_2353897", "091728") or die(mysql_error()); 
mysql_select_db("htm_2353897_db") or die(mysql_error());   

if($dip==$listof)
{
$stmt = "update user_info set name='$name',place='$place',userem='$email',userph='$phone',userbday='$bday' where username='$listof' ";
$res = mysql_query($stmt);
}

}
header('Location: /profile.php'); 

?>




