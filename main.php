<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php
		require 'db.php';
		if(isset($_POST['submit'])){
			$email=$_POST['email'];
			$pass=$_POST['pass'];

			if(empty($email)){
				$disp="Please Fill All The Fields";
			}
			elseif(empty($pass)){
				$disp="Please Fill All The Fields";
			}
			else{
				$sql="SELECT * FROM info WHERE email='$email' AND password='$pass'";
				$res=mysqli_query($con, $sql);
				if(mysqli_num_rows($res)==1){
					session_start();
					$_SESSION['email'] = $email;
					$_SESSION['pass'] = $pass;
					
					header('location:prof.php');
				}else{
					$disp = "Wrong Email ID OR Password !";
				}

				
			}
		}
	?>
</head>
<body>

<form action="main.php" method="POST">
	
	<input type="text" name="email"	id="email" placeholder="Email ID"><br><br>
	<input type="password" name="pass" id="pass" placeholder="Password"><br><br>
	<input type="submit" name="submit" id="submit">
	<button><a href="reg.php" style="text-decoration: none">Register</a></button>
	<p style="color: red">
		<?php
			if(isset($disp)){
				echo $disp;
			}
		?>
	</p>
</form>

</body>
</html>