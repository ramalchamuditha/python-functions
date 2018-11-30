<?php
session_start();

$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 60;

if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    
	session_unset();
    session_destroy();
	header("Location:login1.php");
}
else{
	echo "Loggin as , ".$_SESSION["UName"]."<br><br>";
	
}


$_SESSION['LAST_ACTIVITY'] = $time;
		

?>

<html>
	<head><title>Index Page</title>
	</head>
	
	<body>
		<center>
	<h1>Please add your comment below</h1></center>
		<form name="frmcomment" method="POST" action="#">
			<span>
			<table align="center">
				<tr>
					<td><?php echo $_SESSION["UName"]; ?> </td>
					<td><textarea rows="4" cols="50" name="cmt">
					</textarea>	</td>					
				</tr>
				<tr>
					<td colspan="2"></td>
					<td><input type="submit" name="btnsubmit" name="submit"/></td>
				</tr>
			</table><br><br>
			</span>
			<div id="comment">
				<center><h2>Previous Comments</h2></center><br>
				<table align="center"  width="400">
					<tr>
						<th><u><h3>Users</h3></u></th>
						<th><u><h3>Comments</h3></th>
					</tr>
						
						<?php
							$con = mysqli_connect("127.0.0.1", "", "");
							$db = mysqli_select_db($con, "test");
							$result = mysqli_query($con, "SELECT * FROM tbl_comments");
							while($row = mysqli_fetch_array($result))
							{
								echo  "<tr><td><center>".$row['uname']."</center></td>"; 
								echo  "<td><center>".$row['comment']."</center></td></tr>";
							}
						?>
										
				</table>
			</div>
	    </form>
		<?php
		$uname = $_SESSION["UName"];
		if(isset($_REQUEST['cmt']) && isset($uname))
{
		$dbh= new PDO('mysql:host=127.0.0.1;dbname=test', '', '');	
		$sql = "INSERT INTO `tbl_comments`(`uname`, `comment`) VALUES (?,?)";
		$query = $dbh->prepare($sql);
		$query->execute(array($uname, $_REQUEST['cmt']));
	
	if ($query->rowCount() >= 1)
	{
		echo '<script language="javascript">';
  		echo 'alert("succefully added your comment")'; 
  		echo '</script>';		
		header("Refresh:0; url=index.php");
	}
	else 
	{
		echo '<script language="javascript">';
  		echo 'alert("comment not added")'; 
  		echo '</script>';
	}
		
}
		
		?>
	
	
	</body>
</html>