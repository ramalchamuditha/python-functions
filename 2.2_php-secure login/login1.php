<?php

if (isset($_POST["txtuname"]) && isset($_POST["txtpw"]))
{
	$uname = $_POST["txtuname"];
	$pword = $_POST["txtpw"] ;	

		$dbh= new PDO('mysql:host=localhost;dbname=test', 'cohdse182f005', 'Abc@123');	
		$sql = "SELECT uname,pword FROM tbl_student WHERE uname =? AND pword =?";
		$query = $dbh->prepare($sql);
		$query->execute(array($uname,sha1($pword)));
		
		if ($query->rowCount() >= 1){
			session_start();
			$_SESSION["UName"] = $uname;
			$_SESSION['LAST_ACTIVITY'] = time();
			header("Location:index.php");	
		}
		else
		{
			echo '<script language="javascript">';
  			echo 'alert("Invalid Username or Password !!")'; 
  			echo '</script>';
		}
}
	

?>
<html>
<head><title>Login Page</title>
	<script type="text/javascript">
		function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
}
	</script>
</head>
	
	

<body>
	<form name="frmlogin" method="post" action="#"><br><br>
		<table align="center">
			<tr>
				<td>User name : <input type="text" name="txtuname" onkeypress="return alpha(event)" /><br></td>
			</tr>
			<tr>
				<td>Password  :  <input type="password" name="txtpw"/><br></td>
			</tr>		
		</table><br>
		
		<center><input type="submit" name="btnsubmit" value="Login"/>  <input type="reset" name="btnreset" value="Reset"/></center>		
		
	</form>
</body>
</html>