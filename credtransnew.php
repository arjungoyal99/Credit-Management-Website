<?php 
	$hostname="localhost";
	$username="root";
	$pass="";
	$con=mysqli_connect($hostname,$username,$pass);
	if(!$con)
	{
		die('Could not connect'.mysql_error());
	}
	$db="tsp";
	$y=mysqli_select_db($con,$db);
	if (!$y)
	{
			die('Could not select db'.mysql_error());
	}
	if(isset($_POST["submit"]))
	{
		echo '<section class="banner-area relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-lg-8">
						<div class="banner-content text-center">
							';
		$em = $_POST["sel"];
		$sql=mysqli_query($con,"select * from user where email='$em'");
		$p =  mysqli_fetch_array($sql);
		$credit=$p['credit'];
		$cname=$p['name'];
		echo '<table class= "info" align = "center">
		<tr>
		<td> Name </td>
		<td>'.$cname.'</td>
		</tr>
		<tr>
		<td> Email </td>
		<td>'.$em.'</td>
		</tr>
		<tr>
		<td> Credits </td>
		<td>'.$credit.'</td>
		</tr>
		</table>';
		echo '<form method = "POST" id="form" name="form" onsubmit="return check()">';
		$o = mysqli_fetch_array($sql);
		$result=mysqli_query($con,"select * from user where email!='$em'");
		echo '<br><div class="select-style">';
		echo "<select name='sel'>";
		echo"<option disabled selected value> -- select a user -- </option>";
		while($row = mysqli_fetch_array($result))
		{
			echo "<option value=".$row['email'].">".$row['name']." (".$row['email'].")</option>";
		}
		echo "</select>";
		echo "<input type = 'number' name='cred' min=1 max=".$credit."><br>";
		echo "<input type = 'hidden' name='fro' value='".$em."'>";
		echo "<br><input type = 'submit' value='Transfer' name='sub' class = 'primary-btn'>";
		echo "</form>";
		echo '<br></div>';
		echo "<h3>Your recent transactions</h3>";
		$result=mysqli_query($con,"select * from transfer where sender='$em'");
		echo "<table border='1' class='hoverTable'>
		<tr>
		<th>TID</th>
		<th>Receiver</th>
		<th>Credits</th>
		</tr>";
		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['receiver']."</td>";
			echo "<td>".$row['cred']."</td>";
			echo "</tr>";
		}

							
		echo '
						</div>
					</div>
				</div>
			</div>
		</section>';
		
		
	}
	else if(isset($_POST["sub"]))
	{
		echo '<section class="banner-area relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-lg-8">
						<div class="banner-content text-center">
							';
		$efr=$_POST["fro"];
		$eto=$_POST["sel"];
		$credits=$_POST["cred"];
		$sql1=mysqli_query($con,"update user set credit = credit - $credits where email='$efr'");
		$sql2=mysqli_query($con,"update user set credit = credit + $credits where email='$eto'");
		$b=mysqli_query($con,"insert into transfer(sender,receiver,cred) values('$efr','$eto','$credits')");
		echo '<h1 class="text-uppercase text-white">Transaction Details</h1><br>';
		echo '<table width="100%"><tr><td><h4 class="text-uppercase text-white">Sender </td><td>'.$efr.'</td></h4></tr>';
		echo '<tr><td><h4 class="text-uppercase text-white">Receiver </td><td>'.$eto.'</td></h4></tr>';
		echo '<tr><td><h4 class="text-uppercase text-white">Credits  </td><td>'.$credits.'</td></h4></tr></table>';		
		echo '<br><a href="index.html">Home</a>
						</div>
					</div>
				</div>
			</div>
		</section>';

	}
		
	else
	{
		header('location:transnew.php');
		exit();
	}	

?>
<html>
<head>

<script>
function check()
{
	var s = document.form.sel.value.length;
	var c = document.form.cred.value.length;
	if (s==0)
	{
		alert('Select a user');
		return false;
	}
	else if (c==0)
	{
		alert('Enter credits');
		return false;
	}
	return true;
}
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="UTF-8">
	<title>TSP</title>
		<link rel="stylesheet" href="css/bootstrap2.css">
		<link rel="stylesheet" href="css/main2.css">
</head>
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="js/main.js"></script>
<style>
.info{
	width:100%; 
	border-collapse:collapse; 
}
.info td{ 
	padding:7px; border:#4e95f4 1px solid;
}
.info tr{
	background: #ffffff;
}
.info tr:hover {
	background-color: #99ff99;
}
	
.hoverTable{
	width:100%; 
	border-collapse:collapse; 
}
.hoverTable td{ 
	padding:7px; border:#4e95f4 1px solid;
}
.hoverTable tr{
	background: #ffffff;
}
.hoverTable tr:hover {
	background-color: #ffff99;
}
.select-style {
    border: 1px solid #ccc;
    width: 100%;
    border-radius: 3px;
    overflow: hidden;
	margin-top:20px;
	margin-bottom:20px;

}

.select-style select {
    padding: 16px 20px;
    width: 100%;
    border: none;
	background-color: #f1f1f1;
	border-radius: 4px;
}


input[type=number] {
  width: 310px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}
input[type=number]:focus {
  width: 100%;
}
a:link, a:visited {
  background-color: #4d89ea;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 50px 20px;

}

a:hover, a:active {
  background-color: #002d77;
  border-radius: 50px 20px;

</style>
</html>