<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="UTF-8">
	<title>TSP</title>
		<link rel="stylesheet" href="css/bootstrap2.css">
		<link rel="stylesheet" href="css/main2.css">
</head>
<script>
function check()
{
	var s = document.myform.sel.value.length;
	if (s==0)
	{
		alert('Select a user');
		return false;
	}
	return true;
}
window.addEventListener( "pageshow", function ( event ) {
  var historyTraversal = event.persisted || 
                         ( typeof window.performance != "undefined" && 
                              window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});
</script>
<style>
.hoverTable{
	width:100%; 
	border-collapse:collapse; 
}
.hoverTable td{ 
	padding:7px; border:#4e95f4 1px solid;
}
.hoverTable tr{
	background: #f3f4f2;
}
.hoverTable tr:hover {
	background-color: #ffff99;
}
</style>
	<body>
		<section class="banner-area relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row fullscreen justify-content-center align-items-center">
					<div class="col-lg-8">
						<div class="banner-content text-center">
							<h1 class="text-uppercase text-white">Select a user</h1>
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
								$result=mysqli_query($con,"select * from user");
								echo '<form method = "POST" id="myform" name="myform" action = "credtransnew.php" onsubmit="return check()"></form>';
								echo "<table class='hoverTable' align='center'>";
								echo "
									<tr>
									<th></th>
									<th>Name</th>
									<th>Email</th>
									<th>Credit</th>
									</tr>";
								while($row = mysqli_fetch_array($result))
								{
									echo "<tr>";
									 echo "<td> <input type ='radio' value=". $row['email'] . " name = 'sel' form='myform'></td>";
									 echo "<td>" . $row['name'] . "</td>";
									 echo "<td>" . $row['email'] . "</td>";
									 echo "<td>" . $row['credit'] . "</td>";
									 echo"</tr>";
								}
								echo "</table>";
								echo "<input type='submit' name='submit' form='myform' class='primary-btn banner-btn'>";

							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		

		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="js/main.js"></script>
	</body>

</html>