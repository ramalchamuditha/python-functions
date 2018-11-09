<?php
if (isset($_POST["txtuname"]))
{
	$uname = $_POST["txtuname"];
	$pword = $_POST["txtpw"];
	
	$con = mysqli_connect("127.0.0.1","","");
	mysqli_select_db($con,"test");
	$sql = "SELECT * FROM tbl_student WHERE uname='$uname' AND pword='$pword'";
	$result = mysqli_query($con,$sql);
	
	if($row = mysqli_fetch_array($result))
	{
		session_start();
		$_SESSION["UName"] = $uname;
		$_SESSION['LAST_ACTIVITY'] = time();
		header("Location:index.php");
	}
	else
	{
		echo "Invalid Username or Password !!";
	}
	
	mysqli_close($con);
}

?>
<html>
<head><title>Login Page</title>
</head>

<body>
	<form name="frmlogin" method="post" action="#">
	User name : <input type="text" name="txtuname"/><br>
	Password : <input type="password" name="txtpw"/><br>

		<input type="submit" name="btnsubmit" value="Login"/>
		<input type="reset" name="btnreset" value="Reset"/>
	</form>
</body>
</html>