
<?php
session_start();
$uname=$_SESSION["usname"];

 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";


$conn = mysqli_connect($servername, $username, $password, $dbname);


?>

<!DOCTYPE HTML>
<html style="background: url('http://localhost/election/images/bg.jpg');" lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">
	
	
	<style>	table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	
	tr:nth-of-type(odd) { 
		background: #eee; 
	}
	th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
	td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
	}
	</style>
	
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
		<li><a href="index.php" class="active-menu">Logout</a></li>

	</ul>
</nav>
</div>
</div>
</div>
</br>
<a href="newelection.php"  class="btn" >New Election</a>
<a href="viewelection.php" class="btn"  >View Election</a>
<a href="viewresult.php"  class="btn" >View Result</a>
<a href="addcandidate.php"  class="btn" >Add Candidate</a>
<a href="viewcandidatesadmin.php" style="background:red"  class="btn" >View Candidate</a>
</br></br>
<form action="#" method="post">

</form>
</br></br>

										 <?php 
										
									 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";
$conn = new mysqli($servername, $username, $password, $dbname);
							
								
								
							 $sql="SELECT candidates.*, elections.* FROM candidates RIGHT JOIN elections ON elections.ename = candidates.election WHERE candidates.cname IS NOT NULL ";
$result = $conn->query($sql);
							 
							
					 ?>
<table style="background:white" class="rwd-table">
  <tr>
								<th >Candidate Name</th>
								<th >Age</th>
								<th >Cdept</th>
									
									
								<th >Election Name</th>
								
								<th >Year</th>
								<th >Date</th>
									
								<th >Candidate Photo</th>
								
								<th >Idcard</th>
								
  </tr>
  
  
  
					
    <?php while($row= $result->fetch_assoc()) { ?>
	 <form method="post" action="#">
<tr >
    <td ><?php echo $row['cname']?></td>		
	 		
 <td ><?php echo $row['cage']?></td>		
 <td ><?php echo $row['cdept']?></td>		

<td ><?php echo $row['election']?></td>		

<td ><?php echo $row['year']?></td>	
<td ><?php echo $row['date']?></td>	
 
 <td ><img height="50px" width="50px" src="uploads/<?php echo $row['cphoto']?>"></td>		 
 
 <td ><img height="50px" width="50px" src="uploads/party/<?php echo $row['pphoto']?>"></td>



</tr></form>

							 <?php } ?>
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							


				
							
						

</header>
  
</body>
</html>


