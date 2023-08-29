<?PHP 
$user=$_GET['user'];
session_start(); 
$_SESSION['disp_user']=$user;
header('Location: /profile.php'); 
?>