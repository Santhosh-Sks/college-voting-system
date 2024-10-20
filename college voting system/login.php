


<!DOCTYPE HTML>
<html style="background: url('http://localhost/election/images/bg.jpg');" >
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <title>Online Election</title>
</head>
<body >
  
<header>
<div id="navigation">
<div class="arrows">
	<span class="ar-left"></span>
	<span class="ar-right"></span>
	<span class="ar-left2"></span>
	<span class="ar-right2"></span>
</div> 

<div class="dark-color">
<div class="light-color">
<a href="#" id="logo">ONLINE COLLEGE ELECTION PORTAL</a>
<nav>
	<ul>
		<li><a href="index.php" >Home</a></li>
		<li><a href="login.php" class="active-menu">Login</a></li>
		<li><a href="vlogin.php">Vote</a></li>
		<li><a href="about.php">About us</a></li>
    <li><a href="contact.php">Contact</a></li>
	</ul>
</nav>
</div>
</div>        
</div>
	<div class="limiter">           
		<div class="container-login100">
                    
			<div class="wrap-login100 p-t-50 p-b-90">
				<form method="post" action="#" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						Login
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="uname" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
				
					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</header>
  
</body>
</html>


<?php

if(isset($_POST['uname']))
{
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";


$uname=$_POST['uname'];
$pass=$_POST['pass'];
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM login where  username='$uname' and password='$pass'  and role='admin'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
		
		
$_SESSION["usname"] = $row["username"];
$role=$row["role"];


        echo "<script>alert('Login Successful');</script>";
 header("Location: http://localhost/election/dashboard.php");

    }
    
} else {
    echo "<script>alert('Login Failed');
	</script>";

echo "<script> window.location = 'http://localhost/election';  </script>";

}

$conn->close();
}
?>
