<?PHP
session_start();
$_SESSION['disp_user']=$_SESSION['user'];
header('Location: /profile.php');
?>