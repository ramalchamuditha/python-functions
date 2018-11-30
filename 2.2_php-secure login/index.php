<?php
session_start();

$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 10;

if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    
	session_unset();
    session_destroy();
	header("Location:login.php");
}
else{
	echo "Hello , ".$_SESSION["UName"]."<br><br>";	
}


$_SESSION['LAST_ACTIVITY'] = $time;
		

?>