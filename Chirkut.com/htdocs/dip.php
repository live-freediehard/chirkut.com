<?php
session_start();
$_SESSION['disp_user']="testUser";

echo "<a href='/getimage.php?idx=4'>check</a>";
?>