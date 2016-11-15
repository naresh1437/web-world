<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<?php
	require 'db.php';
	session_start();
		$email = $_SESSION['email'];
		$pass = $_SESSION['pass'];
		/*print_r($_SESSION);*/

		$sql2="SELECT * FROM info WHERE email='$email' AND password='$pass'";
		$res2=mysqli_query($con, $sql2);
		while($row=mysqli_fetch_array($res2)){
					$name = $row['name'];
					$email = $row['email'];
					$pass = $row['password'];
				
	?>
</head>
<body>

	<div class="container">
	  <h2>User Profile</h2>
	  <table class="table table-striped">
	  	<tr>
	  		<th>USERNAME</th>
	  		<td><?php echo $name; ?></td>
	  	</tr>
	  	<tr>
	  		<th>EMAIL</th>
	  		<td><?php echo $email; ?></td>
	  	</tr>
	  	<tr>
	  		<th>PASSWORD</th>
	  		<td><?php echo $pass; } ?></td>
	  	</tr>
	  	 <?php
	  	if(isset($_POST['fill'])){
					require 'db.php';
					@$city = $_POST['city'];
					@$add = $_POST['add'];
				if($city!=null && $add!=null){
					$sql = "UPDATE info SET city = '$city', address = '$add' WHERE email='$email' AND password='$pass'";
					$res = mysqli_query($con, $sql);
				}
			}
	  ?>
	  	<?php
			$sql5="SELECT * FROM info WHERE email='$email' AND password='$pass'";
					$res5=mysqli_query($con, $sql5);
					while($row2=mysqli_fetch_array($res5)){
						@$city = $row2['city'];
						@$addrss = $row2['address'];
					
		?>
		<tr>
			<th>CITY</th>
			<td><?php echo $city; ?></td>
		</tr>
		<tr>
			<th>ADDRESS</th>
			<td><?php echo @$addrss; } ?></td>
		</tr>
	  </table>
	  <h2>Fill The Information.</h2>
	 
	  <div>
		<form action="prof.php" method="POST" name="info">
	  	<input type="text" name="city" id="city" placeholder="City"><br><br>
	  	<textarea name="add" id="add" cols="25" rows="5" placeholder="Address"></textarea><br><br>
	  	<input type="submit" name="fill" id="fill" value="Fill Info">
		</form>



	  </div><br>
	  <form action="main.php" method="POST">
	  	<input type="submit" name="log_out" id="log_out" value="Log Out">
	  </form>
	  <?php
	  	if(isset($_POST['log_out'])){
	  		session_destroy();
	  	}
	  ?>
</div>

</body>
</html>