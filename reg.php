<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<?php

	require 'db.php';

	if(isset($_POST['submit'])){
		@$name = $_POST["name"];
		@$email = $_POST["email"];
		@$pass = $_POST["pass"];

			if($name!=null && $email!=null && $pass!=null){
				$sql1="INSERT INTO info(id, name, email, password, city, address, subject) VALUES (NULL, '$name', '$email', '$pass', '', '', '')";
					$res1=mysqli_query($con, $sql1);
					$msg1 = "Data Submited Successfully..!";
			}else{
				$msg1 = "Data Not Submited !";
			}
		
			/*if(empty($name)){
				$msg = "Please Enter Name !";
			}
			elseif(empty($email)){
				$msg = "Please Enter Email ID !";
			}
			elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$msg = "Please Enter Valid Email Id !";
			}
			elseif(empty($pass)){
				$msg = "Please Enter Password !";
			}
			else{
					$sql1="INSERT INTO info(id, name, email, password) VALUES (NULL, '$name', '$email', '$pass')";
					$res1=mysqli_query($con, $sql1);
					$msg1 = "Data Submited Successfully..!";
			}*/

	}

	?>
</head>
<body>

	<script type="text/javascript">
		function validation() {
			var name = document.forms["vform"]["name"].value;
			var email = document.forms["vform"]["email"].value;
			var pass = document.forms["vform"]["pass"].value;

			if(name == "" || name == null){
				document.getElementById("demo").innerHTML="Please Enter Username !";
				return false;
			}
			else{
				document.getElementById("demo").innerHTML="";
			}

			if(email == "" || email == null){
				document.getElementById("demo").innerHTML="Please Enter Email !";
				return false;
			}
			else{
				document.getElementById("demo").innerHTML="";
			}

			if(pass == "" || pass == null){
				document.getElementById("demo").innerHTML="Please Enter Password !";
				return false;
			}
			else{
				document.getElementById("demo").innerHTML="";
			}
			
		}
	</script>

	<form action="reg.php" method="POST" name="vform" onsubmit="return validation()">
		<input type="text" name="name" id="name" placeholder="Name"><br><br>
		<input type="text" name="email"	id="email" placeholder="Email"><br><br>
		<input type="password" name="pass" id="pass" placeholder="Password"><br><br>
		<input type="submit" name="submit" id="submit">
		<input type="reset" name="reset" id="reset">
		<p><a href="main.php" style="text-decoration: none;">Sign In</a> Now.</p>
		<p style="color: red" id="demo">
			<?php
				if(isset($msg1)){
					echo $msg1;
				}
			?>
		</p>
		
	</form>

	

</body>
</html>