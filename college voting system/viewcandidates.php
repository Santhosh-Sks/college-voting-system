
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
<form action="#" method="post">

Your Aadhar No: <input disabled type="text" class="inputtext" value="<?php echo $uname?>"></br></br>
Select Dept:<select style="margin-left:40px" class="inputtext" name="area">
    <option value="">Select dept</option>
    <?php
	$result2 = $conn->query("SELECT area FROM elections ") or die($conn->error);
    while ($row2 = mysqli_fetch_array($result2)) {
        echo "<option value='" . $row2['area'] . "'>" . $row2['area'] . "</option>";
    }
    ?>       
</select>
<input type="submit" style="background:red" class="btn" value="View Candidates">
</form>
</br></br>

										 <?php 
										 if(isset($_POST["area"]))
										 {
									 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";
$conn = new mysqli($servername, $username, $password, $dbname);
							
								
								$ar=$_POST["area"];
							 $sql="SELECT candidates.*, elections.* FROM candidates RIGHT JOIN elections ON elections.ename = candidates.election WHERE candidates.cname IS NOT NULL and elections.area='$ar'";
$result = $conn->query($sql);
							 
							
					 ?>
<table style="background:white" class="rwd-table">
  <tr>
								<th >Candidate Name</th>
								<th >Candidate Age</th>
								
									
									
								<th >Election Name</th>
								<th >Edept</th>
								<th >Year</th>
								<th >Date</th>
									
								<th >Candidate Photo</th>
								
								<th >Party Photo</th>
								<th >Vote</th>
  </tr>
  
  
  
					
    <?php while($row= $result->fetch_assoc()) { ?>
	 <form method="post" action="partynew.php">
<tr >
    <td ><?php echo $row['cname']?></td>		
	 		
 <td ><?php echo $row['cage']?></td>		
 		

<td ><?php echo $row['election']?></td>		
<td ><?php echo $row['area']?></td>	
<td ><?php echo $row['year']?></td>	
<td ><?php echo $row['date']?></td>	
 
 <td ><img height="50px" width="50px" src="uploads/<?php echo $row['cphoto']?>"></td>		 
 
 <td ><img height="50px" width="50px" src="uploads/party/<?php echo $row['pphoto']?>"></td>	
<td>

<?php 
$election= $row["election"];
$sql3="select * from result where username='$uname' and election='$election'";

$result3 = $conn->query($sql3);
if($result3->num_rows <= 0)
{?>
<input type="submit" value="VOTE">
<?php } else
{?>

	<span>Already Voted</span>
<?php	
}?>
</td>




<td style="display:none"><input type="text" name="cname"  value="<?php echo $row['cname']?>"></td>
<td style="display:none"><input type="text" name="cage"  value="<?php echo $row['cage']?>"></td>

<td style="display:none"><input type="text" name="election"  value="<?php echo $row['election']?>"></td>
<td style="display:none"><input type="text" name="area"  value="<?php echo $row['area']?>"></td>
<td style="display:none"><input type="text" name="year"  value="<?php echo $row['year']?>"></td>
<td style="display:none"><input type="text" name="date"  value="<?php echo $row['date']?>"></td>
<td style="display:none"><input type="text" name="cphoto"  value="<?php echo $row['cphoto']?>"></td>

<td style="display:none"><input type="text" name="uname"  value="<?php echo $uname;?>"></td>


</tr></form>

							 <?php }} ?>
							
							
							
							
							
							
							
				</table>			
							
							
							
							
							
							
							


				
							
						

</header>
  
</body>
</html>


